<?php

/**
 * Compound interest
 * /finance/compound-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compound interest',
    'meta' => ['title' => 'Compound interest: Formula, Steps & Results', 'description' => 'Compound interest works out the missing figure from initial balance, interest rate, term, compounding frequency and how often?. Any box can be the unknown.', 'h1' => 'Compound interest Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_balance',
                            'label' => 'Initial balance',
                            'type' => 'number',
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
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Yearly nominal interest rate.',
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
                            'name' => 'term',
                            'label' => 'Term',
                            'type' => 'number',
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
                            'name' => 'compound_frequency_VS',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly (1/Yr)' => '1',
                                'Semi-annually (2/Yr)' => '2',
                                'Quarterly (4/Yr)' => '4',
                                'Bi-monthly (6/Yr)' => '6',
                                'Monthly (12/Yr)' => '12',
                                'Bi-weekly (average)' => '26.08875',
                                'Bi-weekly (26/Yr)' => '26',
                                'Weekly (average)' => '52.1775',
                                'Weekly (52/Yr)' => '52',
                                'Daily (average)' => '365.242',
                                'Daily (360/Yr)' => '360',
                                'Daily (365/Yr)' => '365',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'Compound frequency DS',
                            'control' => 'DROPDOWN',
                            'help' => 'You can set here how often the interest is added to your principal balance.',
                            'default' => 'Monthly (12/Yr)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional deposits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_frequency_VS',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => [
                                'Never' => '1000',
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Bi-weekly (26/Yr)' => '26',
                                'Weekly (52/Yr)' => '52',
                                'Daily (365/Yr)' => '365',
                            ],
                            'dataset' => 'Payment frequency DS',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set the regularity of the additional deposits.',
                            'default' => 'Never',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_frequency',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodic_deposit',
                            'label' => 'How much?',
                            'type' => 'number',
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
                            'name' => 'deposit_type_VS',
                            'label' => 'When?',
                            'type' => 'select',
                            'options' => ['Beginning of period' => '1', 'End of period' => '0'],
                            'dataset' => 'Type of Deposit DS',
                            'default' => 'Beginning of period',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_growth_rate',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic deposits over a year.',
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
                            'name' => 'periodic_growth_rate',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The final balance is {{finalBalance.monetaryValue}}.'],
                                ['when' => 'initial_balance <= 0 and (periodic_deposit <= 0 or payment_frequency_VS == 1000)', 'text' => 'Either the initial balance or the additional deposit must be a positive value.'],
                                ['when' => 'initial_balance > 0 and periodic_deposit > 0 and payment_frequency_VS != 1000', 'text' => <<<'TXT'
                                The total compound interest is {{BalanceIntTotal.monetaryValue}}. The compound interest on initial balance is {{compoundInterestOnInitialBalance.monetaryValue}}. The compound interest on additional deposits is {{compoundInterestOnAdditionalDeposit.monetaryValue}}. The final balance of initial money is {{finalBalanceOfInitialDeposit.monetaryValue}}. The final balance of additional deposit is {{DepB
                                TXT],
                                ['when' => 'initial_balance == 0 and periodic_deposit > 0 and payment_frequency_VS != 1000', 'text' => 'The sum of the additional deposits is {{DepBalPrinc.monetaryValue}}, and the total interest gained is {{BalanceIntTotal.monetaryValue}}.'],
                                ['when' => 'initial_balance > 0 and (periodic_deposit == 0 or payment_frequency_VS == 1000)', 'text' => 'The total compound interest is {{BalanceIntTotal.monetaryValue}}.'],
                            ],
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
                            'name' => 'balances_represent_VS',
                            'label' => 'Represent',
                            'type' => 'select',
                            'options' => ['Bar graph' => '2', 'Pie chart' => '5', 'Table' => '3', 'Charts and table' => '4'],
                            'dataset' => 'Data representation DS',
                            'default' => 'Bar graph',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'table_schedule_frequency_VS',
                            'label' => 'Table schedule',
                            'type' => 'select',
                            'options' => ['Monthly' => '1', 'Yearly' => '2'],
                            'dataset' => 'Table schedule frequency DS',
                            'default' => 'Monthly',
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
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'initialBalancePercent',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                        [
                            'name' => 'additionalDepositsPercent',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                        [
                            'name' => 'totalCompoundInterestPercent',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'compound_frequency',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'typeTable',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'payment_frequency_table',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tableFrequency',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                    ],
                    'fields' => [
                        [
                            'name' => 'finalBalance',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'MonthlyDep',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'DepBal',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'DepBalPrinc',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'BalanceIntTotal',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'compoundInterestOnInitialBalance',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'finalBalanceOfInitialDeposit',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'compoundInterestOnAdditionalDeposit',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'totalPrincipal',
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
            'title' => 'annual_growth_rate + 1 = (1 + periodic_growth_rate) ^ payment_frequency',
            'results' => ['annual_growth_rate' => 'pow(periodic_growth_rate + 1, payment_frequency) - 1', 'periodic_growth_rate' => 'pow(annual_growth_rate + 1, 1/payment_frequency) - 1', 'payment_frequency' => 'log(annual_growth_rate + 1)/log(periodic_growth_rate + 1)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getFinalBalance",function(m,r,q,t,g,g_p,type,periodicDep,initialDep){var eq_base;var eq_power;if(m===0){var continuous_r=mathjs.pow(Math.E,r)-1;eq_base=1+continuous_r/1;eq_power=1/q}else{eq_base=1+r/m;eq_power=m/q}var eq_p=Math.pow(eq_base,eq_power)-1;var periods=q*t;var depositBal=0;if(q===1000){periodicDep=0}var principalBal=initialDep*Math.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){depositBal=periodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){depositBal=periodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){depositBal=periodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}return principalBal+depositBal});omni.define("getMonthlyDeposit",function(q,periodicDep){if(q==1000){return 0}else{return periodicDep*q/12}});omni.define("getDepBalPrinc",function(q,r,m,t,InitialDep,MonthlyDep,g,g_p,type,PeriodicDep){PeriodicDep=q==1000?0:PeriodicDep;var eq_base;var eq_power;if(m===0){var continuous_r=Math.pow(Math.E,r)-1;eq_base=1+continuous_r/1;eq_power=1/q}else{eq_base=1+r/m;eq_power=m/q}var eq_p=Math.pow(eq_base,eq_power)-1;var periodsMonth=t*12;var DepBalPrinc=0;var dep_pow;for(var i=0;i<=periodsMonth;i++){dep_pow=i/12*q;if(q===1000){MonthlyDep=0}if(g===0&&i>0){DepBalPrinc+=MonthlyDep}if(g!==eq_p&&q!==1&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p)}else if(g!==eq_p&&q===1&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g,dep_pow))*(1+0*type)/(0-g)}else if(g===eq_p&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p)}}return DepBalPrinc});omni.define("geFinalBalOfInitDep",function(q,r,m,t,InitialDep){var eq_base;var eq_power;if(m===0){var continuous_r=mathjs.pow(Math.E,r)-1;eq_base=1+continuous_r/1;eq_power=1/q}else{eq_base=1+r/m;eq_power=m/q}var eq_p=Math.pow(eq_base,eq_power)-1;var periodsMonth=t*12;var dep_pow=periodsMonth/12*q;return InitialDep*Math.pow(1+eq_p,dep_pow)});omni.define("getTotalBalanceOnAddDeposit",function(m,r,q,t,g,g_p,type,periodicDep){var eq_base;var eq_power;if(m===0){var continuous_r=mathjs.pow(Math.E,r)-1;eq_base=1+continuous_r/1;eq_power=1/q}else{eq_base=1+r/m;eq_power=m/q}var eq_p=Math.pow(eq_base,eq_power)-1;var periods=q*t;var depositBal=0;if(q===1000){periodicDep=0}if(g!==eq_p&&q!==1){depositBal=periodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){depositBal=periodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){depositBal=periodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}return depositBal});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Compound interest works out Payment frequency from Initial balance, Interest rate and Term. There is no hidden constant here: change payment frequency and initial balance moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Compound interest calculator works', 'html' => <<<'TXT'
            <p>The Compound interest calculator applies one relationship to 11 numbers and reports Payment frequency.</p><p>Written with the labels from the form, Annual growth rate = (Periodic growth rate + 1)^(Payment frequency) − 1.</p><p>What comes back is Payment frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 11 boxes and the page has everything it needs.</p><ul><li><strong>Initial balance</strong> — in USD</li><li><strong>Interest rate</strong> — in percent. Yearly nominal interest rate.</li><li><strong>Term</strong> — in years / months</li><li><strong>Compounding frequency</strong> — a plain number, no unit. You can set here how often the interest is added to your principal balance.</li><li><strong>How often?</strong> — a plain number, no unit. Here you can set the regularity of the additional deposits.</li><li><strong>How much?</strong> — in USD</li><li><strong>When?</strong> — a plain number, no unit</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic deposits over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.</li><li><strong>Represent</strong> — a plain number, no unit</li><li><strong>Table schedule</strong> — a plain number, no unit</li></ul><p>The result box is Payment frequency. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payment frequency) − 1</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payment frequency) − 1</code></li><li><strong>Payment frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payment frequency) − 1</code> — the form to use when Periodic growth rate and Payment frequency are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payment frequency) − 1</code> — the form to use when Annual growth rate and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li></ul><p>Any one of Annual growth rate, Periodic growth rate and Payment frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate, Term and Annual growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Payment frequency is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial balance left as a guess.</strong> Anything typed into Initial balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial balance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Compound interest form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial balance</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Initial balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Yearly nominal interest rate. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. You can set here how often the interest is added to your principal balance. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How often?</strong> takes a plain number with no unit attached. Here you can set the regularity of the additional deposits. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — How often? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How much?</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — How much? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>When?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — When? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your additional periodic deposits over a year. The page reads it when it works out Periodic growth rate and Payment frequency. Fill it from a measurement rather than a memory — Annual growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit. The page reads it when it works out Annual growth rate and Payment frequency. Fill it from a measurement rather than a memory — Periodic growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Represent</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Represent is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Table schedule</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Table schedule is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Payment frequency</strong> is a plain number. It is computed from Annual growth rate and Periodic growth rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Compound interest actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Payment frequency is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial balance, Interest rate and Term are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial balance, Interest rate and Term measured, Payment frequency wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ohio-sales-tax">Ohio sales tax Calculator</a>, <a href="/finance/okun-law">Okun&#039;s law Calculator</a> and <a href="/finance/marketing-conversion">Online marketing conversion Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compound interest calculator work out?', 'a' => <<<'TXT'
            Payment frequency, from Periodic growth rate and Payment frequency. The relationship is Annual growth rate = (Periodic growth rate + 1)^(Payment frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial balance (USD), Interest rate (percent), Term (years / months), Compounding frequency, How often?. With initial balance, interest rate and term in place, Payment frequency can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Annual growth rate, Periodic growth rate and Payment frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Payment frequency is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial balance blank and the page solves for it, reporting Payment frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Payment frequency keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ohio-sales-tax', 'name' => 'Ohio sales tax Calculator'],
            ['path' => '/finance/okun-law', 'name' => 'Okun\'s law Calculator'],
            ['path' => '/finance/marketing-conversion', 'name' => 'Online marketing conversion Calculator'],
        ],
        'authors' => [],
    ],
];
