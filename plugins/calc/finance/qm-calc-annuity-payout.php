<?php

/**
 * Annuity payout
 * /finance/annuity-payout
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annuity payout',
    'meta' => ['title' => 'Annuity payout Calculator — Formula, Units & Example', 'description' => 'Annuity payout works out periodic growth rate and return status and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Annuity payout Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'Annuity payout option',
                            'type' => 'select',
                            'options' => ['Fixed payment annuity' => '2', 'Fixed length annuity' => '1'],
                            'dataset' => 'VarSub',
                            'default' => 'Fixed length annuity',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Initial balance',
                            'type' => 'number',
                            'help' => 'The principal balance at the beginning of the annuity.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'help' => 'The future value of the annuity.',
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
                            'name' => 'PerPay',
                            'label' => 'Annuity payout',
                            'type' => 'number',
                            'help' => 'How much money is being withdrawn at equal intervals.',
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
                            'name' => 'q',
                            'label' => 'Payout frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'help' => 'The interval between the annuity payouts.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RecFreq',
                            'label' => 'Payment frequency',
                            'type' => 'number',
                            'help' => 'The interval between deposits or withdrawals.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type of annuity',
                            'type' => 'select',
                            'options' => ['Ordinary annuity' => '0', 'Annuity due' => '1'],
                            'dataset' => 'VarType',
                            'control' => 'DROPDOWN',
                            'help' => 'Ordinary annuity: end of periods; annuity due: beginning of periods.',
                            'default' => 'Ordinary annuity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Length of annuity',
                            'type' => 'number',
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
                            'label' => 'Annuity rate',
                            'type' => 'number',
                            'help' => 'The percentage by which an annuity grows each year.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of the annuity payouts over a year.',
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
                            'name' => 'g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate in the periodic payout. Note, that the periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the payout frequency.
                            TXT,
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
                            'name' => 'CompFreq',
                            'label' => 'Compounding method',
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
                            'dataset' => 'm',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency with which interest is added to the balance.',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advanced_mode',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set final balance, growth and compounding' => '1', '' => '0'],
                            'dataset' => 'advanced mode',
                            'control' => 'CHECKBOX',
                            'default' => '',
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
                                ['when' => null, 'text' => 'You can withdraw {{PerPay1.monetaryValue}}&nbsp;'],
                                ['when' => null, 'text' => 'at the {{type.uiValue}} each {{tittle2.uiValue}} to&nbsp;'],
                                ['when' => null, 'text' => 'reach the final&nbsp;'],
                                ['when' => 'FinBal == 0', 'text' => 'deplete your initial&nbsp;'],
                                ['when' => null, 'text' => 'balance.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your withdrawal starts at {{PerPay1.monetaryValue}} and increases from there.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'You will reach the given final balance in {{yearDebt.formattedValue}} year(s) and {{monthDebt.formattedValue}} month(s).'],
                                ['when' => 'FinBal == 0', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} year(s) and {{monthDebt.formattedValue}} month(s).'],
                                ['when' => 'yearDebt == 0 and monthDebt == 0', 'text' => 'Since the return on your initial balance covers all your withdrawals, your annuity lasts forever.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The total interest earned on the annuity is {{total_interest.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'return_status == -1', 'text' => 'The maximum length for the computation is 100 years.'],
                            ],
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
                            'name' => 'return_status',
                            'label' => 'Return status',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'PerPay1',
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
                            'name' => 'type',
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
                            'name' => 'tittle2',
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
                            'name' => 'termDebt',
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
                            'name' => 'monthDebt',
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
                            'name' => 'yearDebt',
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
                            'name' => 'eq_p',
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
                            'name' => 'eq_base',
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
                            'name' => 'eq_power',
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
                            'name' => 'periods1',
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
                            'name' => 'PrincBal',
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
                            'name' => 'DepBal',
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
                            'name' => 'total_interest',
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
            'title' => 'g_p = pow(g + 1, 1/q) - 1',
            'results' => ['q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1', 'g_p' => 'pow(g + 1, 1/q) - 1'],
        ],
        [
            'title' => 'return_status = run_calculator(Subject, InDep, FinBal, CompFreq, q, t, PerPay, Type, r, g, g_p)',
            'results' => ['return_status' => 'run_calculator(Subject, InDep, FinBal, CompFreq, q, t, PerPay, Type, r, g, g_p)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var time_decimal_years,total_interest,period_withdrawal;omni.define("run_calculator",function(VarSub,InDep,FinBal,m,q,t,PerPay,VarType,r,g,g_p){if(VarSub>1){g_p=0}var periods=q*t;if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);if(VarSub===1){PerPay=getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}if(VarSub===2){PerPay=-PerPay;periods=getAnnuityPer(InDep,FinBal,PerPay,eq_p,VarType);if(periods===0){return-2}t=periods/q}var periodsCount=0,TotInt=0,TotIntPer=0,iDep=0,TotBalOpen=0,InBalOpen=0,DepBalOpen=0;var periodsLoop=mathjs.floor(periods);if(VarSub===2){periodsLoop=mathjs.floor(periods+1)}for(var i=0;i<=periodsLoop;i++){if(i/q>100){return-1}if(i>0){periodsCount=i;InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);if(VarType===1){TotIntPer=(TotBalOpen+iDep)*eq_p}else{TotIntPer=TotBalOpen*eq_p}TotInt+=TotIntPer}}period_withdrawal=mathjs.abs(PerPay);total_interest=TotInt;time_decimal_years=periodsCount/q;return 1});omni.define("get_time_decimal_years",function(){return time_decimal_years});omni.define("get_total_interest",function(){return total_interest});omni.define("get_period_withdrawal",function(){return period_withdrawal});omni.define("get_eq_base",function(m,r){var ex=mathjs.e;var eq_base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}return eq_base});function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getAnnuityPer(InBal,FinBal,PerPay,eq_p,VarType){var periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods<0){periods=0}return periods}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.pow(base,power)-1;return eq_p}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Annuity payout option, Initial balance and Final balance into Annuity payout and the answer comes back as Type and Tittle 2. Nothing is looked up on this page: type is computed from annuity payout option and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Annuity payout calculator works', 'html' => <<<'TXT'
            <p>Annuity payout answers one question from 13 numbers, and the answer is Type and Tittle 2.</p><p>Written with the labels from the form, Periodic growth rate = (Annual growth rate + 1)^(1 ÷ Payout frequency) − 1.</p><p>What comes back is Type and Tittle 2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 13 boxes, and nothing else.</p><ul><li><strong>Annuity payout option</strong> — a plain number, no unit</li><li><strong>Initial balance</strong> — in USD. The principal balance at the beginning of the annuity.</li><li><strong>Final balance</strong> — in USD. The future value of the annuity.</li><li><strong>Annuity payout</strong> — in USD. How much money is being withdrawn at equal intervals.</li><li><strong>Payout frequency</strong> — a plain number, no unit. The interval between the annuity payouts.</li><li><strong>Payment frequency</strong> — a plain number, no unit. The interval between deposits or withdrawals.</li><li><strong>Type of annuity</strong> — a plain number, no unit. Ordinary annuity: end of periods; annuity due: beginning of periods.</li><li><strong>Length of annuity</strong> — in years / months</li><li><strong>Annuity rate</strong> — in percent. The percentage by which an annuity grows each year.</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of the annuity payouts over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate in the periodic payout. Note, that the periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the payout frequency.</li><li><strong>Compounding method</strong> — a plain number, no unit. The frequency with which interest is added to the balance.</li><li><strong>Return status</strong> — a plain number, no unit</li></ul><p>What you get back is Type, Tittle 2, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Annuity payout option = 1, Initial balance = 100000 USD, Final balance = 4 USD, Annuity payout = 1000 USD, Payment frequency = 1, Type of annuity = 0, Length of annuity = 120 yrsmos, Annuity rate = 6 perc, Compounding method = 1 and Advanced mode = 0 gives <strong>Payout frequency</strong> = 12.</p><ul><li><strong>Payout frequency</strong> = 12</li></ul><p>That is <strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payout frequency) − 1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Payout frequency</strong> = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Length of annuity lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payout frequency) − 1</code></li><li><strong>Payout frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payout frequency) − 1</code></li><li><strong>Return status</strong> = <code>run_calculator(Annuity payout option, Initial balance, Final balance, Compounding method, Payout frequency, Length of annuity, Annuity payout, Type of annuity, Annuity rate, Annual growth rate, Periodic growth rate)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payout frequency) − 1</code> — the form to use when Annual growth rate and Payout frequency are the values you have.</li><li><strong>Payout frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payout frequency) − 1</code> — the form to use when Periodic growth rate and Payout frequency are the values you have.</li><li><strong>Return status</strong> = <code>run_calculator(Annuity payout option, Initial balance, Final balance, Compounding method, Payout frequency, Length of annuity, Annuity payout, Type of annuity, Annuity rate, Annual growth rate, Periodic growth rate)</code> — the form to use when Annuity payout option, Initial balance, Final balance and Compounding method are the values you have.</li></ul><p>Any one of Periodic growth rate, Payout frequency and Annual growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Annuity payout option, from 1 to 2 — and the answers go from <strong>Payout frequency</strong> 12 to <strong>Payout frequency</strong> 12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length of annuity, Annuity rate and Annual growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Type and Tittle 2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annuity payout option left as a guess.</strong> Anything typed into Annuity payout option is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Initial balance left as a guess.</strong> Anything typed into Initial balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Annuity payout option to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Annuity payout form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annuity payout option</strong> takes a plain number with no unit attached. Change it and Return status changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Annuity payout option is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial balance</strong> takes a plain number with no unit attached. The principal balance at the beginning of the annuity. Change it and Return status changes with it. Fill it from a measurement rather than a memory — Initial balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final balance</strong> takes a plain number with no unit attached. The future value of the annuity. Change it and Return status changes with it. Fill it from a measurement rather than a memory — Final balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annuity payout</strong> takes a plain number with no unit attached. How much money is being withdrawn at equal intervals. Change it and Return status changes with it. Fill it from a measurement rather than a memory — Annuity payout is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Payout frequency</strong> takes a plain number with no unit attached. The interval between the annuity payouts. Change it and Annual growth rate, Periodic growth rate and Return status changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Payout frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. The interval between deposits or withdrawals. Fill it from a measurement rather than a memory — Payment frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Type of annuity</strong> takes a plain number with no unit attached. Ordinary annuity: end of periods; annuity due: beginning of periods. Change it and Return status changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Type of annuity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Length of annuity</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Return status changes with it. Fill it from a measurement rather than a memory — Length of annuity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annuity rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage by which an annuity grows each year. Change it and Return status changes with it. Fill it from a measurement rather than a memory — Annuity rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of the annuity payouts over a year. Change it and Payout frequency, Periodic growth rate and Return status changes with it. Fill it from a measurement rather than a memory — Annual growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate in the periodic payout. Note, that the periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the payout frequency. Change it and Payout frequency, Annual growth rate and Return status changes with it. Fill it from a measurement rather than a memory — Periodic growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding method</strong> takes a plain number with no unit attached. The frequency with which interest is added to the balance. Change it and Return status changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding method is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Return status</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Return status is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Type is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Annuity payout option, Initial balance and Final balance and the number you are missing is Type and Tittle 2.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/optimal-price">Optimal price Calculator</a>, <a href="/finance/options-spread">Options spread</a> and <a href="/finance/overtime">Overtime Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annuity payout calculator work out?', 'a' => <<<'TXT'
            Type and Tittle 2, from Annual growth rate and Payout frequency. The relationship is Periodic growth rate = (Annual growth rate + 1)^(1 ÷ Payout frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annuity payout option, Initial balance (USD), Final balance (USD), Annuity payout (USD), Payout frequency. Fill annuity payout option, initial balance and final balance and leave Type empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periodic growth rate, Payout frequency, Annual growth rate and Return status blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Payout frequency = 12. The figures come from Annuity payout option as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Type is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Annuity payout option blank and the page solves for it, reporting Type instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Type keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/optimal-price', 'name' => 'Optimal price Calculator'],
            ['path' => '/finance/options-spread', 'name' => 'Options spread'],
            ['path' => '/finance/overtime', 'name' => 'Overtime Calculator'],
        ],
        'authors' => [],
    ],
];
