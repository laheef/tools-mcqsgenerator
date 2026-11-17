<?php

/**
 * Balloon payment
 * /finance/balloon-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Balloon payment',
    'meta' => ['title' => 'Balloon payment — Formula, Steps & Examples', 'description' => 'Balloon payment turns loan amount and amortization period into periods and Periods Ballon. Every box can be solved for, not only the one in the title.', 'h1' => 'Balloon payment Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => 'Loan specifications',
            'note' => '',
            'blocks' => [
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
                            'default' => '200000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Amortization period',
                            'type' => 'number',
                            'help' => 'The length of time over which the monthly payment is calculated.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'BallonTime',
                            'label' => 'Balloon payment after',
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
                            'name' => 'r',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompoundFreq',
                            'label' => 'Compounding method',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually' => '2', 'Quarterly' => '4', 'Monthly' => '12'],
                            'dataset' => 'comp_freq_DS',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency which which the interest is added to the loan principal balance.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The loan term must be longer than the length of the balloon payment.'],
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Your fixed monthly payment is {{pmt_calc.monetaryValue}} in the first {{t_updated.formattedValue}}&nbsp;{{t_updated.fullUnit}}, and then your last balloon payment will be {{balance.monetaryValue}}. Thus, your total repayment amount is {{total_pmt.monetaryValue}}, from which the total monthly payment is {{pmt_bal_dif.monetaryValue}}, including a total interest payment of {{pmt_loan_dif.monetaryValu
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables - Don\'t translate!',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_pmt',
                            'label' => 'Total pmt',
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
                            'name' => 'pmt_loan_dif',
                            'label' => 'Pmt loan dif',
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
                            'name' => 'pmt_bal_dif',
                            'label' => 'Pmt bal dif',
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
                            'name' => 'balance',
                            'label' => 'Balance',
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
                            'name' => 'pmt_calc',
                            'label' => 'Pmt calc',
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
                            'name' => 't_updated',
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
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'ct1',
                            'label' => 'Ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'ct2',
                            'label' => 'Ct2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                            'options' => [
                                'quarterly' => '4',
                                'monthly' => '12',
                                'bi-weekly' => '26.08875',
                                'weekly' => '52.1775',
                                'annually' => '1',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodsBallon',
                            'label' => 'Periods ballon',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periods',
                            'label' => 'Periods',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtExtra',
                            'label' => 'Extra monthly payment',
                            'type' => 'number',
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
    ],
    'formula' => [
        [
            'title' => 'periods = q * t',
            'results' => ['t' => 'periods/q', 'periods' => 'q*t', 'q' => 'periods/t'],
        ],
        [
            'title' => 'periodsBallon = q * BallonTime',
            'results' => ['BallonTime' => 'periodsBallon/q', 'periodsBallon' => 'BallonTime*q', 'q' => 'periodsBallon/BallonTime'],
        ],
        [
            'title' => 'pmt_calc = get_results (r, t, m, q, LoanAmount, BallonTime, PmtExtra, 0)',
            'results' => ['pmt_calc' => 'get_results(r, t, m, q, LoanAmount, BallonTime, PmtExtra, 0)'],
        ],
        [
            'title' => 'balance = get_results (r, t, m, q, LoanAmount, BallonTime, PmtExtra, 2)',
            'results' => ['balance' => 'get_results(r, t, m, q, LoanAmount, BallonTime, PmtExtra, 2)'],
        ],
        [
            'title' => 'total_pmt = get_results (r, t, m, q, LoanAmount, BallonTime, PmtExtra, 3)',
            'results' => ['total_pmt' => 'get_results(r, t, m, q, LoanAmount, BallonTime, PmtExtra, 3)'],
        ],
        [
            'title' => 'pmt_bal_dif = get_results (r, t, m, q, LoanAmount, BallonTime, PmtExtra, 4)',
            'results' => ['pmt_bal_dif' => 'get_results(r, t, m, q, LoanAmount, BallonTime, PmtExtra, 4)'],
        ],
        [
            'title' => 'pmt_loan_dif = get_results (r, t, m, q, LoanAmount, BallonTime, PmtExtra, 5)',
            'results' => ['pmt_loan_dif' => 'get_results(r, t, m, q, LoanAmount, BallonTime, PmtExtra, 5)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_results",function(r,t,m,q,LoanAmount,BallonTime,PmtExtra,index){var type=14;var periods=q*t;var periodsBallon=q*BallonTime;var PmtCalc;var TotalPmt;var balance;var eq_p=mathjs.pow(1+r/m,m/q)-1;if(type===14){PmtExtra=0;PmtCalc=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);balance=LoanAmount*mathjs.pow(1+eq_p,periodsBallon)-PmtCalc/eq_p*(mathjs.pow(1+eq_p,periodsBallon)-1);TotalPmt=PmtCalc*periodsBallon+balance}var periodsMonth=t*12;var pmt=PmtCalc+PmtExtra;var princPaid=0;for(var i=0;i<=periodsMonth;i++){var PowOpen=i-1;var PowClose=i;var princBalOpen=LoanAmount*mathjs.pow(1+eq_p,PowOpen)-pmt/eq_p*(mathjs.pow(1+eq_p,PowOpen)-1);var princBalClose=LoanAmount*mathjs.pow(1+eq_p,PowClose)-pmt/eq_p*(mathjs.pow(1+eq_p,PowClose)-1);var intMonth=princBalOpen*eq_p;var princMonth=princBalOpen-princBalClose;if(princBalOpen<pmt){princMonth=princBalOpen;princBalClose=0}if(princBalOpen<=0){princBalOpen=0}if(princBalClose<=0){princBalClose=0}if(intMonth<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princBalOpen=0}if(princBalClose<=0){princBalClose=0}if(intMonth<=0){intMonth=0}if(intMonth<=0){princMonth=0}if(intMonth<=0){princPaid=LoanAmount}if(princPaid<=0){princPaid=0}if(i===0){intMonth=0}if(type===14&&princBalClose<balance){princMonth=balance;intMonth=balance*eq_p;princBalClose=0}if(princBalClose===LoanAmount){princMonth=0}if(princPaid===LoanAmount){intMonth=0}if(intMonth===0){princMonth=0}if(princBalClose===0){intMonth=0}if(i>0){princPaid+=princMonth}if(type===14){t=BallonTime}}var t_updated=t;var results=[PmtCalc,t_updated,balance,TotalPmt,TotalPmt-balance,TotalPmt-LoanAmount];return results[index]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Amortization period into Balloon payment and the answer comes back as Balloon payment after and Total pmt. It is a single relationship that reads balloon payment after out of amortization period, not a table of canned results keyed by them. Units for Balloon payment after default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Balloon payment calculator works', 'html' => <<<'TXT'
            <p>Balloon payment answers one question from 1 number, and the answer is Balloon payment after, Total pmt and Pmt loan dif.</p><p>In the form&#039;s own words, Periods = Payment frequency × Amortization period.</p><p>The result panel carries Balloon payment after, Total pmt, Pmt loan dif and Pmt bal dif, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Amortization period</strong> — in years / months. The length of time over which the monthly payment is calculated.</li></ul><p>The result boxes are Balloon payment after in years, Total pmt, Pmt loan dif, Pmt bal dif, Balance, Pmt calc, Payment frequency, Periods ballon, Periods; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Loan amount = 200000 USD, Interest rate = 7 perc and Compounding method = 12; the answers are <strong>M</strong> = 12, <strong>Ct1</strong> = 1, <strong>Ct2</strong> = 0, <strong>Payment frequency</strong> = 12 and <strong>Extra monthly payment</strong> = 0.</p><ul><li><strong>M</strong> = 12</li><li><strong>Ct1</strong> = 1</li><li><strong>Ct2</strong> = 0</li><li><strong>Payment frequency</strong> = 12</li><li><strong>Extra monthly payment</strong> = 0</li></ul><p>That is <strong>Periods</strong> = <code>Payment frequency × Amortization period</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>M</strong> = 12, <strong>Ct1</strong> = 1, <strong>Ct2</strong> = 0, <strong>Payment frequency</strong> = 12 and <strong>Extra monthly payment</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Balloon payment after lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periods</strong> = <code>Payment frequency × Amortization period</code></li><li><strong>Amortization period</strong> = <code>Periods ÷ Payment frequency</code></li><li><strong>Payment frequency</strong> = <code>Periods ÷ Amortization period</code></li><li><strong>Periods ballon</strong> = <code>Balloon payment after × Payment frequency</code></li><li><strong>Balloon payment after</strong> = <code>Periods ballon ÷ Payment frequency</code></li><li><strong>Pmt calc</strong> = <code>get_results(Interest rate, Amortization period, M, Payment frequency, Loan amount, Balloon payment after, Extra monthly payment, 0)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periods</strong> = <code>Payment frequency × Amortization period</code> — the form to use when Payment frequency and Amortization period are the values you have.</li><li><strong>Amortization period</strong> = <code>Periods ÷ Payment frequency</code> — the form to use when Periods and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Periods ÷ Amortization period</code> — the form to use when Periods and Amortization period are the values you have.</li><li><strong>Periods ballon</strong> = <code>Balloon payment after × Payment frequency</code> — the form to use when Balloon payment after and Payment frequency are the values you have.</li><li><strong>Balloon payment after</strong> = <code>Periods ballon ÷ Payment frequency</code> — the form to use when Periods ballon and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Periods ballon ÷ Balloon payment after</code> — the form to use when Periods ballon and Balloon payment after are the values you have.</li><li><strong>Pmt calc</strong> = <code>get_results(Interest rate, Amortization period, M, Payment frequency, Loan amount, Balloon payment after, Extra monthly payment, 0)</code> — the form to use when Interest rate, Amortization period, M and Payment frequency are the values you have.</li><li><strong>Balance</strong> = <code>get_results(Interest rate, Amortization period, M, Payment frequency, Loan amount, Balloon payment after, Extra monthly payment, 2)</code> — the form to use when Interest rate, Amortization period, M and Payment frequency are the values you have.</li></ul><p>Any one of Periods, Amortization period and Payment frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Loan amount from 200000 to 400000, leaving every other box alone. The panel moves from <strong>M</strong> 12, <strong>Ct1</strong> 1, <strong>Ct2</strong> 0, <strong>Payment frequency</strong> 12 and <strong>Extra monthly payment</strong> 0 to <strong>M</strong> 12, <strong>Ct1</strong> 1, <strong>Ct2</strong> 0, <strong>Payment frequency</strong> 12 and <strong>Extra monthly payment</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Amortization period carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Balloon payment after, Total pmt and Pmt loan dif are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Amortization period left as a guess.</strong> Anything typed into Amortization period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Amortization period to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Balloon payment form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Amortization period</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The length of time over which the monthly payment is calculated. Change it and Periods, Payment frequency and Pmt calc changes with it. Fill it from a measurement rather than a memory — Amortization period is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Balloon payment after</strong> is a years figure. The value follows from Periods ballon and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total pmt</strong> is a plain number. The value follows from Interest rate, Amortization period, M and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Pmt loan dif</strong> is a plain number. The value follows from Interest rate, Amortization period, M and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Pmt bal dif</strong> is a plain number. The value follows from Interest rate, Amortization period, M and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Balance</strong> is a plain number. The value follows from Interest rate, Amortization period, M and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Pmt calc</strong> is a plain number. The value follows from Interest rate, Amortization period, M and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Payment frequency</strong> is a plain number and the page's own defaults put it at 12. The value follows from Periods and Amortization period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Periods ballon</strong> is a plain number. The value follows from Balloon payment after and Payment frequency. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Periods</strong> is a plain number. The value follows from Payment frequency and Amortization period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>M</th><th>Ct1</th><th>Ct2</th><th>Payment frequency</th><th>Extra monthly payment</th></tr></thead><tbody><tr><td><strong>Loan amount</strong> +10%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td><td>—</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td><td>—</td></tr><tr><td><strong>Compounding method</strong> +10%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td><td>—</td></tr></tbody></table><p>The steepest column belongs to Loan amount: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Loan amount, Interest rate and Compounding method barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Balloon payment actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos, yrs, sec and min. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Balloon payment after is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Amortization period are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Amortization period is what you already know and Balloon payment after and Total pmt is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cpi-inflation">CPI inflation</a>, <a href="/finance/cpm">CPM Calculator</a> and <a href="/finance/credit-card-interest">Credit card interest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Balloon payment calculator work out?', 'a' => <<<'TXT'
            Balloon payment after, Total pmt, Pmt loan dif and Pmt bal dif, from Payment frequency and Amortization period. The relationship is Periods = Payment frequency × Amortization period.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Amortization period (years / months). Enter amortization period; Balloon payment after is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periods, Amortization period, Payment frequency and Periods ballon blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            M = 12, Ct1 = 1, Ct2 = 0, Payment frequency = 12 and Extra monthly payment = 0. That comes from the page's own defaults, entered in Amortization period; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Balloon payment after is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Amortization period blank and the page solves for it, reporting Balloon payment after instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Balloon payment after keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cpi-inflation', 'name' => 'CPI inflation'],
            ['path' => '/finance/cpm', 'name' => 'CPM Calculator'],
            ['path' => '/finance/credit-card-interest', 'name' => 'Credit card interest Calculator'],
        ],
        'authors' => [],
    ],
];
