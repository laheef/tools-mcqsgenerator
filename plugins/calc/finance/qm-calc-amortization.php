<?php

/**
 * Amortization
 * /finance/amortization
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Amortization',
    'meta' => ['title' => 'Amortization Calculator — Formula & Results', 'description' => 'Amortization works out extra too high from loan amount. Each box lists the units it accepts, and the answer converts between them. A worked example follows.', 'h1' => 'Amortization Calculator', 'updated' => '2026-09-30'],
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
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Amortization term',
                            'type' => 'number',
                            'help' => 'The length of time it takes to repay the principal (loan amount). Note that with extra payment, the initial amortization term can be shortened.',
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
                            'default' => '12.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'Compound frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
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
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Bi-weekly' => '26.08875',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
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
                            'name' => 'PmtExtra',
                            'label' => 'Extra payment',
                            'type' => 'number',
                            'help' => 'The regularity of the extra payment always corresponds to the payment frequency.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => <<<'TXT'
                                The original periodic payment is {{global.currencySymbol}}{{originalPeriodicPayment.formattedValue}}. With the original repayment plan, the total payment amount is {{global.currencySymbol}}{{originalTotalPayment.formattedValue}}, with an interest payment of {{global.currencySymbol}}{{originalInterestPayment.formattedValue}}.
                                TXT],
                                ['when' => 'PmtExtra > 0 and extraTooHigh == 0', 'text' => <<<'TXT'
                                Your periodic installment with the extra payment becomes {{global.currencySymbol}}{{newPeriodicPayment.formattedValue}}, and you pay off your loan in {{payoffYears.formattedValue}}&nbsp;year(s), and {{payoffMonths.formattedValue}}&nbsp;month(s); thus, with the extra payments, you shorten the repayment term by {{termShortenedYears.formattedValue}}&nbsp;year(s), and {{termShortenedMonths.formattedVa
                                TXT],
                                ['when' => 'PmtExtra > 0 and extraTooHigh == 1', 'text' => 'For the sake of plausibility, the extra payment should not be more than the original repayment amount.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extraTooHigh',
                            'label' => 'Extra too high',
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
            'title' => 'extraTooHigh = extraPaymentTooHigh(r, t, m, q, LoanAmount, PmtExtra)',
            'results' => ['extraTooHigh' => 'extraPaymentTooHigh(r, t, m, q, LoanAmount, PmtExtra)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function calculateLoan(r,t,m,q,LoanAmount,PmtExtra){var ex=mathjs.e;var periods=q*t;var base;if(m===0){var continuous_r=Math.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(Math.pow(base,power)-1);var eq_p=eq/q;var pmt=LoanAmount*eq_p*Math.pow(1+eq_p,periods)/(Math.pow(1+eq_p,periods)-1);var totalPmt=pmt*periods;var interestPmt=totalPmt-LoanAmount;var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52.1775){k=12/52.1775}else if(q===26.08875){k=12/26.08875}else if(q===365.242){k=12/365.242}var periodsMonth=t*12;var pmtM=pmt/k;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var oldI_eq_m;var newI_eq_m=0.05;do{oldI_eq_m=newI_eq_m;var dividend_m=pmtM*periodsMonth-pmtM*periodsMonth*Math.pow(1+newI_eq_m,-periodsMonth)-newI_eq_m*LoanAmount*periodsMonth;var divisor_m=pmtM*periodsMonth*periodsMonth*Math.pow(1+newI_eq_m,-periodsMonth-1)-periodsMonth*LoanAmount;newI_eq_m=newI_eq_m-dividend_m/divisor_m;++iteration}while(Math.abs(oldI_eq_m-newI_eq_m)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_m=newI_eq_m*12;var baseM;if(m===0){var continuous_m=Math.pow(ex,12+eq_m)-1;m=12;baseM=1+continuous_m/1}else{baseM=(12+eq_m)/12}var powerM=12/m;var rMonth=m*(Math.pow(baseM,powerM)-1);var eq_base_monthly;if(m===0){var continuous_r_monthly=Math.pow(ex,rMonth)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+rMonth/m}var eq_power_monthly=m/12;rMonth=Math.pow(eq_base_monthly,eq_power_monthly)-1;var pmtMonth=pmt/k+PmtExtra/k;var princBal=LoanAmount+(pmtMonth-LoanAmount*rMonth)/(1+rMonth);var intPaid=0;var princBal_NoExtra=LoanAmount+(pmtMonth-PmtExtra/k-LoanAmount*rMonth)/(1+rMonth);var intPaid_NoExtra=0;var periodCount;var periodCountExtra=0;for(var i=0;i<=periodsMonth;i++){var intMonth=princBal*rMonth;var princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;var princBalOpen=princBal+princMonth;var intMonth_NoExtra=princBal_NoExtra*rMonth;var princMonth_NoExtra=pmtMonth-intMonth_NoExtra-PmtExtra/k;princBal_NoExtra=princBal_NoExtra-princMonth_NoExtra;if(i===0){intMonth=0;princMonth=0;intMonth_NoExtra=0;princMonth_NoExtra=0}if(princBalOpen<pmtMonth&&PmtExtra!==0){princMonth=princBalOpen}intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBal===0&&princBalOpen!==0){periodCount=i}else{periodCount=0}periodCountExtra+=periodCount;intPaid_NoExtra+=intMonth_NoExtra}return{originalPmt:pmt,originalTotalPmt:totalPmt,originalInterestPmt:interestPmt,newPmt:pmtMonth*k,newTotalPmt:LoanAmount+intPaid,newInterestPmt:intPaid,interestSaved:intPaid_NoExtra-intPaid,periodCountExtra:periodCountExtra,originalPeriods:periods*k,k:k}}omni.define("extraPaymentTooHigh",function(r,t,m,q,LoanAmount,PmtExtra){var ex=mathjs.e;var periods=q*t;var base;if(m===0){var continuous_r=Math.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(Math.pow(base,power)-1);var eq_p=eq/q;var pmt=LoanAmount*eq_p*Math.pow(1+eq_p,periods)/(Math.pow(1+eq_p,periods)-1);return PmtExtra>pmt+0.01?1:0});omni.onResult(["r","t","m","q","LoanAmount","PmtExtra"],function(ctx,values){var _values$r=values.r,r=_values$r===void 0?0.1:_values$r,_values$t=values.t,t=_values$t===void 0?10:_values$t,_values$m=values.m,m=_values$m===void 0?12:_values$m,_values$q=values.q,q=_values$q===void 0?12:_values$q,_values$LoanAmount=values.LoanAmount,LoanAmount=_values$LoanAmount===void 0?10000:_values$LoanAmount,_values$PmtExtra=values.PmtExtra,PmtExtra=_values$PmtExtra===void 0?111:_values$PmtExtra;var results=calculateLoan(r,t,m,q,LoanAmount,PmtExtra);ctx.exportValue("originalPeriodicPayment",Math.round(results.originalPmt*100)/100);ctx.exportValue("originalTotalPayment",Math.round(results.originalTotalPmt*100)/100);ctx.exportValue("originalInterestPayment",Math.round(results.originalInterestPmt*100)/100);ctx.exportValue("newPeriodicPayment",Math.round(results.newPmt*100)/100);ctx.exportValue("newTotalPayment",Math.round(results.newTotalPmt*100)/100);ctx.exportValue("newInterestPayment",Math.round(results.newInterestPmt*100)/100);ctx.exportValue("interestSaved",Math.round(results.interestSaved*100)/100);var years=Math.trunc(results.periodCountExtra/12);var months=mathjs.round(results.periodCountExtra-years*12);var years2=Math.trunc((results.originalPeriods-results.periodCountExtra)/12);var months2=mathjs.round(results.originalPeriods-results.periodCountExtra-years2*12);ctx.exportValue("payoffYears",years);ctx.exportValue("payoffMonths",months);ctx.exportValue("termShortenedYears",years2);ctx.exportValue("termShortenedMonths",months2)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Amortization works out Extra too high from Loan amount, Amortization term and Interest rate. There is no hidden constant here: change extra too high and loan amount moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Amortization calculator works', 'html' => <<<'TXT'
            <p>Amortization answers one question from 6 numbers, and the answer is Extra too high.</p><p>In the form&#039;s own words, Extra too high = extraPaymentTooHigh(Interest rate, Amortization term, Compounding frequency, Payment frequency, Loan amount, Extra payment).</p><p>What comes back is Extra too high — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Amortization term</strong> — in years / months. The length of time it takes to repay the principal (loan amount). Note that with extra payment, the initial amortization term can be shortened.</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Compounding frequency</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Extra payment</strong> — in USD. The regularity of the extra payment always corresponds to the payment frequency.</li></ul><p>What you get back is Extra too high, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Amortization term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Extra too high</strong> = <code>extraPaymentTooHigh(Interest rate, Amortization term, Compounding frequency, Payment frequency, Loan amount, Extra payment)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Amortization term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Extra too high is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Amortization term left as a guess.</strong> Anything typed into Amortization term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Loan amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. Change it and Extra too high changes with it. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amortization term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The length of time it takes to repay the principal (loan amount). Note that with extra payment, the initial amortization term can be shortened. Change it and Extra too high changes with it. Have it to hand before you start: Amortization term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual rate of interest. Change it and Extra too high changes with it. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. Change it and Extra too high changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. Change it and Extra too high changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Payment frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Extra payment</strong> takes a plain number with no unit attached. The regularity of the extra payment always corresponds to the payment frequency. Change it and Extra too high changes with it. Have it to hand before you start: Extra payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Extra too high</strong> is a plain number. The value follows from Interest rate, Amortization term, Compounding frequency and Payment frequency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Loan amount, Amortization term, Interest rate and Compounding frequency. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Loan amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Extra too high with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Extra too high is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Amortization term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan amount, Amortization term and Interest rate is what you already know and Extra too high is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cost-function">Cost function</a>, <a href="/finance/cost-of-capital">Cost of capital Calculator</a> and <a href="/finance/cost-of-doing-business">Cost of doing business</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Amortization is a number to act on, so the useful question is what to do with Extra too high once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Loan amount, Amortization term, Interest rate and Compounding frequency alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Amortization calculator work out?', 'a' => <<<'TXT'
            Extra too high, from Interest rate, Amortization term, Compounding frequency and Payment frequency. The relationship is Extra too high = extraPaymentTooHigh(Interest rate, Amortization term, Compounding frequency, Payment frequency, Loan amount, Extra payment).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Amortization term (years / months), Interest rate (percent), Compounding frequency, Payment frequency. With loan amount, amortization term and interest rate in place, Extra too high can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Extra too high is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Extra too high, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Extra too high at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/cost-function', 'name' => 'Cost function'],
            ['path' => '/finance/cost-of-capital', 'name' => 'Cost of capital Calculator'],
            ['path' => '/finance/cost-of-doing-business', 'name' => 'Cost of doing business'],
        ],
        'authors' => [],
    ],
];
