<?php

/**
 * HELOC
 * /finance/heloc
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'HELOC',
    'meta' => ['title' => 'HELOC Calculator — Formula, Units & Example', 'description' => 'HELOC reports up-front fee as a percentage. Every box can be solved for, not only the one in the title. The formula is printed in the form\'s own words.', 'h1' => 'HELOC Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'HELOC details',
            'note' => 'Read the instructions for the HELOC calculator.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Current HELOC balance',
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
                            'name' => 'draw_period_tInt',
                            'label' => 'Draw period',
                            'type' => 'number',
                            'help' => 'Interest-only period.',
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
                            'name' => 'term_t',
                            'label' => 'Repayment term',
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
                            'label' => 'Interest rate',
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
                            'name' => 'CostPerc',
                            'label' => 'Up-front fee as a percentage',
                            'type' => 'number',
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
                            'name' => 'CostProc',
                            'label' => 'Up-front fee',
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
                            'name' => 'Cost',
                            'label' => 'Annual fee',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Interest rate adjustments',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjSet',
                            'label' => 'Adjustments by...',
                            'type' => 'select',
                            'options' => ['manual setup' => '1', 'trend' => '2'],
                            'dataset' => 'adjustments',
                            'control' => 'DROPDOWN',
                            'default' => 'manual setup',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IntAdjTrend',
                            'label' => 'Expected interest rate in the last period',
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
                            'default' => '5',
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
                            'help' => 'If you set this to zero, adjustment will occur only once after the given first adjustment period.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
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
                            'name' => 'payment_freq_q',
                            'label' => 'Q',
                            'type' => 'select',
                            'options' => ['Monthly' => '12'],
                            'dataset' => 'Payment frequency',
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
                            'name' => 'IntAdjMin',
                            'label' => 'Interest rate floor',
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
                        ['name' => 'first_day', 'label' => 'Schedule from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grand_total_payments',
                            'label' => 'Grand total payments',
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
                            'name' => 'monthly_pay_draw_min',
                            'label' => 'Monthly pay draw min',
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
                            'name' => 'add_costs_draw',
                            'label' => 'Add costs draw',
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
                            'name' => 'add_costs_repay',
                            'label' => 'Add costs repay',
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
                            'name' => 'add_costs_total',
                            'label' => 'Add costs total',
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
                            'name' => 'apr_draw',
                            'label' => 'Apr draw',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apr_repay',
                            'label' => 'Apr repay',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apr_total',
                            'label' => 'Apr total',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_draw',
                            'label' => 'Interest draw',
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
                            'name' => 'interest_repay',
                            'label' => 'Interest repay',
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
                            'name' => 'interest_total',
                            'label' => 'Interest total',
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
                            'name' => 'monthly_pay_repay_max',
                            'label' => 'Monthly pay repay max',
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
                            'name' => 'total_pay_draw',
                            'label' => 'Total pay draw',
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
                            'name' => 'total_pay_repay',
                            'label' => 'Total pay repay',
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
                            'name' => 'monthly_pay_draw_max',
                            'label' => 'Monthly pay draw max',
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
                            'name' => 'monthly_pay_repay_min',
                            'label' => 'Monthly pay repay min',
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
                            'name' => 'monthly_pay_total',
                            'label' => 'Monthly pay total',
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
                            'name' => 'total_term',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'draw_period_years',
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
                            'name' => 'term_t_years',
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
            'results' => ['LoanAmount' => 'CostProc/CostPerc', 'CostProc' => 'CostPerc*LoanAmount', 'CostPerc' => 'CostProc/LoanAmount'],
        ],
        [
            'title' => <<<'TXT'
            grand_total_payments = main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet)
            TXT,
            'results' => ['grand_total_payments' => <<<'TXT'
            main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet)
            TXT],
        ],
        [
            'title' => 'monthly_pay_draw_min = get_monthly_pay_draw_min(grand_total_payments)',
            'results' => ['monthly_pay_draw_min' => <<<'TXT'
            get_monthly_pay_draw_min(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'monthly_pay_repay_max = get_monthly_pay_repay_max(grand_total_payments)',
            'results' => ['monthly_pay_repay_max' => <<<'TXT'
            get_monthly_pay_repay_max(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'apr_draw = get_apr_draw(grand_total_payments)',
            'results' => ['apr_draw' => <<<'TXT'
            get_apr_draw(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'apr_repay = get_apr_repay(grand_total_payments)',
            'results' => ['apr_repay' => <<<'TXT'
            get_apr_repay(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'apr_total = get_apr_total(grand_total_payments)',
            'results' => ['apr_total' => <<<'TXT'
            get_apr_total(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'interest_draw = get_interest_draw(grand_total_payments)',
            'results' => ['interest_draw' => <<<'TXT'
            get_interest_draw(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'interest_repay = get_interest_repay(grand_total_payments)',
            'results' => ['interest_repay' => <<<'TXT'
            get_interest_repay(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'interest_total = get_interest_total(grand_total_payments)',
            'results' => ['interest_total' => <<<'TXT'
            get_interest_total(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'add_costs_draw = get_add_costs_draw(grand_total_payments)',
            'results' => ['add_costs_draw' => <<<'TXT'
            get_add_costs_draw(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'add_costs_repay = get_add_costs_repay(grand_total_payments)',
            'results' => ['add_costs_repay' => <<<'TXT'
            get_add_costs_repay(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'add_costs_total = get_add_costs_total(grand_total_payments)',
            'results' => ['add_costs_total' => <<<'TXT'
            get_add_costs_total(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'total_pay_draw = get_total_pay_draw(grand_total_payments)',
            'results' => ['total_pay_draw' => <<<'TXT'
            get_total_pay_draw(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'total_pay_repay = get_total_pay_repay(grand_total_payments)',
            'results' => ['total_pay_repay' => <<<'TXT'
            get_total_pay_repay(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'monthly_pay_draw_max = get_monthly_pay_draw_max(grand_total_payments)',
            'results' => ['monthly_pay_draw_max' => <<<'TXT'
            get_monthly_pay_draw_max(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'monthly_pay_repay_min = get_monthly_pay_repay_min(grand_total_payments)',
            'results' => ['monthly_pay_repay_min' => <<<'TXT'
            get_monthly_pay_repay_min(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
        [
            'title' => 'monthly_pay_total = get_monthly_pay_total(grand_total_payments)',
            'results' => ['monthly_pay_total' => <<<'TXT'
            get_monthly_pay_total(main_calc(interest_rate_r, term_t, draw_period_tInt, m, payment_freq_q, LoanAmount, first_day, CostPerc, Cost, IntAdj, IntAdjFreq, IntAdjMax, IntAdjMin, IntAdjPer, IntAdjTrend, IntAdjSet))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var milisecondsInADay=24*60*60*1000;var monthly_pay_draw_min,monthly_pay_draw_max,monthly_pay_repay_min,monthly_pay_repay_max,monthly_pay_total,apr_draw,apr_repay,apr_total,interest_draw,interest_repay,interest_total,add_costs_draw,add_costs_repay,add_costs_total,total_pay_draw,total_pay_repay;omni.define("main_calc",function(r,t,tInt,m,q,LoanAmount,first_day,CostPerc,Cost,IntAdj,IntAdjFreq,IntAdjMax,IntAdjMin,IntAdjPer,IntAdjTrend,VarIntAdj){var periodsInt=q*tInt;var periods=q*t;var CostMonth=Cost/12;var periodsLoop=q*t+periodsInt;var eq_p=getPerEqRate(q,m,r);var eq_pAdj=getPerEqRate(q,m,IntAdj);var eq_pMax=getPerEqRate(q,m,IntAdjMax);var eq_pMin=getPerEqRate(q,m,IntAdjMin);var eq_pTrend=getPerEqRate(q,m,IntAdjTrend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-IntAdjPer)*IntAdjFreq;var pmt=getPmt(LoanAmount,t,q,eq_p);var CostUpfront=LoanAmount*CostPerc;var rMonth=eq_p;var intYear=0;var princYear=0;var pmtMonth=pmt;var princBal=LoanAmount;var princBalOpen;var princMonth;var intMonth;var princPaid=0;var intPaid=0;var daysInPeriod;var daysPassed=0;var intPaidInt=0;var intDraw=0;var pmtMonthDraw=0;var pmtMonthRep=0;var intRateSum=0;var intRateSumRep=0;var date=new Date((first_day+daysPassed)*milisecondsInADay);for(var i=1;i<=periodsLoop;i++){daysInPeriod=getDaysInPeriod(first_day,date,q);daysPassed+=daysInPeriod;if(VarIntAdj===2&&i>IntAdjPer&&((i-1-IntAdjPer)%IntAdjFreq===1&&IntAdjFreq>1||(i-1-IntAdjPer)%IntAdjFreq===0&&IntAdjFreq===1)){rMonth=rMonth+eq_pTrendAdd}if(VarIntAdj===2&&r<IntAdjTrend&&rMonth>eq_pTrend){rMonth=eq_pTrend}if(VarIntAdj===2&&r>IntAdjTrend&&rMonth<eq_pTrend){rMonth=eq_pTrend}if(VarIntAdj===1&&IntAdj>0&&rMonth>eq_pMax){rMonth=eq_pMax}if(VarIntAdj===1&&IntAdj<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i===IntAdjPer+1&&VarIntAdj===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(i>IntAdjPer&&VarIntAdj===1){IntAdjPer+=IntAdjFreq}if(rMonth===0){rMonth=1e-11}if(i<=periodsInt){intMonth=princBal*rMonth;princMonth=0;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;intDraw=intMonth;intPaidInt+=intDraw;pmtMonth=intMonth;if(i===1){pmtMonthDraw=intMonth}}else{pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,q,rMonth);if(i===periodsInt+1){pmtMonthRep=pmtMonth}intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(i===0){intMonth=0;princMonth=0}if(princBalOpen<pmtMonth){princMonth=princBalOpen}intRateSumRep+=rMonth}intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}intRateSum+=rMonth}var intRateAve=intRateSum/periodsLoop;var intRateRep=intRateSumRep/periods;var pmtAve=getPmt(LoanAmount,periodsLoop/12,12,intRateAve);var pmtAveRep=getPmt(LoanAmount,periods/12,12,intRateRep);monthly_pay_draw_min=pmtMonthDraw+Cost/12;monthly_pay_draw_max=intDraw+Cost/12;monthly_pay_repay_min=pmtMonthRep+Cost/12;monthly_pay_repay_max=pmtMonth+Cost/12;monthly_pay_total=(intPaidInt+intPaid+LoanAmount)/periodsLoop;apr_draw=mathjs.round((intPaidInt+CostMonth)/periodsInt/LoanAmount*100*12,3);apr_repay=mathjs.round(getAPR(LoanAmount,pmtAveRep+CostMonth,periods,0,q)*100,3);apr_total=mathjs.round(getAPR(LoanAmount,pmtAve+CostMonth,periodsLoop,CostUpfront,q)*100,3);interest_draw=intPaidInt;interest_repay=intPaid;interest_total=intPaidInt+intPaid;add_costs_draw=periodsInt*CostMonth;add_costs_repay=periods*CostMonth;add_costs_total=periodsLoop*CostMonth+CostUpfront;total_pay_draw=intPaidInt+periodsInt*CostMonth;total_pay_repay=intPaid+periods*CostMonth+LoanAmount;return intPaidInt+intPaid+periodsLoop*CostMonth+CostUpfront+LoanAmount});omni.define("get_monthly_pay_draw_min",function(grand_total_payments){return monthly_pay_draw_min});omni.define("get_monthly_pay_draw_max",function(grand_total_payments){return monthly_pay_draw_max});omni.define("get_monthly_pay_repay_min",function(grand_total_payments){return monthly_pay_repay_min});omni.define("get_monthly_pay_repay_max",function(grand_total_payments){return monthly_pay_repay_max});omni.define("get_monthly_pay_total",function(grand_total_payments){return monthly_pay_total});omni.define("get_apr_draw",function(grand_total_payments){return apr_draw});omni.define("get_apr_repay",function(grand_total_payments){return apr_repay});omni.define("get_apr_total",function(grand_total_payments){return apr_total});omni.define("get_interest_draw",function(grand_total_payments){return interest_draw});omni.define("get_interest_repay",function(grand_total_payments){return interest_repay});omni.define("get_interest_total",function(grand_total_payments){return interest_total});omni.define("get_add_costs_draw",function(grand_total_payments){return add_costs_draw});omni.define("get_add_costs_repay",function(grand_total_payments){return add_costs_repay});omni.define("get_add_costs_total",function(grand_total_payments){return add_costs_total});omni.define("get_total_pay_draw",function(grand_total_payments){return total_pay_draw});omni.define("get_total_pay_repay",function(grand_total_payments){return total_pay_repay});function getAPR(LoanAmount,Pmt,Per,FeePre,q){var Max_iterations=50000;var Min_precision=1e-7;var APR_approx=2*q*(Pmt*Per+FeePre-LoanAmount)/(LoanAmount*(Per+1));var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=Pmt-Pmt*mathjs.pow(1+newI,-Per)-newI*(LoanAmount-FeePre);var divisor=Pmt*Per*mathjs.pow(1+newI,-Per-1)-(LoanAmount-FeePre);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);return newI*q}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;return mathjs.round(mathjs.pow(base,power)-1,10)}function getPmt(LoanAmount,t,q,eq_p){var periods=t*q;return LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)}function getDaysInPeriod(FirstDay,date,q){var milisecondsInADay=24*60*60*1000;FirstDay=new Date(FirstDay*milisecondsInADay);var daysInMonth;var daysInPeriod=0;var DaysInYear;var DaysInNextYear;var day=FirstDay.getUTCDate();var month=date.getUTCMonth();var year=date.getUTCFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getUTCDate()===30||year%400===0&&month===0&&date.getUTCDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getUTCDate()===31||year%400===0&&month===0&&date.getUTCDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getUTCDate()===29||year%400===0&&month===0&&date.geUTCtDate()===29){daysInMonth=31}if(date.getUTCDate()===29&&date.getUTCMonth()===1&&day>29){daysInMonth=30}if(date.getUTCDate()===29&&date.getUTCMonth()===1&&day>30){daysInMonth=31}if(date.getUTCDate()===28&&date.getUTCMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){day=date.getUTCDate();if(month===0&&DaysInYear===366){daysInPeriod=91}if(month===0&&DaysInYear===365){daysInPeriod=90}if(month===1&&DaysInYear===366){daysInPeriod=90}if(month===1&&DaysInYear===365){daysInPeriod=89}if(month===11&&DaysInNextYear===366){daysInPeriod=92}if(month===11&&DaysInNextYear===365){daysInPeriod=91}if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}if(q===2){daysInPeriod=180}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        HELOC takes Current HELOC balance and Up-front fee and returns Up-front fee as a percentage and Grand total payments. The arithmetic is the whole method: up-front fee as a percentage is worked out from current HELOC balance by one formula, applied once. Up-front fee as a percentage comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the HELOC calculator works', 'html' => <<<'TXT'
            <p>HELOC answers one question from 2 numbers, and the answer is Up-front fee as a percentage, Grand total payments and Monthly pay draw min.</p><p>In the form&#039;s own words, Up-front fee as a percentage = Up-front fee ÷ Current HELOC balance.</p><p>The result panel carries Up-front fee as a percentage, Grand total payments, Monthly pay draw min and Add costs draw, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current HELOC balance</strong> — in USD</li><li><strong>Up-front fee</strong> — in USD</li></ul><p>The result boxes are Up-front fee as a percentage in percent, Grand total payments, Monthly pay draw min, Add costs draw, Add costs repay, Add costs total, Apr draw, Apr repay, Apr total, Interest draw, Interest repay, Interest total, Monthly pay repay max, Total pay draw, Total pay repay, Monthly pay draw max, Monthly pay repay min, Monthly pay total; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Draw period = 10 yrs, Repayment term = 20 yrs, Interest rate = 5 perc, Annual fee = 200 USD, Adjustments by… = 1, Expected interest rate in the last period = 10 perc, Expected adjustment = 0.5 perc, First adjustment after… = 5 yrs, Periods between adjustments = 24 mos and Interest rate cap = 8 perc gives <strong>Q</strong> = 12, <strong>M</strong> = 12 and <strong>Interest rate floor</strong> = 0.</p><ul><li><strong>Q</strong> = 12</li><li><strong>M</strong> = 12</li><li><strong>Interest rate floor</strong> = 0</li></ul><p>The line behind those figures is <strong>Up-front fee as a percentage</strong> = <code>Up-front fee ÷ Current HELOC balance</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Q</strong> = 12, <strong>M</strong> = 12 and <strong>Interest rate floor</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Up-front fee as a percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Up-front fee as a percentage</strong> = <code>Up-front fee ÷ Current HELOC balance</code></li><li><strong>Current HELOC balance</strong> = <code>Up-front fee ÷ Up-front fee as a percentage</code></li><li><strong>Up-front fee</strong> = <code>Up-front fee as a percentage × Current HELOC balance</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Up-front fee as a percentage</strong> = <code>Up-front fee ÷ Current HELOC balance</code> — the form to use when Up-front fee and Current HELOC balance are the values you have.</li><li><strong>Current HELOC balance</strong> = <code>Up-front fee ÷ Up-front fee as a percentage</code> — the form to use when Up-front fee and Up-front fee as a percentage are the values you have.</li><li><strong>Up-front fee</strong> = <code>Up-front fee as a percentage × Current HELOC balance</code> — the form to use when Up-front fee as a percentage and Current HELOC balance are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Up-front fee as a percentage, Current HELOC balance and Up-front fee can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Draw period, from 10 to 20 — and the answers go from <strong>Q</strong> 12, <strong>M</strong> 12 and <strong>Interest rate floor</strong> 0 to <strong>Q</strong> 12, <strong>M</strong> 12 and <strong>Interest rate floor</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Up-front fee as a percentage, Grand total payments and Monthly pay draw min are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current HELOC balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current HELOC balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Up-front fee left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Up-front fee is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current HELOC balance is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the HELOC form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current HELOC balance</strong> takes a plain number with no unit attached. It feeds Up-front fee, Up-front fee as a percentage and Grand total payments. Fill it from a measurement rather than a memory — Current HELOC balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Up-front fee</strong> takes a plain number with no unit attached. It feeds Current HELOC balance and Up-front fee as a percentage. Fill it from a measurement rather than a memory — Up-front fee is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Current HELOC balance and Up-front fee ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Current HELOC balance — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Up-front fee as a percentage in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Up-front fee as a percentage follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current HELOC balance and Up-front fee are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current HELOC balance and Up-front fee measured, Up-front fee as a percentage and Grand total payments wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/week-over-week">Week over week Calculator</a>, <a href="/finance/weekly-pay">Weekly pay Calculator</a> and <a href="/finance/what-to-offer-on-a-house">What to offer on a house Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>HELOC is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the HELOC calculator work out?', 'a' => <<<'TXT'
            Up-front fee as a percentage, Grand total payments, Monthly pay draw min and Add costs draw, from Up-front fee and Current HELOC balance. The relationship is Up-front fee as a percentage = Up-front fee ÷ Current HELOC balance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current HELOC balance (USD), Up-front fee (USD). Enter current HELOC balance and up-front fee; Up-front fee as a percentage is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Up-front fee as a percentage, Current HELOC balance, Up-front fee and Grand total payments can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Q = 12, M = 12 and Interest rate floor = 0. The figures come from Current HELOC balance as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Up-front fee as a percentage is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Current HELOC balance blank and the page solves for it, reporting Up-front fee as a percentage instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Up-front fee as a percentage keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/week-over-week', 'name' => 'Week over week Calculator'],
            ['path' => '/finance/weekly-pay', 'name' => 'Weekly pay Calculator'],
            ['path' => '/finance/what-to-offer-on-a-house', 'name' => 'What to offer on a house Calculator'],
        ],
        'authors' => [],
    ],
];
