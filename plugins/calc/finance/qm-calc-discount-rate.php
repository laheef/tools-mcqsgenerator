<?php

/**
 * Discount rate
 * /finance/discount-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Discount rate',
    'meta' => ['title' => 'Discount rate Calculator — Formula & Results', 'description' => 'Discount rate turns present Value (PV) and Future Value (FV) into final payout on.... Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Discount rate Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Present Value (PV)',
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
                            'name' => 'FinBal',
                            'label' => 'Future Value (FV)',
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
                            'name' => 'Timing',
                            'label' => 'Set term by...',
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
                            'name' => 't',
                            'label' => 'Term or number of periods',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'Starting from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'EndDate', 'label' => 'Final payout on...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly (1/Yr)' => '1',
                                'Semi-annually (2/Yr)' => '2',
                                'Quarterly (4/Yr)' => '3',
                                'Monthly (12/Yr)' => '4',
                                'Weekly (52/Yr)' => '5',
                                'Daily (365/Yr)' => '6',
                                'Continuous (∞)' => '7',
                            ],
                            'dataset' => 'CompFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly (1/Yr)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Infl',
                            'label' => 'Inflation rate',
                            'type' => 'number',
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
                            'name' => 'VarTime',
                            'label' => 'Var time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Periodic cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'Cash flow (CF)',
                            'type' => 'number',
                            'help' => 'Set negative cash flow (withdrawal) by providing a negative value.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RecFreq',
                            'label' => 'Cash flow frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '3',
                                'Monthly' => '4',
                                'Weekly' => '5',
                                'Daily' => '6',
                            ],
                            'dataset' => 'RecFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type of cash flows',
                            'type' => 'select',
                            'options' => ['Beginning of period' => '1', 'End of period' => '2'],
                            'dataset' => 'Type',
                            'control' => 'DROPDOWN',
                            'default' => 'End of period',
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
                            'default' => '1',
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
                                ['when' => 'flag_r==0', 'text' => 'The estimated annual discount rate is {{annual.value}}%.'],
                                ['when' => 'PerPay!=0 and flag_r==0', 'text' => 'The total cash flow is {{global.currencySymbol}}{{total.value}}.'],
                                ['when' => 'm >= 2 and flag_r==0', 'text' => 'The periodic discount rate is {{periodic.value}}%.&nbsp;'],
                                ['when' => 'flag_r ==1', 'text' => 'The discount rate cannot be determined with the given parameters.'],
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
                            'name' => 'flag_r',
                            'label' => 'Flag r',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rr',
                            'label' => 'Rr',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'Rep',
                            'label' => 'Display',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Q',
                            'type' => 'result',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rr = sum(InDep, FinBal, Infl,m, q, t, VarType, VarTime, VarRep,   PerPay)',
            'results' => [
                'FinBal' => '-InDep - Infl - PerPay - VarRep - VarTime - VarType - m - q + rr - t',
                'VarRep' => '-FinBal - InDep - Infl - PerPay - VarTime - VarType - m - q + rr - t',
                'Infl' => '-FinBal - InDep - PerPay - VarRep - VarTime - VarType - m - q + rr - t',
                'PerPay' => '-FinBal - InDep - Infl - VarRep - VarTime - VarType - m - q + rr - t',
                'InDep' => '-FinBal - Infl - PerPay - VarRep - VarTime - VarType - m - q + rr - t',
                'm' => '-FinBal - InDep - Infl - PerPay - VarRep - VarTime - VarType - q + rr - t',
                'VarType' => '-FinBal - InDep - Infl - PerPay - VarRep - VarTime - m - q + rr - t',
                'q' => '-FinBal - InDep - Infl - PerPay - VarRep - VarTime - VarType - m + rr - t',
                'rr' => 'FinBal + InDep + Infl + PerPay + VarRep + VarTime + VarType + m + q + t',
                'VarTime' => '-FinBal - InDep - Infl - PerPay - VarRep - VarType - m - q + rr - t',
                't' => '-FinBal - InDep - Infl - PerPay - VarRep - VarTime - VarType - m - q + rr',
            ],
        ],
        [
            'title' => 'EndDate  = one_way(StartDate+10)',
            'results' => ['EndDate' => '(StartDate + 10)'],
        ],
        [
            'title' => 'flag_r = test_r(InDep, FinBal, Infl,m, q, t, VarType, VarTime, VarRep,  PerPay) ',
            'results' => ['flag_r' => 'test_r(InDep, FinBal, Infl, m, q, t, VarType, VarTime, VarRep, PerPay)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var milisecondsInADay=24*60*60*1000;omni.define("test_r",function(InDep,FinBal,Infl,m,q,t,VarType,VarTime,VarRep,PerPay){var date=new Date;date.setFullYear(date.getFullYear()+10);var StartDate=Math.floor(new Date().getTime()/milisecondsInADay).toString();var EndDate=date.getTime()/milisecondsInADay;var dayDiff;var FirstDate=new Date(StartDate*milisecondsInADay);if(FirstDate.getMonth()===0){dayDiff=31}else if(FirstDate.getMonth()===1){dayDiff=31}else if(FirstDate.getDate()===27&&FirstDate.getMonth()===2){dayDiff=28}else if(FirstDate.getDate()===28&&FirstDate.getMonth()===2){dayDiff=28}else if(FirstDate.getDate()===29&&FirstDate.getMonth()===2){dayDiff=29}else if(FirstDate.getDate()===30&&FirstDate.getMonth()===2){dayDiff=30}else if(FirstDate.getDate()===31&&FirstDate.getMonth()===2){dayDiff=31}else if(FirstDate.getMonth()===2){dayDiff=28}else if(FirstDate.getMonth()===3){dayDiff=31}else if(FirstDate.getMonth()===4){dayDiff=30}else if(FirstDate.getMonth()===5){dayDiff=31}else if(FirstDate.getMonth()===6){dayDiff=30}else if(FirstDate.getMonth()===7){dayDiff=31}else if(FirstDate.getMonth()===8){dayDiff=31}else if(FirstDate.getMonth()===9){dayDiff=30}else if(FirstDate.getMonth()===10){dayDiff=31}else if(FirstDate.getMonth()===11){dayDiff=30}var year=FirstDate.getYear()-100;if(q===12&&year%4===0&&FirstDate.getYear()/100%4!==0&&FirstDate.getMonth()===2||q===12&&(FirstDate.getYear()+1900)/400%4===0&&FirstDate.getMonth()===2){dayDiff=29}if(year%4===0&&FirstDate.getYear()/100%4!==0&&FirstDate.getMonth()===2&&FirstDate.getDate()===30||(FirstDate.getYear()+1900)/400%4===0&&FirstDate.getMonth()===2){dayDiff=30}if(year%4===0&&FirstDate.getYear()/100%4!==0&&FirstDate.getMonth()===2&&FirstDate.getDate()===31||(FirstDate.getYear()+1900)/400%4===0&&FirstDate.getMonth()===2){dayDiff=31}if(q===12&&FirstDate.getDate()===29&&FirstDate.getMonth()===1){dayDiff=31}if(q===12&&FirstDate.getDate()===28&&FirstDate.getMonth()===1){dayDiff=31}StartDate=StartDate-dayDiff;var dayInTerm=mathjs.floor(EndDate-StartDate-dayDiff);var ex=Math.exp(1);var periods=0;if(VarTime===1){periods=q*t}if(VarTime===2){periods=Math.ceil(dayInTerm/q)}var eq_p=0;var maxIter=50000;var minPrec=1e-7;var oldI;var newI=0.1;var iteration=0;do{oldI=newI;var dividend=InDep*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InDep*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>minPrec&&iteration<=maxIter);eq_p=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(mathjs.abs(oldR-newR)>minPrec&&iterationR<=maxIter);var eq_p2=newR;eq_p=eq_p2/q;var r=eq_p*q*100;return isNaN(r)});omni.onResult(["InDep","FinBal","t"],function(ctx,_ref){var InDep=_ref.InDep,FinBal=_ref.FinBal,Infl=_ref.Infl,m=_ref.m,q=_ref.q,t=_ref.t,VarType=_ref.VarType,VarTime=_ref.VarTime,PerPay=_ref.PerPay;var hide=0;var hide2=0;var hide3=0;var date=new Date;date.setFullYear(date.getFullYear()+10);var EndDate=date.getTime()/milisecondsInADay;var annual1,periodic1="";if(PerPay===0&&InDep===0){hide=1}else{hide=0}if(InDep===FinBal+q*PerPay){hide2=1}else{hide2=0}var StartDate=Math.floor(new Date().getTime()/milisecondsInADay).toString();if(PerPay===0&&InDep===0){hide=1}else{hide=0}if(InDep===FinBal+q*PerPay){hide2=1}else{hide2=0}var dayDiff;var FirstDate=new Date(StartDate*milisecondsInADay);if(FirstDate.getMonth()===0){dayDiff=31}else if(FirstDate.getMonth()===1){dayDiff=31}else if(FirstDate.getDate()===27&&FirstDate.getMonth()===2){dayDiff=28}else if(FirstDate.getDate()===28&&FirstDate.getMonth()===2){dayDiff=28}else if(FirstDate.getDate()===29&&FirstDate.getMonth()===2){dayDiff=29}else if(FirstDate.getDate()===30&&FirstDate.getMonth()===2){dayDiff=30}else if(FirstDate.getDate()===31&&FirstDate.getMonth()===2){dayDiff=31}else if(FirstDate.getMonth()===2){dayDiff=28}else if(FirstDate.getMonth()===3){dayDiff=31}else if(FirstDate.getMonth()===4){dayDiff=30}else if(FirstDate.getMonth()===5){dayDiff=31}else if(FirstDate.getMonth()===6){dayDiff=30}else if(FirstDate.getMonth()===7){dayDiff=31}else if(FirstDate.getMonth()===8){dayDiff=31}else if(FirstDate.getMonth()===9){dayDiff=30}else if(FirstDate.getMonth()===10){dayDiff=31}else if(FirstDate.getMonth()===11){dayDiff=30}var year=FirstDate.getYear()-100;if(q===12&&year%4===0&&FirstDate.getYear()/100%4!==0&&FirstDate.getMonth()===2||q===12&&(FirstDate.getYear()+1900)/400%4===0&&FirstDate.getMonth()===2){dayDiff=29}if(year%4===0&&FirstDate.getYear()/100%4!==0&&FirstDate.getMonth()===2&&FirstDate.getDate()===30||(FirstDate.getYear()+1900)/400%4===0&&FirstDate.getMonth()===2){dayDiff=30}if(year%4===0&&FirstDate.getYear()/100%4!==0&&FirstDate.getMonth()===2&&FirstDate.getDate()===31||(FirstDate.getYear()+1900)/400%4===0&&FirstDate.getMonth()===2){dayDiff=31}if(q===12&&FirstDate.getDate()===29&&FirstDate.getMonth()===1){dayDiff=31}if(q===12&&FirstDate.getDate()===28&&FirstDate.getMonth()===1){dayDiff=31}StartDate=StartDate-dayDiff;var dayInTerm=mathjs.floor(EndDate-StartDate-dayDiff);var ex=Math.exp(1);var periods=0;if(VarTime===1){periods=q*t}if(VarTime===2){periods=Math.ceil(dayInTerm/q)}var eq_p=0;var maxIter=50000;var minPrec=1e-7;var oldI;var newI=0.1;var iteration=0;do{oldI=newI;var dividend=InDep*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InDep*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>minPrec&&iteration<=maxIter);eq_p=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(mathjs.abs(oldR-newR)>minPrec&&iterationR<=maxIter);var eq_p2=newR;eq_p=eq_p2/q;var r=eq_p*q*100;if(isNaN(r)){hide3=1}else{hide3=0}if(hide===0&&hide2===0&&hide3===0){annual1=mathjs.round(r,3);ctx.exportValue("annual",annual1);if(m!==1&&m!==0){periodic1=mathjs.round(r/m,3);ctx.exportValue("periodic",periodic1)}}var TotDep=periods*PerPay;if(hide===0&&hide2===0&&hide3===0){if(PerPay>0){ctx.exportValue("total",TotDep.toLocaleString(navigator.language,{minimumFractionDigits:2,maximumFractionDigits:2}))}else if(PerPay<0){ctx.exportValue("total",TotDep.toLocaleString(navigator.language,{minimumFractionDigits:2,maximumFractionDigits:2}))}}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Discount rate works out Final payout on… and Flag r from Present Value (PV), Future Value (FV) and Term or number of periods. There is no hidden constant here: change final payout on… and present Value (PV) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Discount rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Discount rate: it takes 7 numbers and reports Final payout on…, Flag r and Rr.</p><p>The relationship it solves reads Rr = Future Value (FV) + Present Value (PV) + Inflation rate + Cash flow (CF) + Var rep + Var time + Var type + M + Q + Term or number of periods.</p><p>What comes back is Final payout on…, Flag r, Rr and Q — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 7 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Present Value (PV)</strong> — in USD</li><li><strong>Future Value (FV)</strong> — in USD</li><li><strong>Term or number of periods</strong> — in years</li><li><strong>Inflation rate</strong> — in percent</li><li><strong>Var time</strong> — a plain number, no unit</li><li><strong>Cash flow (CF)</strong> — in USD. Set negative cash flow (withdrawal) by providing a negative value.</li><li><strong>Var rep</strong> — a plain number, no unit</li></ul><p>The answers come back as Final payout on…, Flag r, Rr, Q, M, Var type. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Set term by… = 1, Compounding frequency = 1, Cash flow frequency = 1, Type of cash flows = 2 and Starting from… = Sun 1 March 2026 gives <strong>Final payout on…</strong> = Wed 11 March 2026.</p><ul><li><strong>Final payout on…</strong> = Wed 11 March 2026</li></ul><p>The line behind those figures is <strong>Rr</strong> = <code>Future Value (FV) + Present Value (PV) + Inflation rate + Cash flow (CF) + Var rep + Var time + Var type + M + Q + Term or number of periods</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Final payout on...</strong> = Wed 11 March 2026. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Term or number of periods lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Rr</strong> = <code>Future Value (FV) + Present Value (PV) + Inflation rate + Cash flow (CF) + Var rep + Var time + Var type + M + Q + Term or number of periods</code></li><li><strong>Future Value (FV)</strong> = <code>− Present Value (PV) − Inflation rate − Cash flow (CF) − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code></li><li><strong>Var rep</strong> = <code>− Future Value (FV) − Present Value (PV) − Inflation rate − Cash flow (CF) − Var time − Var type − M − Q + Rr − Term or number of periods</code></li><li><strong>Inflation rate</strong> = <code>− Future Value (FV) − Present Value (PV) − Cash flow (CF) − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code></li><li><strong>Cash flow (CF)</strong> = <code>− Future Value (FV) − Present Value (PV) − Inflation rate − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code></li><li><strong>Present Value (PV)</strong> = <code>− Future Value (FV) − Inflation rate − Cash flow (CF) − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Rr</strong> = <code>Future Value (FV) + Present Value (PV) + Inflation rate + Cash flow (CF) + Var rep + Var time + Var type + M + Q + Term or number of periods</code> — the form to use when Future Value (FV), Present Value (PV), Inflation rate and Cash flow (CF) are the values you have.</li><li><strong>Future Value (FV)</strong> = <code>− Present Value (PV) − Inflation rate − Cash flow (CF) − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code> — the form to use when Present Value (PV), Inflation rate, Cash flow (CF) and Var rep are the values you have.</li><li><strong>Var rep</strong> = <code>− Future Value (FV) − Present Value (PV) − Inflation rate − Cash flow (CF) − Var time − Var type − M − Q + Rr − Term or number of periods</code> — the form to use when Future Value (FV), Present Value (PV), Inflation rate and Cash flow (CF) are the values you have.</li><li><strong>Inflation rate</strong> = <code>− Future Value (FV) − Present Value (PV) − Cash flow (CF) − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code> — the form to use when Future Value (FV), Present Value (PV), Cash flow (CF) and Var rep are the values you have.</li><li><strong>Cash flow (CF)</strong> = <code>− Future Value (FV) − Present Value (PV) − Inflation rate − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code> — the form to use when Future Value (FV), Present Value (PV), Inflation rate and Var rep are the values you have.</li><li><strong>Present Value (PV)</strong> = <code>− Future Value (FV) − Inflation rate − Cash flow (CF) − Var rep − Var time − Var type − M − Q + Rr − Term or number of periods</code> — the form to use when Future Value (FV), Inflation rate, Cash flow (CF) and Var rep are the values you have.</li><li><strong>M</strong> = <code>− Future Value (FV) − Present Value (PV) − Inflation rate − Cash flow (CF) − Var rep − Var time − Var type − Q + Rr − Term or number of periods</code> — the form to use when Future Value (FV), Present Value (PV), Inflation rate and Cash flow (CF) are the values you have.</li><li><strong>Var type</strong> = <code>− Future Value (FV) − Present Value (PV) − Inflation rate − Cash flow (CF) − Var rep − Var time − M − Q + Rr − Term or number of periods</code> — the form to use when Future Value (FV), Present Value (PV), Inflation rate and Cash flow (CF) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Rr, Future Value (FV) and Var rep can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Set term by... from 1 to 2, leaving every other box alone. The panel moves from <strong>Final payout on...</strong> Wed 11 March 2026 to <strong>Final payout on...</strong> Wed 11 March 2026.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Term or number of periods and Inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final payout on…, Flag r and Rr are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Present Value (PV) left as a guess.</strong> Anything typed into Present Value (PV) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Future Value (FV) left as a guess.</strong> Anything typed into Future Value (FV) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Present Value (PV) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Present Value (PV)</strong> takes a plain number with no unit attached. It feeds Future Value (FV), Var rep and Inflation rate. Have it to hand before you start: Present Value (PV) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Future Value (FV)</strong> takes a plain number with no unit attached. It feeds Var rep, Inflation rate and Cash flow (CF). Have it to hand before you start: Future Value (FV) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Term or number of periods</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Future Value (FV), Var rep and Inflation rate. Have it to hand before you start: Term or number of periods is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Future Value (FV), Var rep and Cash flow (CF). Have it to hand before you start: Inflation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Var time</strong> takes a plain number with no unit attached. It feeds Future Value (FV), Var rep and Inflation rate. Have it to hand before you start: Var time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash flow (CF)</strong> takes a plain number with no unit attached. Set negative cash flow (withdrawal) by providing a negative value. It feeds Future Value (FV), Var rep and Inflation rate. Have it to hand before you start: Cash flow (CF) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Var rep</strong> takes a plain number with no unit attached. It feeds Future Value (FV), Inflation rate and Cash flow (CF). Have it to hand before you start: Var rep is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Final payout on… is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Present Value (PV), Future Value (FV) and Term or number of periods are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Present Value (PV), Future Value (FV) and Term or number of periods is what you already know and Final payout on… and Flag r is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/private-savings">Private savings Calculator</a>, <a href="/finance/productivity">Productivity Calculator</a> and <a href="/finance/profit">Profit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Discount rate calculator work out?', 'a' => <<<'TXT'
            Final payout on…, Flag r, Rr and Q, from Future Value (FV), Present Value (PV), Inflation rate and Cash flow (CF). The relationship is Rr = Future Value (FV) + Present Value (PV) + Inflation rate + Cash flow (CF) + Var rep + Var time + Var type + M + Q + Term or number of periods.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Present Value (PV) (USD), Future Value (FV) (USD), Term or number of periods (years), Inflation rate (percent), Var time. Fill present Value (PV), future Value (FV) and term or number of periods and leave Final payout on... empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Rr, Future Value (FV), Var rep and Inflation rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Final payout on… = Wed 11 March 2026. Those are the defaults written into the form — move Present Value (PV) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Final payout on... is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Present Value (PV) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final payout on... keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/private-savings', 'name' => 'Private savings Calculator'],
            ['path' => '/finance/productivity', 'name' => 'Productivity Calculator'],
            ['path' => '/finance/profit', 'name' => 'Profit Calculator'],
        ],
        'authors' => [],
    ],
];
