<?php

/**
 * Mortgage interest
 * /finance/mortgage-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage interest',
    'meta' => ['title' => 'Mortgage interest: Formula, Steps & Results', 'description' => 'Mortgage interest works out mortgage points and monthly payment and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Mortgage interest Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Mortgage principal',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '250000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgage_term',
                            'label' => 'Mortgage term',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'If you choose an ARM, then this is the interest rate at the beginning of term.',
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
                            'name' => 'compound_frequency',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'compound_frequency_DS',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly (UK & US)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additional_fees_VS',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['I want to add more applicable fees' => '1', '' => '0'],
                            'dataset' => 'additional_fees_DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgage_points',
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
                            'name' => 'upfront_fee',
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
                            'name' => 'annual_fee',
                            'label' => 'Annual fee',
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
                            'name' => 'mortgage_type_VS',
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
                            'dataset' => 'mortgage_type_DS',
                            'control' => 'DROPDOWN',
                            'default' => 'Fixed-rate',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adjustment_type_VS',
                            'label' => 'Adjustments by…',
                            'type' => 'select',
                            'options' => ['Manual setup' => '1', 'Trend' => '2'],
                            'dataset' => 'interest_rate_adjustments_DS',
                            'help' => 'With "manual setup", the interest rate changes periodically. With a trend, the interest rate changes steadily up to the given rate.',
                            'default' => 'Manual setup',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_trend',
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
                            'name' => 'expected_adjustment',
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
                            'name' => 'first_adjustment',
                            'label' => 'First adjustment after…',
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
                            'name' => 'adjustments_period',
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
                            'name' => 'interest_rate_cap',
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
                            'name' => 'interest_rate_floor',
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
                            'name' => 'mortgage_interest',
                            'label' => 'Mortgage interest',
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
                            'name' => 'annual_percentage_rate',
                            'label' => 'APR (Annual percentage rate)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '3'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_represent_VS',
                            'label' => 'Represent…',
                            'type' => 'select',
                            'options' => ['Chart of balances' => '1', 'Amortization schedule' => '2', 'Both' => '3'],
                            'dataset' => 'data_representation_DS',
                            'default' => 'Chart of balances',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Schedule from…', 'type' => 'date'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mortgage_points = upfront_fee / loan_amount',
            'results' => ['loan_amount' => 'upfront_fee/mortgage_points', 'mortgage_points' => 'upfront_fee/loan_amount', 'upfront_fee' => 'loan_amount*mortgage_points'],
        ],
        [
            'title' => <<<'TXT'
            monthly_payment = getMonthlyPayment(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT,
            'results' => ['monthly_payment' => <<<'TXT'
            getMonthlyPayment(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            mortgage_interest = getMortgageInterest(loan_amount, compound_frequency, interest_rate, mortgage_term, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT,
            'results' => ['mortgage_interest' => <<<'TXT'
            getMortgageInterest(loan_amount, compound_frequency, interest_rate, mortgage_term, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            additional_costs = getAdditionalCosts(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee,  mortgage_points, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT,
            'results' => ['additional_costs' => <<<'TXT'
            getAdditionalCosts(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee, mortgage_points, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            annual_percentage_rate = getAPR(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee,  mortgage_points, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT,
            'results' => ['annual_percentage_rate' => <<<'TXT'
            getAPR(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee, mortgage_points, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            total_payments = getTotalPayments(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee,  mortgage_points, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT,
            'results' => ['total_payments' => <<<'TXT'
            getTotalPayments(loan_amount, compound_frequency, interest_rate, mortgage_term, annual_fee, mortgage_points, mortgage_type_VS, adjustment_type_VS, adjustments_period, expected_adjustment, first_adjustment, expected_trend, interest_rate_cap, interest_rate_floor)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getTotalPayments",function(loan_amount,compound_frequency,interest_rate,mortgage_term,annual_fee,mortgage_points,mortgage_type_VS,adjustment_type_VS,adjustments_period,expected_adjustment,first_adjustment,expected_trend,interest_rate_cap,interest_rate_floor){var adjustmentsPeriod=adjustments_period;var expectedAdjustment=expected_adjustment;var firstAdjustment=first_adjustment;if(mortgage_type_VS===10){firstAdjustment=120;adjustmentsPeriod=12}else if(mortgage_type_VS===7){firstAdjustment=84;adjustmentsPeriod=12}else if(mortgage_type_VS===5){firstAdjustment=60;adjustmentsPeriod=12}else if(mortgage_type_VS===3){firstAdjustment=36;adjustmentsPeriod=12}else if(mortgage_type_VS===0){firstAdjustment=0;adjustmentsPeriod=0;expectedAdjustment=0}var m=compound_frequency;var periodsLoop=12*mortgage_term;var costMonth=annual_fee/12;var eq_p=getPerEqRate(12,m,interest_rate);var eq_pAdj=getPerEqRate(12,m,expectedAdjustment);var eq_pMax=getPerEqRate(12,m,interest_rate_cap);var eq_pMin=getPerEqRate(12,m,interest_rate_floor);var eq_pTrend=getPerEqRate(12,m,expected_trend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-firstAdjustment)*adjustmentsPeriod;var pmt=getPmt(loan_amount,mortgage_term,12,eq_p);var costUpfront=loan_amount*mortgage_points;var rMonth=eq_p;var pmtMonth=pmt;var princBal=loan_amount;var princBalOpen;var princMonth;var intMonth;var intPaid=0;var intPaidInt=0;for(var i=1;i<=periodsLoop;i++){if(adjustment_type_VS===2&&i>firstAdjustment&&((i-1-firstAdjustment)%adjustmentsPeriod===1&&adjustmentsPeriod>1||(i-1-firstAdjustment)%adjustmentsPeriod===0&&adjustmentsPeriod===1)){rMonth=rMonth+eq_pTrendAdd}if(i===firstAdjustment+1&&adjustment_type_VS===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(adjustment_type_VS===2&&interest_rate<expected_trend&&rMonth>eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===2&&interest_rate>expected_trend&&rMonth<eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===1&&expectedAdjustment>0&&rMonth>eq_pMax){rMonth=eq_pMax}else if(adjustment_type_VS===1&&expectedAdjustment<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i>firstAdjustment&&adjustment_type_VS===1){firstAdjustment+=adjustmentsPeriod}if(rMonth===0){rMonth=1e-11}pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,12,rMonth);intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(i===0){intMonth=0;princMonth=0}if(princBalOpen<pmtMonth){princMonth=princBalOpen}intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}}return intPaidInt+intPaid+periodsLoop*costMonth+costUpfront+loan_amount});omni.define("getAPR",function(loan_amount,compound_frequency,interest_rate,mortgage_term,annual_fee,mortgage_points,mortgage_type_VS,adjustment_type_VS,adjustments_period,expected_adjustment,first_adjustment,expected_trend,interest_rate_cap,interest_rate_floor){var adjustmentsPeriod=adjustments_period;var expectedAdjustment=expected_adjustment;var firstAdjustment=first_adjustment;if(mortgage_type_VS===10){firstAdjustment=120;adjustmentsPeriod=12}else if(mortgage_type_VS===7){firstAdjustment=84;adjustmentsPeriod=12}else if(mortgage_type_VS===5){firstAdjustment=60;adjustmentsPeriod=12}else if(mortgage_type_VS===3){firstAdjustment=36;adjustmentsPeriod=12}else if(mortgage_type_VS===0){firstAdjustment=0;adjustmentsPeriod=0;expectedAdjustment=0}var m=compound_frequency;var periods=12*mortgage_term;var periodsLoop=12*mortgage_term;var costMonth=annual_fee/12;var eq_p=getPerEqRate(12,m,interest_rate);var eq_pAdj=getPerEqRate(12,m,expectedAdjustment);var eq_pMax=getPerEqRate(12,m,interest_rate_cap);var eq_pMin=getPerEqRate(12,m,interest_rate_floor);var eq_pTrend=getPerEqRate(12,m,expected_trend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-firstAdjustment)*adjustmentsPeriod;var pmt=getPmt(loan_amount,mortgage_term,12,eq_p);var costUpfront=loan_amount*mortgage_points;var rMonth=eq_p;var pmtMonth=pmt;var princBal=loan_amount;var princBalOpen;var princMonth;var intMonth;var intRateSumRep=0;for(var i=1;i<=periodsLoop;i++){if(adjustment_type_VS===2&&i>firstAdjustment&&((i-1-firstAdjustment)%adjustmentsPeriod===1&&adjustmentsPeriod>1||(i-1-firstAdjustment)%adjustmentsPeriod===0&&adjustmentsPeriod===1)){rMonth=rMonth+eq_pTrendAdd}if(i===firstAdjustment+1&&adjustment_type_VS===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(adjustment_type_VS===2&&interest_rate<expected_trend&&rMonth>eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===2&&interest_rate>expected_trend&&rMonth<eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===1&&expectedAdjustment>0&&rMonth>eq_pMax){rMonth=eq_pMax}else if(adjustment_type_VS===1&&expectedAdjustment<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i>firstAdjustment&&adjustment_type_VS===1){firstAdjustment+=adjustmentsPeriod}if(rMonth===0){rMonth=1e-11}pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,12,rMonth);intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(princBalOpen<pmtMonth){princMonth=princBalOpen}intRateSumRep+=rMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0;intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}}var intRateRep=intRateSumRep/periods;var pmtAveRep=getPmt(loan_amount,periods/12,12,intRateRep);return getAPR(loan_amount,pmtAveRep+costMonth,periods,costUpfront,12)});omni.define("getAdditionalCosts",function(loan_amount,compound_frequency,interest_rate,mortgage_term,annual_fee,mortgage_points,mortgage_type_VS,adjustment_type_VS,adjustments_period,expected_adjustment,first_adjustment,expected_trend,interest_rate_cap,interest_rate_floor){var adjustmentsPeriod=adjustments_period;var expectedAdjustment=expected_adjustment;var firstAdjustment=first_adjustment;if(mortgage_type_VS===10){firstAdjustment=120;adjustmentsPeriod=12}else if(mortgage_type_VS===7){firstAdjustment=84;adjustmentsPeriod=12}else if(mortgage_type_VS===5){firstAdjustment=60;adjustmentsPeriod=12}else if(mortgage_type_VS===3){firstAdjustment=36;adjustmentsPeriod=12}else if(mortgage_type_VS===0){firstAdjustment=0;adjustmentsPeriod=0;expectedAdjustment=0}var m=compound_frequency;var periodsLoop=12*mortgage_term;var costMonth=annual_fee/12;var eq_p=getPerEqRate(12,m,interest_rate);var eq_pAdj=getPerEqRate(12,m,expectedAdjustment);var eq_pMax=getPerEqRate(12,m,interest_rate_cap);var eq_pMin=getPerEqRate(12,m,interest_rate_floor);var eq_pTrend=getPerEqRate(12,m,expected_trend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-firstAdjustment)*adjustmentsPeriod;var pmt=getPmt(loan_amount,mortgage_term,12,eq_p);var costUpfront=loan_amount*mortgage_points;var rMonth=eq_p;var pmtMonth=pmt;var princBal=loan_amount;var princBalOpen;var princMonth;var intMonth;for(var i=0;i<=periodsLoop;i++){if(adjustment_type_VS===2&&i>firstAdjustment&&((i-1-firstAdjustment)%adjustmentsPeriod===1&&adjustmentsPeriod>1||(i-1-firstAdjustment)%adjustmentsPeriod===0&&adjustmentsPeriod===1)){rMonth=rMonth+eq_pTrendAdd}if(i===firstAdjustment+1&&adjustment_type_VS===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(adjustment_type_VS===2&&interest_rate<expected_trend&&rMonth>eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===2&&interest_rate>expected_trend&&rMonth<eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===1&&expectedAdjustment>0&&rMonth>eq_pMax){rMonth=eq_pMax}else if(adjustment_type_VS===1&&expectedAdjustment<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i>firstAdjustment&&adjustment_type_VS===1){firstAdjustment+=adjustmentsPeriod}if(rMonth===0){rMonth=1e-11}pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,12,rMonth);intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(princBalOpen<pmtMonth){princMonth=princBalOpen}if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0;intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}}return periodsLoop*costMonth+costUpfront});omni.define("getMortgageInterest",function(loan_amount,compound_frequency,interest_rate,mortgage_term,mortgage_type_VS,adjustment_type_VS,adjustments_period,expected_adjustment,first_adjustment,expected_trend,interest_rate_cap,interest_rate_floor){var adjustmentsPeriod=adjustments_period;var expectedAdjustment=expected_adjustment;var firstAdjustment=first_adjustment;if(mortgage_type_VS===10){firstAdjustment=120;adjustmentsPeriod=12}else if(mortgage_type_VS===7){firstAdjustment=84;adjustmentsPeriod=12}else if(mortgage_type_VS===5){firstAdjustment=60;adjustmentsPeriod=12}else if(mortgage_type_VS===3){firstAdjustment=36;adjustmentsPeriod=12}else if(mortgage_type_VS===0){firstAdjustment=0;adjustmentsPeriod=0;expectedAdjustment=0}var m=compound_frequency;var periodsLoop=12*mortgage_term;var eq_p=getPerEqRate(12,m,interest_rate);var eq_pAdj=getPerEqRate(12,m,expectedAdjustment);var eq_pMax=getPerEqRate(12,m,interest_rate_cap);var eq_pMin=getPerEqRate(12,m,interest_rate_floor);var eq_pTrend=getPerEqRate(12,m,expected_trend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-firstAdjustment)*adjustmentsPeriod;var pmt=getPmt(loan_amount,mortgage_term,12,eq_p);var rMonth=eq_p;var pmtMonth=pmt;var princBal=loan_amount;var princBalOpen;var princMonth;var intMonth;var intPaid=0;for(var i=1;i<=periodsLoop;i++){if(adjustment_type_VS===2&&i>firstAdjustment&&((i-1-firstAdjustment)%adjustmentsPeriod===1&&adjustmentsPeriod>1||(i-1-firstAdjustment)%adjustmentsPeriod===0&&adjustmentsPeriod===1)){rMonth=rMonth+eq_pTrendAdd}if(i===firstAdjustment+1&&adjustment_type_VS===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(adjustment_type_VS===2&&interest_rate<expected_trend&&rMonth>eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===2&&interest_rate>expected_trend&&rMonth<eq_pTrend){rMonth=eq_pTrend}else if(adjustment_type_VS===1&&expectedAdjustment>0&&rMonth>eq_pMax){rMonth=eq_pMax}else if(adjustment_type_VS===1&&expectedAdjustment<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(i>firstAdjustment&&adjustment_type_VS===1){firstAdjustment+=adjustmentsPeriod}if(rMonth===0){rMonth=1e-11}pmtMonth=getPmt(princBal,(periodsLoop-i+1)/12,12,rMonth);intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(princBalOpen<pmtMonth){princMonth=princBalOpen}intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}}return intPaid});omni.define("getMonthlyPayment",function(loan_amount,compound_frequency,interest_rate,mortgage_term,annual_fee,mortgage_type_VS,adjustment_type_VS,adjustments_period,expected_adjustment,first_adjustment,expected_trend,interest_rate_cap,interest_rate_floor){var adjustmentsPeriod=adjustments_period;var expectedAdjustment=expected_adjustment;var firstAdjustment=first_adjustment;if(mortgage_type_VS===10){firstAdjustment=120;adjustmentsPeriod=12}else if(mortgage_type_VS===7){firstAdjustment=84;adjustmentsPeriod=12}else if(mortgage_type_VS===5){firstAdjustment=60;adjustmentsPeriod=12}else if(mortgage_type_VS===3){firstAdjustment=36;adjustmentsPeriod=12}else if(mortgage_type_VS===0){firstAdjustment=0;adjustmentsPeriod=0;expectedAdjustment=0}var m=compound_frequency;var periodsLoop=12*mortgage_term;var eq_p=getPerEqRate(12,m,interest_rate);var eq_pAdj=getPerEqRate(12,m,expectedAdjustment);var eq_pMax=getPerEqRate(12,m,interest_rate_cap);var eq_pMin=getPerEqRate(12,m,interest_rate_floor);var eq_pTrend=getPerEqRate(12,m,expected_trend);var eq_pTrendAdd=(eq_pTrend-eq_p)/(periodsLoop-firstAdjustment)*adjustmentsPeriod;var pmt=getPmt(loan_amount,mortgage_term,12,eq_p);var rMonth=eq_p;var pmtMonth=pmt;if(adjustment_type_VS===2&&firstAdjustment<1&&(-firstAdjustment%adjustmentsPeriod===1&&adjustmentsPeriod>1||-firstAdjustment%adjustmentsPeriod===0&&adjustmentsPeriod===1)){rMonth=rMonth+eq_pTrendAdd}if(firstAdjustment===0&&adjustment_type_VS===1&&rMonth+1e-8<eq_pMax&&rMonth-1e-8>eq_pMin){rMonth=rMonth+eq_pAdj}if(adjustment_type_VS===2&&interest_rate<expected_trend&&rMonth>eq_pTrend){rMonth=eq_pTrend}if(adjustment_type_VS===2&&interest_rate>expected_trend&&rMonth<eq_pTrend){rMonth=eq_pTrend}if(adjustment_type_VS===1&&expectedAdjustment>0&&rMonth>eq_pMax){rMonth=eq_pMax}if(adjustment_type_VS===1&&expectedAdjustment<0&&rMonth<eq_pMin){rMonth=eq_pMin}if(rMonth===0){rMonth=1e-11}pmtMonth=getPmt(loan_amount,periodsLoop/12,12,rMonth);return pmtMonth+annual_fee/12});function getAPR(loanAmount,Pmt,Per,FeePre,q){var Max_iterations=50000;var Min_precision=1e-7;var APR_approx=2*q*(Pmt*Per+FeePre-loanAmount)/(loanAmount*(Per+1));var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=Pmt-Pmt*mathjs.pow(1+newI,-Per)-newI*(loanAmount-FeePre);var divisor=Pmt*Per*mathjs.pow(1+newI,-Per-1)-(loanAmount-FeePre);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);return newI*q}function getPerEqRate(q,m,interestRate){var ex=Math.exp(1);var base;var power;if(m===0){var continuous_r=mathjs.pow(ex,interestRate)-1;base=1+continuous_r;power=1/q}else{base=1+interestRate/m;power=m/q}return mathjs.round(mathjs.pow(base,power)-1,10)}function getPmt(loanAmount,mortgageTerm,q,eq_p){var periods=mortgageTerm*q;var Pmt=loanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);return Pmt}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Mortgage interest works out Mortgage points and Monthly payment from Mortgage principal and Up-front fee. There is no hidden constant here: change mortgage points and mortgage principal moves with it. The main result, Mortgage points, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage interest calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mortgage interest: it takes 2 numbers and reports Mortgage points, Monthly payment and Mortgage interest.</p><p>In the form&#039;s own words, Mortgage points = Up-front fee ÷ Mortgage principal.</p><p>The result panel carries Mortgage points, Monthly payment, Mortgage interest and Additional costs, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Mortgage principal</strong> — in USD</li><li><strong>Up-front fee</strong> — in USD</li></ul><p>What you get back is Mortgage points in percent, Monthly payment in USD, Mortgage interest in USD, Additional costs in USD, APR (Annual percentage rate) in percent, Total payments in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Mortgage points lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mortgage points</strong> = <code>Up-front fee ÷ Mortgage principal</code></li><li><strong>Mortgage principal</strong> = <code>Up-front fee ÷ Mortgage points</code></li><li><strong>Up-front fee</strong> = <code>Mortgage principal × Mortgage points</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mortgage points</strong> = <code>Up-front fee ÷ Mortgage principal</code> — the form to use when Up-front fee and Mortgage principal are the values you have.</li><li><strong>Mortgage principal</strong> = <code>Up-front fee ÷ Mortgage points</code> — the form to use when Up-front fee and Mortgage points are the values you have.</li><li><strong>Up-front fee</strong> = <code>Mortgage principal × Mortgage points</code> — the form to use when Mortgage principal and Mortgage points are the values you have.</li></ul><p>Any one of Mortgage points, Mortgage principal and Up-front fee can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mortgage points, Monthly payment and Mortgage interest are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mortgage principal left as a guess.</strong> Anything typed into Mortgage principal is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Up-front fee left as a guess.</strong> Anything typed into Up-front fee is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mortgage principal to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mortgage interest form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mortgage principal</strong> takes a plain number with no unit attached. The page reads it when it works out Mortgage points, Up-front fee and Monthly payment. Fill it from a measurement rather than a memory — Mortgage principal is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Up-front fee</strong> takes a plain number with no unit attached. The page reads it when it works out Mortgage principal and Mortgage points. Fill it from a measurement rather than a memory — Up-front fee is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Mortgage points</strong> is a percent figure. It is worked out from Up-front fee and Mortgage principal. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly payment</strong> is a plain number. It is worked out from Mortgage principal, Compounding frequency, Interest rate and Mortgage term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Mortgage interest</strong> is a plain number. It is worked out from Mortgage principal, Compounding frequency, Interest rate and Mortgage term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Additional costs</strong> is a plain number. It is worked out from Mortgage principal, Compounding frequency, Interest rate and Mortgage term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>APR (Annual percentage rate)</strong> is a percent figure. It is worked out from Mortgage principal, Compounding frequency, Interest rate and Mortgage term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total payments</strong> is a plain number. It is worked out from Mortgage principal, Compounding frequency, Interest rate and Mortgage term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Mortgage interest actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mortgage principal and Up-front fee ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mortgage principal — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Mortgage points in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mortgage points is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mortgage principal and Up-front fee are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mortgage principal and Up-front fee and the number you are missing is Mortgage points and Monthly payment.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/nav">Net asset value (NAV)</a>, <a href="/finance/net-debt">Net debt Calculator</a> and <a href="/finance/net-effective-rent">Net effective rent Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage interest calculator work out?', 'a' => <<<'TXT'
            Mortgage points, Monthly payment, Mortgage interest and Additional costs, from Up-front fee and Mortgage principal. The relationship is Mortgage points = Up-front fee ÷ Mortgage principal.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mortgage principal (USD), Up-front fee (USD). Fill mortgage principal and up-front fee and leave Mortgage points empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mortgage points, Mortgage principal, Up-front fee and Monthly payment blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Mortgage points is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mortgage principal blank and the page solves for it, reporting Mortgage points instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Mortgage points keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
        ],
        'authors' => [],
    ],
];
