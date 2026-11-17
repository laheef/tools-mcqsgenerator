<?php

/**
 * ARM mortgage
 * /finance/arm-mortgage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ARM mortgage',
    'meta' => ['title' => 'ARM mortgage Calculator — Formula & Results', 'description' => 'ARM mortgage turns mortgage balance, term and interest rate at the beginning of term into mortgage points and first payment. Any box can be the unknown.', 'h1' => 'ARM mortgage Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Mortgage balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '250000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Term',
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
                            'name' => 'r',
                            'label' => 'Interest rate at the beginning of term',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advanced',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Adjust compounding and fees' => '1', '' => '0'],
                            'dataset' => 'advanced',
                            'control' => 'CHECKBOX',
                            'default' => '',
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
                            'dataset' => 'CompoundFreq',
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
                            'help' => 'The upfront fee as a percentage of the mortgage.',
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
                            'name' => 'CostProc',
                            'label' => 'Up-front fee',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cost',
                            'label' => 'Annual fee',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ArmType',
                            'label' => 'ARM type',
                            'type' => 'select',
                            'options' => [
                                '10/1 ARM' => '1',
                                '7/1 ARM' => '2',
                                '5/1 ARM' => '3',
                                '3/1 ARM' => '4',
                                'Customized' => '5',
                            ],
                            'dataset' => 'ArmType',
                            'control' => 'DROPDOWN',
                            'default' => '10/1 ARM',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjSet',
                            'label' => 'Adjustments by...',
                            'type' => 'select',
                            'options' => ['Manual setup' => '1', 'Trend' => '2'],
                            'dataset' => 'IntAdjSet',
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            With the manual setup, the interest rate alters periodically with the given percentage points. If you choose a trend, the interest rate alters steadily until it reaches the given rate at the end of the term.
                            TXT,
                            'default' => 'Manual setup',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjTrend',
                            'label' => 'Expected interest rate at the last period',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdj',
                            'label' => 'Expected adjustment',
                            'type' => 'number',
                            'help' => 'Set a negative value if you expect a lower interest rate in the future.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjPer',
                            'label' => 'First adjustment after...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjFreq',
                            'label' => 'Periods between adjustments',
                            'type' => 'number',
                            'help' => 'If you set this value to zero, adjustment will occur only once after the given first adjustment period.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjMax',
                            'label' => 'Interest rate cap',
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
                            'name' => 'IntAdjMin',
                            'label' => 'Interest rate floor',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other variables (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Q',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarTable',
                            'label' => 'Var table',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => 'Show...',
                            'type' => 'select',
                            'options' => ['Monthly schedule' => '1', 'Annual schedule' => '2'],
                            'dataset' => 'TableFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Annual schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarIntAdj',
                            'label' => 'Var int adj',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
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
                            'name' => 'armMortgage',
                            'label' => 'Arm mortgage',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firstPayment',
                            'label' => 'First payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apr',
                            'label' => 'Apr',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lastPayment',
                            'label' => 'Last payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paidInterest',
                            'label' => 'Paid interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalPaymentsNoCosts',
                            'label' => 'Total payments no costs',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'additional_costs',
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
                            'name' => 'totalPayments',
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
            'title' => 'CostPerc = CostProc / LoanAmount',
            'results' => ['CostProc' => 'CostPerc*LoanAmount', 'LoanAmount' => 'CostProc/CostPerc', 'CostPerc' => 'CostProc/LoanAmount'],
        ],
        [
            'title' => 'armMortgage = calculateARMMortgage(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)',
            'results' => ['armMortgage' => 'calculateARMMortgage(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => 'firstPayment = get_firstPayment()',
            'results' => ['firstPayment' => 'get_firstPayment()'],
        ],
        [
            'title' => 'lastPayment = get_lastPayment()',
            'results' => ['lastPayment' => 'get_lastPayment()'],
        ],
        [
            'title' => 'apr = get_apr()',
            'results' => ['apr' => 'get_apr()'],
        ],
        [
            'title' => 'paidInterest = get_paidInterest()',
            'results' => ['paidInterest' => 'get_paidInterest()'],
        ],
        [
            'title' => 'totalPaymentsNoCosts = get_totalPaymentsNoCosts()',
            'results' => ['totalPaymentsNoCosts' => 'get_totalPaymentsNoCosts()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var apr=0;var paidInterest=0;var totalPaymentsNoCosts=0;var firstPayment=0;var lastPayment=0;function getPerEqRate(q,_m,r){var m=Number(_m);var ex=Math.exp(1);var base;if(m===0){var continuous_r=Math.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(Math.pow(base,power)-1,10);return eq_p}function getPmt(LoanAmount,t,q,eq_p){var periods=t*q;var Pmt=LoanAmount*eq_p*Math.pow(1+eq_p,periods)/(Math.pow(1+eq_p,periods)-1);return Pmt}function getAPR(LoanAmount,Pmt,Per,FeePre,q){var Max_iterations=50000;var Min_precision=1e-7;var APR_approx=2*q*(Pmt*Per+FeePre-LoanAmount)/(LoanAmount*(Per+1));var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=Pmt-Pmt*Math.pow(1+newI,-Per)-newI*(LoanAmount-FeePre);var divisor=Pmt*Per*Math.pow(1+newI,-Per-1)-(LoanAmount-FeePre);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);return newI*q}omni.define("calculateARMMortgage",function(_r,_t,_m,_q,_LoanAmount,_CostPerc,_Cost,_IntAdj,_IntAdjFreq,_IntAdjMax,_IntAdjMin,_IntAdjPer,_IntAdjTrend,_VarIntAdj,_VarType){var r=Number(_r);var t=Number(_t);var m=Number(_m);var q=Number(_q);var LoanAmount=Number(_LoanAmount);var CostPerc=Number(_CostPerc);var Cost=Number(_Cost);var IntAdj=Number(_IntAdj);var IntAdjFreq=Number(_IntAdjFreq);var IntAdjMax=Number(_IntAdjMax);var IntAdjMin=Number(_IntAdjMin);var IntAdjPer=Number(_IntAdjPer);var IntAdjTrend=Number(_IntAdjTrend);var VarIntAdj=Number(_VarIntAdj);var VarType=Number(_VarType);var IntAdjPerActual=IntAdjPer;var IntAdjFreqActual=IntAdjFreq;if(VarType===10){IntAdjPerActual=120;IntAdjFreqActual=12}else if(VarType===7){IntAdjPerActual=84;IntAdjFreqActual=12}else if(VarType===5){IntAdjPerActual=60;IntAdjFreqActual=12}else if(VarType===3){IntAdjPerActual=36;IntAdjFreqActual=12}var periods=q*t;var periodsLoop=q*t;var CostMonth=Cost/12;var eq_p=getPerEqRate(q,m,r);var eq_pAdj=getPerEqRate(q,m,IntAdj);var eq_pMax=getPerEqRate(q,m,IntAdjMax);var eq_pMin=getPerEqRate(q,m,IntAdjMin);var eq_pTrend=getPerEqRate(q,m,IntAdjTrend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-IntAdjPerActual)*IntAdjFreqActual;var pmt=getPmt(LoanAmount,t,q,eq_p);var CostUpfront=LoanAmount*CostPerc;var rMonth=eq_p;var pmtMonth=pmt;var princBal=LoanAmount;var princBalOpen;var princMonth;var intMonth;var intPaid=0;var intRateSumRep=0;var IntAdjPerLoop=IntAdjPerActual;for(var i=1;i<=periodsLoop;i++){if(VarIntAdj===2&&i>IntAdjPerActual&&((i-1-IntAdjPerActual)%IntAdjFreqActual===1&&IntAdjFreqActual>1||(i-1-IntAdjPerActual)%IntAdjFreqActual===0&&IntAdjFreqActual===1)){rMonth=rMonth+eq_pTrendAdd}if(i===IntAdjPerLoop+1&&VarIntAdj===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(VarIntAdj===2&&r<IntAdjTrend&&rMonth>eq_pTrend){rMonth=eq_pTrend}if(VarIntAdj===2&&r>IntAdjTrend&&rMonth<eq_pTrend){rMonth=eq_pTrend}if(VarIntAdj===1&&IntAdj>0&&rMonth>eq_pMax){rMonth=eq_pMax}if(VarIntAdj===1&&IntAdj<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i>IntAdjPerLoop&&VarIntAdj===1){IntAdjPerLoop+=IntAdjFreqActual}if(rMonth===0){rMonth=1e-11}pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,q,rMonth);intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(princBalOpen<pmtMonth){princMonth=princBalOpen}intRateSumRep+=rMonth;intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}}var intRateRep=intRateSumRep/periods;var pmtAveRep=getPmt(LoanAmount,periods/12,12,intRateRep);apr=getAPR(LoanAmount,pmtAveRep+CostMonth,periods,CostUpfront,q)*100;paidInterest=intPaid;totalPaymentsNoCosts=intPaid+LoanAmount;firstPayment=pmt+CostMonth;lastPayment=pmtMonth+CostMonth;return 1});omni.define("get_firstPayment",function(){return firstPayment});omni.define("get_lastPayment",function(){return lastPayment});omni.define("get_apr",function(){return apr});omni.define("get_paidInterest",function(){return paidInterest});omni.define("get_totalPaymentsNoCosts",function(){return totalPaymentsNoCosts});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Mortgage balance, Term and Interest rate at the beginning of term into ARM mortgage and the answer comes back as M and Var table. It is a single relationship that reads m out of mortgage balance, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the ARM mortgage calculator works', 'html' => <<<'TXT'
            <p>The ARM mortgage calculator applies one relationship to 23 numbers and reports M, Var table and Var int adj.</p><p>In the form&#039;s own words, Mortgage points = Up-front fee ÷ Mortgage balance.</p><p>What comes back is M, Var table, Var int adj and Var type — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 23 boxes and the page has everything it needs.</p><ul><li><strong>Mortgage balance</strong> — in USD</li><li><strong>Term</strong> — in years</li><li><strong>Interest rate at the beginning of term</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Mortgage points</strong> — in percent. The upfront fee as a percentage of the mortgage.</li><li><strong>Up-front fee</strong> — in USD</li><li><strong>Annual fee</strong> — in USD</li><li><strong>ARM type</strong> — a plain number, no unit</li><li><strong>Adjustments by…</strong> — a plain number, no unit. With the manual setup, the interest rate alters periodically with the given percentage points. If you choose a trend, the interest rate alters steadily until it reaches the given rate at the end of the term.</li><li><strong>Expected interest rate at the last period</strong> — in percent</li><li><strong>Expected adjustment</strong> — in percent. Set a negative value if you expect a lower interest rate in the future.</li><li><strong>First adjustment after…</strong> — in years</li><li><strong>Periods between adjustments</strong> — in months. If you set this value to zero, adjustment will occur only once after the given first adjustment period.</li><li><strong>Interest rate cap</strong> — in percent</li><li><strong>Interest rate floor</strong> — in percent</li><li><strong>Q</strong> — a plain number, no unit</li><li><strong>Show…</strong> — a plain number, no unit</li><li><strong>Arm mortgage</strong> — a plain number, no unit</li><li><strong>First payment</strong> — in USD</li><li><strong>Apr</strong> — a plain number, no unit</li><li><strong>Last payment</strong> — in USD</li><li><strong>Paid interest</strong> — in USD</li><li><strong>Total payments no costs</strong> — in USD</li></ul><p>What you get back is M, Var table, Var int adj, Var type, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Term lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Mortgage points</strong> = <code>Up-front fee ÷ Mortgage balance</code></li><li><strong>Up-front fee</strong> = <code>Mortgage points × Mortgage balance</code></li><li><strong>Mortgage balance</strong> = <code>Up-front fee ÷ Mortgage points</code></li><li><strong>First payment</strong> = <code>get_firstPayment()</code></li><li><strong>Last payment</strong> = <code>get_lastPayment()</code></li><li><strong>Apr</strong> = <code>get_apr()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Mortgage points</strong> = <code>Up-front fee ÷ Mortgage balance</code> — the form to use when Up-front fee and Mortgage balance are the values you have.</li><li><strong>Up-front fee</strong> = <code>Mortgage points × Mortgage balance</code> — the form to use when Mortgage points and Mortgage balance are the values you have.</li><li><strong>Mortgage balance</strong> = <code>Up-front fee ÷ Mortgage points</code> — the form to use when Up-front fee and Mortgage points are the values you have.</li><li><strong>First payment</strong> = <code>get_firstPayment()</code> — the form to use when the other values are known.</li><li><strong>Last payment</strong> = <code>get_lastPayment()</code> — the form to use when the other values are known.</li><li><strong>Apr</strong> = <code>get_apr()</code> — the form to use when the other values are known.</li><li><strong>Paid interest</strong> = <code>get_paidInterest()</code> — the form to use when the other values are known.</li><li><strong>Total payments no costs</strong> = <code>get_totalPaymentsNoCosts()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Mortgage points, Up-front fee and Mortgage balance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Term, Interest rate at the beginning of term and Mortgage points carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> M, Var table and Var int adj are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mortgage balance left as a guess.</strong> Anything typed into Mortgage balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Term left as a guess.</strong> Anything typed into Term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Mortgage balance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Mortgage balance, Term, Interest rate at the beginning of term and Compounding frequency. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Mortgage balance into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare M with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind M is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mortgage balance, Term and Interest rate at the beginning of term are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mortgage balance, Term and Interest rate at the beginning of term is what you already know and M and Var table is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/price-quantity">Price / quantity Calculator</a>, <a href="/finance/price-elasticity-demand">Price elasticity of demand Calculator</a> and <a href="/finance/price-elasticity-supply">Price elasticity of supply Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that ARM mortgage leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/price-quantity">Price / quantity Calculator</a>, <a href="/finance/price-elasticity-demand">Price elasticity of demand Calculator</a> and <a href="/finance/price-elasticity-supply">Price elasticity of supply Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from ARM mortgage is a number to act on, so the useful question is what to do with M, Var table and Var int adj once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Mortgage balance, Term, Interest rate at the beginning of term and Compounding frequency alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ARM mortgage calculator work out?', 'a' => 'M, Var table, Var int adj and Var type, from Up-front fee and Mortgage balance. The relationship is Mortgage points = Up-front fee ÷ Mortgage balance.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mortgage balance (USD), Term (years), Interest rate at the beginning of term (percent), Compounding frequency, Mortgage points (percent). Enter mortgage balance, term and interest rate at the beginning of term; M is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Mortgage points, Up-front fee, Mortgage balance and Arm mortgage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of M is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Mortgage balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. M keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/price-quantity', 'name' => 'Price / quantity Calculator'],
            ['path' => '/finance/price-elasticity-demand', 'name' => 'Price elasticity of demand Calculator'],
            ['path' => '/finance/price-elasticity-supply', 'name' => 'Price elasticity of supply Calculator'],
        ],
        'authors' => [],
    ],
];
