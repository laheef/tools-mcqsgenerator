<?php

/**
 * Mortgage rate
 * /finance/mortgage-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage rate',
    'meta' => ['title' => 'Mortgage rate Calculator — Formula & Results', 'description' => 'Mortgage rate works out mortgage points and monthly payment and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Mortgage rate Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Main configuration',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Loan balance',
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
                            'label' => 'Mortgage term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '30', 'when' => null],
                                ['value' => '30', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Mortgage rate',
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
                            'name' => 'CompoundFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '11', 'Semi-annually (Canada)' => '12', 'Quarterly' => '13', 'Monthly (UK & US)' => '14'],
                            'dataset' => 'compound_freqDS',
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
                            'name' => 'ArmType',
                            'label' => 'Mortgage type',
                            'type' => 'select',
                            'options' => [
                                'Fixed-rate' => '0',
                                '10/1 ARM' => '10',
                                '7/1 ARM' => '7',
                                '5/1 ARM' => '5',
                                '3/1 ARM' => '3',
                                'Customized ARM' => '1',
                            ],
                            'dataset' => 'mortgage_typeDS',
                            'control' => 'DROPDOWN',
                            'help' => 'You can switch here to adjustable-rate mortgage (ARM).',
                            'default' => 'Fixed-rate',
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
                            'options' => ['manual setup' => '1', 'trend' => '2'],
                            'dataset' => 'adjustments_byDS',
                            'help' => <<<'TXT'
                            With the manual setup, the interest rate alters periodically with the given percentage points. If you choose a trend, the interest rate alters steadily until it reaches the given rate at the end of the term.
                            TXT,
                            'default' => 'manual setup',
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
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
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
                            'defaults' => [
                                ['value' => '12', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
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
            'title' => 'Mortgage fees',
            'note' => '',
            'blocks' => [
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
                            'default' => '0',
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
                            'min' => 2,
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
                            'help' => 'Include any fee here which is applicable annually.',
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
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment',
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
                            'name' => 'monthly_payment_min',
                            'label' => 'Monthly payment minimum',
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
                            'name' => 'monthly_payment_max',
                            'label' => 'Monthly payment maximum',
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
                            'name' => 'apr',
                            'label' => 'Adjusted mortgage rate (APR)',
                            'type' => 'number',
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
                            'name' => 'paid_interest',
                            'label' => 'Paid interest',
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
                            'name' => 'additional_costs',
                            'label' => 'Additional costs',
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
                            'name' => 'total_payments',
                            'label' => 'Total payments',
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
            'title' => 'Hidden variables',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'CostPerc = CostProc / LoanAmount',
            'results' => ['CostPerc' => 'CostProc/LoanAmount', 'LoanAmount' => 'CostProc/CostPerc', 'CostProc' => 'CostPerc*LoanAmount'],
        ],
        [
            'title' => <<<'TXT'
            monthly_payment = get_monthly_payment(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)
            TXT,
            'results' => ['monthly_payment' => 'get_monthly_payment(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => 'apr = get_apr(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType) ',
            'results' => ['apr' => 'get_apr(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => 'paid_interest = get_paid_interest(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)',
            'results' => ['paid_interest' => 'get_paid_interest(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => <<<'TXT'
            total_payments = get_total_payments(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)
            TXT,
            'results' => ['total_payments' => 'get_total_payments(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => <<<'TXT'
            additional_costs = get_additional_costs(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)
            TXT,
            'results' => ['additional_costs' => 'get_additional_costs(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => <<<'TXT'
            monthly_payment_min = get_monthly_payment_min(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)
            TXT,
            'results' => ['monthly_payment_min' => 'get_monthly_payment_min(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
        [
            'title' => <<<'TXT'
            monthly_payment_max = get_monthly_payment_max(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)
            TXT,
            'results' => ['monthly_payment_max' => 'get_monthly_payment_max(r, t, m, q, LoanAmount, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, VarIntAdj, VarType)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function getAPR(LoanAmount,Pmt,Per,FeePre,q){var Max_iterations=50000;var Min_precision=1e-7;var APR_approx=2*q*(Pmt*Per+FeePre-LoanAmount)/(LoanAmount*(Per+1));var oldI,newI=APR_approx,iteration=0;do{oldI=newI;var dividend=Pmt-Pmt*mathjs.pow(1+newI,-Per)-newI*(LoanAmount-FeePre);var divisor=Pmt*Per*mathjs.pow(1+newI,-Per-1)-(LoanAmount-FeePre);newI=newI-dividend/divisor;iteration++}while(Math.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);return newI*q}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base=m===0?1+(mathjs.pow(ex,r)-1)/1:1+r/m;var power=m/q;return mathjs.round(mathjs.pow(base,power)-1,10)}function getPmt(LoanAmount,t,q,eq_p){var periods=t*q;return LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)}function calculateLoanResults(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){if(VarType===10){IntAdjPer=120;IntAdjFreq=12}else if(VarType===7){IntAdjPer=84;IntAdjFreq=12}else if(VarType===5){IntAdjPer=60;IntAdjFreq=12}else if(VarType===3){IntAdjPer=36;IntAdjFreq=12}else if(VarType===0){IntAdjPer=0;IntAdjFreq=0;IntAdj=0}var periodsLoop=q*t;var CostMonth=Cost/12;var CostUpfront=LoanAmount*CostPerc;var eq_p=getPerEqRate(q,m,r);var eq_pAdj=getPerEqRate(q,m,IntAdj);var eq_pMax=getPerEqRate(q,m,IntAdjMax);var eq_pMin=getPerEqRate(q,m,IntAdjMin);var eq_pTrend=getPerEqRate(q,m,IntAdjTrend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-IntAdjPer)*IntAdjFreq;var princBal=LoanAmount;var intPaid=0;var intPaidInt=0;var intRateSum=0;var rMonth=eq_p;for(var i=0;i<=periodsLoop;i++){if(i>0){if(VarIntAdj===2&&i>IntAdjPer&&((i-1-IntAdjPer)%IntAdjFreq===1&&IntAdjFreq>1||(i-1-IntAdjPer)%IntAdjFreq===0&&IntAdjFreq===1)){rMonth+=eq_pTrendAdd}if(i===IntAdjPer+1&&VarIntAdj===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth+=eq_pAdj}if(VarIntAdj===2&&r<IntAdjTrend&&rMonth>eq_pTrend){rMonth=eq_pTrend}if(VarIntAdj===2&&r>IntAdjTrend&&rMonth<eq_pTrend){rMonth=eq_pTrend}if(VarIntAdj===1&&IntAdj>0&&rMonth>eq_pMax){rMonth=eq_pMax}if(VarIntAdj===1&&IntAdj<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i>IntAdjPer&&VarIntAdj===1){IntAdjPer+=IntAdjFreq}if(rMonth===0){rMonth=1e-11}var pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,q,rMonth);var intMonth=princBal*rMonth;var princMonth=pmtMonth-intMonth;princBal-=princMonth;intPaid+=intMonth;intRateSum+=rMonth;if(princBal<=0){princBal=0}}}var intRateAve=intRateSum/periodsLoop;var pmtAve=getPmt(LoanAmount,periodsLoop/12,12,intRateAve);var monthlyPayment=Cost!==0||CostPerc!==0?(intPaidInt+intPaid+periodsLoop*CostMonth+LoanAmount)/periodsLoop:(intPaidInt+intPaid+LoanAmount)/periodsLoop;var apr=mathjs.round(getAPR(LoanAmount,pmtAve+CostMonth,periodsLoop,CostUpfront,q)*100,3)/100;var paidInterest=intPaidInt+intPaid;var totalPayments=intPaidInt+intPaid+periodsLoop*CostMonth+CostUpfront+LoanAmount;var additionalCosts=periodsLoop*CostMonth+CostUpfront;return[monthlyPayment,apr,paidInterest,totalPayments,additionalCosts]}omni.define("get_monthly_payment",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var monthly_payment=calculateLoanResults(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[0];return monthly_payment});omni.define("get_apr",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var apr=calculateLoanResults(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[1];return apr});omni.define("get_paid_interest",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var paid_interest=calculateLoanResults(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[2];return paid_interest});omni.define("get_total_payments",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var total_payments=calculateLoanResults(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[3];return total_payments});omni.define("get_additional_costs",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var additional_costs=calculateLoanResults(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[4];return additional_costs});function monthlyPaymentRange(r,t,m,q,loanAmount,costPerc,cost,intAdj,intAdjFreq,intAdjMax,intAdjMin,intAdjPer,intAdjTrend,varIntAdj,varType){var periods=q*t;var monthlyCost=cost/12;var principalBalance=loanAmount;var interestPaid=0;var monthlyPaymentMin=0;var monthlyPaymentMax=0;var adjustedIntAdjPer=intAdjPer;var adjustedIntAdjFreq=intAdjFreq;var adjustedIntAdj=intAdj;if(varType===10){adjustedIntAdjPer=120;adjustedIntAdjFreq=12}else if(varType===7){adjustedIntAdjPer=84;adjustedIntAdjFreq=12}else if(varType===5){adjustedIntAdjPer=60;adjustedIntAdjFreq=12}else if(varType===3){adjustedIntAdjPer=36;adjustedIntAdjFreq=12}else if(varType===0){adjustedIntAdjPer=0;adjustedIntAdjFreq=0;adjustedIntAdj=0}var baseRate=getPerEqRate(q,m,r);var adjRate=getPerEqRate(q,m,adjustedIntAdj);var maxRate=getPerEqRate(q,m,intAdjMax);var minRate=getPerEqRate(q,m,intAdjMin);var trendRate=getPerEqRate(q,m,intAdjTrend);var trendRateIncrement=adjustedIntAdjPer>0&&periods>adjustedIntAdjPer?(trendRate-baseRate)/(periods-adjustedIntAdjPer)*adjustedIntAdjFreq:0;var currentRate=baseRate;for(var i=0;i<=periods;i++){if(i>0){if(varIntAdj===2&&i>adjustedIntAdjPer&&(adjustedIntAdjFreq>1&&(i-1-adjustedIntAdjPer)%adjustedIntAdjFreq===1||adjustedIntAdjFreq===1&&(i-1-adjustedIntAdjPer)%adjustedIntAdjFreq===0)){currentRate+=trendRateIncrement}if(varIntAdj===1&&i===adjustedIntAdjPer+1&&currentRate<maxRate&&currentRate>minRate){currentRate+=adjRate}if(varIntAdj===2&&r<intAdjTrend&&currentRate>trendRate){currentRate=trendRate}if(varIntAdj===2&&r>intAdjTrend&&currentRate<trendRate){currentRate=trendRate}if(varIntAdj===1&&adjustedIntAdj>0&&currentRate>maxRate){currentRate=maxRate}if(varIntAdj===1&&adjustedIntAdj<0&&currentRate<minRate){currentRate=minRate}if(i>adjustedIntAdjPer&&varIntAdj===1){adjustedIntAdjPer+=adjustedIntAdjFreq}if(currentRate<=0){currentRate=1e-11}var monthlyPayment=getPmt(principalBalance,(periods-i+1)/q,q,currentRate);if(i===1){monthlyPaymentMin=monthlyPayment}monthlyPaymentMax=monthlyPayment;var monthlyInterest=principalBalance*currentRate;var monthlyPrincipal=monthlyPayment-monthlyInterest;principalBalance-=monthlyPrincipal;interestPaid+=monthlyInterest;if(principalBalance<=0){principalBalance=0}}}if(varType===0){monthlyPaymentMax=(interestPaid+loanAmount)/periods;if(monthlyPaymentMin===0){monthlyPaymentMin=monthlyPaymentMax}}var monthlyPayment_min=monthlyPaymentMin+monthlyCost;var monthlyPayment_max=monthlyPaymentMax+monthlyCost;return[monthlyPayment_min,monthlyPayment_max]}omni.define("get_monthly_payment_min",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var monthly_payment_min=monthlyPaymentRange(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[0];return monthly_payment_min});omni.define("get_monthly_payment_max",function(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType){var monthly_payment_max=monthlyPaymentRange(r,t,m,q,LoanAmount,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj,VarType)[1];return monthly_payment_max});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Mortgage rate turns Loan balance and Up-front fee into Mortgage points and Monthly payment. There is no hidden constant here: change mortgage points and loan balance moves with it. The main result, Mortgage points, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage rate calculator works', 'html' => <<<'TXT'
            <p>The Mortgage rate calculator applies one relationship to 2 numbers and reports Mortgage points, Monthly payment and Monthly payment minimum.</p><p>Written with the labels from the form, Mortgage points = Up-front fee ÷ Loan balance.</p><p>The result panel carries Mortgage points, Monthly payment, Monthly payment minimum and Monthly payment maximum, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan balance</strong> — in USD</li><li><strong>Up-front fee</strong> — in USD</li></ul><p>The result boxes are Mortgage points in percent, Monthly payment in USD, Monthly payment minimum in USD, Monthly payment maximum in USD, Adjusted mortgage rate (APR) in percent, Paid interest in USD, Additional costs in USD, Total payments in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Mortgage term = 30 yrs, Mortgage rate = 5 perc, Compounding frequency = 14, Mortgage type = 0, Adjustments by… = 1, Expected interest rate at the last period = 10 perc, Expected adjustment = 0.5 perc, First adjustment after… = 1 yrs, Periods between adjustments = 12 mos, Interest rate cap = 8 perc, Interest rate floor = 1 perc and Annual fee = 2 USD; the answers are <strong>Q</strong> = 12.</p><ul><li><strong>Q</strong> = 12</li></ul><p>That is <strong>Mortgage points</strong> = <code>Up-front fee ÷ Loan balance</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Q</strong> = 12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Mortgage points offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mortgage points</strong> = <code>Up-front fee ÷ Loan balance</code></li><li><strong>Loan balance</strong> = <code>Up-front fee ÷ Mortgage points</code></li><li><strong>Up-front fee</strong> = <code>Mortgage points × Loan balance</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mortgage points</strong> = <code>Up-front fee ÷ Loan balance</code> — the form to use when Up-front fee and Loan balance are the values you have.</li><li><strong>Loan balance</strong> = <code>Up-front fee ÷ Mortgage points</code> — the form to use when Up-front fee and Mortgage points are the values you have.</li><li><strong>Up-front fee</strong> = <code>Mortgage points × Loan balance</code> — the form to use when Mortgage points and Loan balance are the values you have.</li></ul><p>Any one of Mortgage points, Loan balance and Up-front fee can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Mortgage term from 30 to 60, leaving every other box alone. The panel moves from <strong>Q</strong> 12 to <strong>Q</strong> 12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mortgage points, Monthly payment and Monthly payment minimum are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Up-front fee left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Up-front fee is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan balance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan balance</strong> takes a plain number with no unit attached. The page reads it when it works out Mortgage points, Up-front fee and Monthly payment. Have it to hand before you start: Loan balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Up-front fee</strong> takes a plain number with no unit attached. The page reads it when it works out Mortgage points and Loan balance. Have it to hand before you start: Up-front fee is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Mortgage points</strong> is a percent figure. It is computed from Up-front fee and Loan balance, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly payment</strong> is a plain number. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly payment minimum</strong> is a plain number. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly payment maximum</strong> is a plain number. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Adjusted mortgage rate (APR)</strong> is a percent figure. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Paid interest</strong> is a plain number. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Additional costs</strong> is a plain number. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total payments</strong> is a plain number. It is computed from Mortgage rate, Mortgage term, M and Q, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Q</th></tr></thead><tbody><tr><td><strong>Mortgage term</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Mortgage rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Compounding frequency</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Adjustments by…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Expected interest rate at the last period</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Expected adjustment</strong> +10%</td><td>+0%</td></tr><tr><td><strong>First adjustment after…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Periods between adjustments</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Interest rate cap</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Interest rate floor</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual fee</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Mortgage term sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Mortgage term, Mortgage rate and Compounding frequency barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Mortgage term = 15 yrs, Mortgage rate = 2.5 perc, Compounding frequency = 7, Mortgage type = 0, Adjustments by… = 0.5, Expected interest rate at the last period = 5 perc, Expected adjustment = 0.25 perc, First adjustment after… = 0.5 yrs, Periods between adjustments = 6 mos, Interest rate cap = 4 perc, Interest rate floor = 0.5 perc and Annual fee = 1 USD, the answer is <strong>Q</strong> = 12.</li><li>With Mortgage term = 90 yrs, Mortgage rate = 5 perc, Compounding frequency = 14, Mortgage type = 0, Adjustments by… = 1, Expected interest rate at the last period = 10 perc, Expected adjustment = 0.5 perc, First adjustment after… = 1 yrs, Periods between adjustments = 12 mos, Interest rate cap = 8 perc, Interest rate floor = 1 perc and Annual fee = 2 USD, the answer is <strong>Q</strong> = 12.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Mortgage points follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan balance and Up-front fee is what you already know and Mortgage points and Monthly payment is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/emv">EMV (expected monetary value) Calculator</a>, <a href="/finance/ending-inventory">Ending inventory Calculator</a> and <a href="/finance/enterprise-value">Enterprise value</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage rate calculator work out?', 'a' => <<<'TXT'
            Mortgage points, Monthly payment, Monthly payment minimum and Monthly payment maximum, from Up-front fee and Loan balance. The relationship is Mortgage points = Up-front fee ÷ Loan balance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Loan balance (USD), Up-front fee (USD). Fill loan balance and up-front fee and leave Mortgage points empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mortgage points, Loan balance, Up-front fee and Monthly payment blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Q = 12. That comes from the page\'s own defaults, entered in Loan balance; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Mortgage points is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mortgage points keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/emv', 'name' => 'EMV (expected monetary value) Calculator'],
            ['path' => '/finance/ending-inventory', 'name' => 'Ending inventory Calculator'],
            ['path' => '/finance/enterprise-value', 'name' => 'Enterprise value'],
        ],
        'authors' => [],
    ],
];
