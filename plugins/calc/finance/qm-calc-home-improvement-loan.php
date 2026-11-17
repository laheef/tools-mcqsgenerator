<?php

/**
 * Home improvement loan
 * /finance/home-improvement-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Home improvement loan',
    'meta' => ['title' => 'Home improvement loan: Formula, Steps & Results', 'description' => 'Home improvement loan turns loan amount and loan term into application fee % and application fee. Every box can be solved for, not only the one in the title.', 'h1' => 'Home improvement loan Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => 'Loan inputs',
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
                            'default' => '50000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
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
                            'default' => '7.5',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'CostPerc',
                            'label' => 'Application fee %',
                            'type' => 'number',
                            'help' => 'The application fee as a percentage of the loan amount.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'CostProc',
                            'label' => 'Application fee',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cost',
                            'label' => 'Home loan fees',
                            'type' => 'number',
                            'help' => 'Include any other one-time upfront fees other than the processing fee here.',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => ['Monthly' => '12', 'Bi-weekly' => '26.08875', 'Weekly' => '52.1775'],
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
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'DATA3',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly (UK & US)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'First due date', 'type' => 'date'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getAPR',
                            'label' => 'Get apr',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getCostTotal',
                            'label' => 'Get cost total',
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
                            'name' => 'getIntPaid',
                            'label' => 'Get int paid',
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
                            'name' => 'getPMT',
                            'label' => 'Get pmt',
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
                            'name' => 'getPrincPaid',
                            'label' => 'Get princ paid',
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
                            'name' => 'getTotalPayment',
                            'label' => 'Get total payment',
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
                            'name' => 'loanRepayment',
                            'label' => 'Loan repayment',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
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
            'title' => 'CostPerc = CostProc / LoanAmount',
            'results' => ['CostPerc' => 'CostProc/LoanAmount', 'CostProc' => 'CostPerc*LoanAmount', 'LoanAmount' => 'CostProc/CostPerc'],
        ],
        [
            'title' => 'loanRepayment = getHomeImprovLoan(r,t,m,q,LoanAmount,CostPerc,Cost)',
            'results' => ['loanRepayment' => 'getHomeImprovLoan(r, t, m, q, LoanAmount, CostPerc, Cost)'],
        ],
        [
            'title' => 'getPMT = PMT()',
            'results' => ['getPMT' => 'PMT()'],
        ],
        [
            'title' => 'getAPR = apr()',
            'results' => ['getAPR' => 'apr()'],
        ],
        [
            'title' => 'getPrincPaid = princPaid1()',
            'results' => ['getPrincPaid' => 'princPaid1()'],
        ],
        [
            'title' => 'getIntPaid = intPaid1()',
            'results' => ['getIntPaid' => 'intPaid1()'],
        ],
        [
            'title' => 'getCostTotal = CostTotal1()',
            'results' => ['getCostTotal' => 'CostTotal1()'],
        ],
        [
            'title' => 'getTotalPayment = TotalPayment()',
            'results' => ['getTotalPayment' => 'TotalPayment()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var apr=0;var TotalPayment=0;var pmt=0;var princPaid=0;var intPaid=0;var CostTotal=0;omni.define("getHomeImprovLoan",function(_r,_t,_m,_q,_LoanAmount,_CostPerc,_Cost){apr=0;TotalPayment=0;pmt=0;princPaid=0;intPaid=0;CostTotal=0;var r=Number(_r);var t=Number(_t);var m=Number(_m);var q=Number(_q);var LoanAmount=Number(_LoanAmount);var CostPerc=Number(_CostPerc);var Cost=Number(_Cost);var periods=q*t;var eq_p=getPerEqRate(q,m,r);pmt=getPmt(LoanAmount,t,q,eq_p);var CostPoints=LoanAmount*CostPerc;CostTotal=CostPoints+Cost;var rMonth=eq_p;var i;var princYear=0;var pmtMonth=pmt;var princBal=LoanAmount;var princBalOpen=0;var princMonth=0;var intMonth=0;for(i=0;i<=periods;i++){if(i>0){intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(i===0){intMonth=0;princMonth=0}if(princBalOpen<pmtMonth){princMonth=princBalOpen}intPaid+=intMonth;princPaid+=princMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBal<=0){princPaid=LoanAmount}princYear+=princMonth}}apr=mathjs.round(getAPR(LoanAmount,pmt,periods,CostTotal,q)*100,3);TotalPayment=princPaid+intPaid+CostTotal;return 1});omni.define("PMT",function(){return pmt});omni.define("apr",function(){return apr});omni.define("princPaid1",function(){return princPaid});omni.define("intPaid1",function(){return intPaid});omni.define("CostTotal1",function(){return CostTotal});omni.define("TotalPayment",function(){return TotalPayment});function getAPR(LoanAmount,Pmt,Per,FeePre,q){var Max_iterations=5000;var Min_precision=1e-7;var APR_approx=2*q*(Pmt*Per+FeePre-LoanAmount)/(LoanAmount*(Per+1));var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=Pmt-Pmt*mathjs.pow(1+newI,-Per)-newI*(LoanAmount-FeePre);var divisor=Pmt*Per*mathjs.pow(1+newI,-Per-1)-(LoanAmount-FeePre);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);return newI*q}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getPmt(LoanAmount,t,q,eq_p){var periods=t*q;var Pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);return Pmt}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Home improvement loan turns Loan amount, Loan term and Interest rate into Application fee. The arithmetic is the whole method: application fee is worked out from loan amount by one formula, applied once. Application fee comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Home improvement loan calculator works', 'html' => <<<'TXT'
            <p>Home improvement loan answers one question from 16 numbers, and the answer is Application fee.</p><p>The relationship it solves reads Application fee % = Application fee ÷ Loan amount.</p><p>What comes back is Application fee — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 16 boxes and the page has everything it needs.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Application fee %</strong> — in percent. The application fee as a percentage of the loan amount.</li><li><strong>Home loan fees</strong> — in USD. Include any other one-time upfront fees other than the processing fee here.</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>M</strong> — a plain number, no unit</li><li><strong>First due date</strong> — a plain number, no unit, entered as a date</li><li><strong>Extra monthly payment</strong> — in USD</li><li><strong>Get apr</strong> — a plain number, no unit</li><li><strong>Get cost total</strong> — in USD</li><li><strong>Get int paid</strong> — in USD</li><li><strong>Get pmt</strong> — in USD</li><li><strong>Get princ paid</strong> — in USD</li><li><strong>Get total payment</strong> — in USD</li><li><strong>Loan repayment</strong> — in USD</li></ul><p>The answer comes back as Application fee in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Application fee %</strong> = <code>Application fee ÷ Loan amount</code></li><li><strong>Application fee</strong> = <code>Application fee % × Loan amount</code></li><li><strong>Loan amount</strong> = <code>Application fee ÷ Application fee %</code></li><li><strong>Loan repayment</strong> = <code>getHomeImprovLoan(Interest rate, Loan term, M, Payment frequency, Loan amount, Application fee %, Home loan fees)</code></li><li><strong>Get pmt</strong> = <code>PMT()</code></li><li><strong>Get apr</strong> = <code>apr()</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Application fee %</strong> = <code>Application fee ÷ Loan amount</code> — the form to use when Application fee and Loan amount are the values you have.</li><li><strong>Application fee</strong> = <code>Application fee % × Loan amount</code> — the form to use when Application fee % and Loan amount are the values you have.</li><li><strong>Loan amount</strong> = <code>Application fee ÷ Application fee %</code> — the form to use when Application fee and Application fee % are the values you have.</li><li><strong>Loan repayment</strong> = <code>getHomeImprovLoan(Interest rate, Loan term, M, Payment frequency, Loan amount, Application fee %, Home loan fees)</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li><li><strong>Get pmt</strong> = <code>PMT()</code> — the form to use when the other values are known.</li><li><strong>Get apr</strong> = <code>apr()</code> — the form to use when the other values are known.</li><li><strong>Get princ paid</strong> = <code>princPaid1()</code> — the form to use when the other values are known.</li><li><strong>Get int paid</strong> = <code>intPaid1()</code> — the form to use when the other values are known.</li></ul><p>Any one of Application fee %, Application fee and Loan amount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loan term, Interest rate and Application fee % is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Application fee is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Loan term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. It feeds Application fee %, Application fee and Loan repayment. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Loan repayment. Have it to hand before you start: Loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual rate of interest. It feeds Loan repayment. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Application fee %</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The application fee as a percentage of the loan amount. It feeds Application fee, Loan amount and Loan repayment. Have it to hand before you start: Application fee % is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Home loan fees</strong> takes a plain number with no unit attached. Include any other one-time upfront fees other than the processing fee here. It feeds Loan repayment. Have it to hand before you start: Home loan fees is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. It feeds Loan repayment. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Payment frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>M</strong> takes a plain number with no unit attached. It feeds Loan repayment. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: M is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>First due date</strong> takes a plain number with no unit attached. Have it to hand before you start: First due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Extra monthly payment</strong> takes a plain number with no unit attached. Have it to hand before you start: Extra monthly payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Get apr</strong> takes a plain number with no unit attached. Have it to hand before you start: Get apr is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Get cost total</strong> takes a plain number with no unit attached. Have it to hand before you start: Get cost total is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Get int paid</strong> takes a plain number with no unit attached. Have it to hand before you start: Get int paid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Get pmt</strong> takes a plain number with no unit attached. Have it to hand before you start: Get pmt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Get princ paid</strong> takes a plain number with no unit attached. Have it to hand before you start: Get princ paid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Get total payment</strong> takes a plain number with no unit attached. Have it to hand before you start: Get total payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan repayment</strong> takes a plain number with no unit attached. Have it to hand before you start: Loan repayment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Application fee</strong> is a plain number. The value follows from Application fee % and Loan amount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Application fee follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Loan term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan amount, Loan term and Interest rate and the number you are missing is Application fee.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/moving-average">Moving average Calculator</a>, <a href="/finance/mps">MPS (marginal propensity to save) Calculator</a> and <a href="/finance/mutual-fund">Mutual fund Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Home improvement loan calculator work out?', 'a' => 'Application fee, from Application fee and Loan amount. The relationship is Application fee % = Application fee ÷ Loan amount.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Loan term (years / months), Interest rate (percent), Application fee % (percent), Home loan fees (USD). With loan amount, loan term and interest rate in place, Application fee can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Application fee %, Application fee, Loan amount and Loan repayment blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Application fee is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Application fee at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/moving-average', 'name' => 'Moving average Calculator'],
            ['path' => '/finance/mps', 'name' => 'MPS (marginal propensity to save) Calculator'],
            ['path' => '/finance/mutual-fund', 'name' => 'Mutual fund Calculator'],
        ],
        'authors' => [],
    ],
];
