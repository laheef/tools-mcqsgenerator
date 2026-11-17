<?php

/**
 * Savings goal
 * /finance/savings-goal
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Savings goal',
    'meta' => ['title' => 'Savings goal Calculator — Formula, Units & Example', 'description' => 'Savings goal works out return status from your goal and i would like to reach it.... A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Savings goal Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => 'Saving objectives',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'Your goal',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing',
                            'label' => 'I would like to reach it...',
                            'type' => 'select',
                            'options' => ['in a specific time' => '1', 'on a specific date' => '2', 'at a certain age' => '3'],
                            'dataset' => 'timing',
                            'control' => 'DROPDOWN',
                            'default' => 'at a certain age',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Time to reach your goal',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '480',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EndDate',
                            'label' => 'Date to reach your goal',
                            'type' => 'date',
                            'help' => 'Note that if the number of periods between the day you start saving and the date of your goal is fractional, the number of periods is rounded up.',
                            'default' => '2072908800000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeStart',
                            'label' => 'Your age now',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'For the sake of simplicity, we suppose that your birthday is today.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeEnd',
                            'label' => 'Your target age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '65',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Your starting savings',
                            'type' => 'number',
                            'help' => 'Use this field if you already have some savings.',
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
            'title' => 'Saving conditions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Interest rate or return',
                            'type' => 'number',
                            'help' => 'Annual nominal interest rate or annual rate of return.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
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
                            'dataset' => 'compound freq (m)',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency interest is added to the principal balance of your savings, or, in other words, how often the earned return or interest is reinvested.&nbsp;',
                            'default' => 'Monthly',
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
                            'help' => <<<'TXT'
                            The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Periodic contribution',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'How often?',
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
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'From which day?', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'When?',
                            'type' => 'select',
                            'options' => ['Beginning of period' => '1', 'End of period' => '0'],
                            'dataset' => 'contribution timing (VarType)',
                            'control' => 'DROPDOWN',
                            'default' => 'End of period',
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
                            'help' => 'The percentage growth rate of your additional periodic contribution over a year.',
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
                            The percentage growth rate of your periodic contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.
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
                                ['when' => 'payment_per_period > 0 and Infl == 0', 'text' => 'You need to put aside {{payment_per_period.monetaryValue}} each {{period_name.uiValue}} to reach your savings goal.'],
                                ['when' => 'payment_per_period > 0 and Infl > 0', 'text' => 'You need to put aside {{payment_per_period.monetaryValue}} each {{period_name.uiValue}} to reach your savings goal in the real, inflation-adjusted term.'],
                                ['when' => 'Infl == 0 and InDep == 0', 'text' => 'The sum of your {{period_name2.uiValue}} savings will be {{sum_savings.monetaryValue}}, with a total return of {{total_return.monetaryValue}}.'],
                                ['when' => 'Infl == 0 and InDep != 0', 'text' => <<<'TXT'
                                The sum of your {{period_name2.uiValue}} savings with the initial balance will be {{sum_savings_plus_initial.monetaryValue}}, with a total return of {{total_return.monetaryValue}}.
                                TXT],
                                ['when' => 'Infl != 0 and InDep == 0', 'text' => <<<'TXT'
                                The final nominal value (without inflation adjustment) of your savings will be {{final_nom_value.monetaryValue}}. The sum of your {{period_name2.uiValue}} savings will be {{sum_savings.monetaryValue}}.
                                TXT],
                                ['when' => 'Infl != 0 and InDep != 0', 'text' => <<<'TXT'
                                The final nominal value (without inflation adjustment) of your savings will be {{final_nom_value.monetaryValue}}. The sum of your {{period_name2.uiValue}} savings with the initial balance will be {{sum_savings_plus_initial.monetaryValue}}.
                                TXT],
                                ['when' => 'Infl != 0 and real_return >= 0', 'text' => 'You will gain a {{total_return.monetaryValue}} return in nominal terms, which is {{real_return.monetaryValue}} in real, inflation-adjusted terms.'],
                                ['when' => 'Infl != 0 and real_return < 0', 'text' => <<<'TXT'
                                You will gain {{total_return.monetaryValue}} in nominal terms, which does not cover the purchasing power loss caused by inflation. It means that if you take inflation into account, you have lost {{real_return_abs.monetaryValue}}.
                                TXT],
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
                            'name' => 'VarTime',
                            'label' => 'Var time',
                            'type' => 'number',
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
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                        ],
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
                            'name' => 'period_name',
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
                            'name' => 'period_name2',
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
                            'name' => 'payment_per_period',
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
                            'name' => 'sum_savings',
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
                            'name' => 'total_return',
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
                            'name' => 'sum_savings_plus_initial',
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
                            'name' => 'final_nom_value',
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
                            'name' => 'real_return',
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
                            'name' => 'real_return_abs',
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
            'title' => 'g + 1 = (1 + g_p) ^ q',
            'results' => ['g' => 'pow(g_p + 1, q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)', 'g_p' => 'pow(g + 1, 1/q) - 1'],
        ],
        [
            'title' => 'return_status = run_calculator(FinBal, Timing, t, EndDate, AgeStart, AgeEnd, InDep, r, CompFreq, Infl, q, first_day, Type, g, g_p)',
            'results' => ['return_status' => 'run_calculator(FinBal, Timing, t, EndDate, AgeStart, AgeEnd, InDep, r, CompFreq, Infl, q, first_day, Type, g, g_p)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var millisecondsInADay=24*60*60*1000,ex=mathjs.e;var payment_per_period,sum_savings,total_return,final_nom_value,real_return;omni.define("run_calculator",function(FinBal,VarTime,t,EndDate,AgeStart,AgeEnd,InDep,r,m,Infl,q,first_day,VarType,g,g_p){var FirstDate=new Date(first_day*millisecondsInADay);var dayDiff=getDaysInMonth(FirstDate);first_day=first_day-dayDiff;var dayInTerm=0;var k;var periods=0;if(q===1){k=365}else if(q===2){k=365/2}else if(q===4){k=365/4}else if(q===12){k=365/12}else if(q===52){k=365/52}else if(q===365){k=1}if(EndDate>first_day){dayInTerm=mathjs.floor(EndDate-first_day-dayDiff)}else{dayInTerm=0}if(VarTime===1){periods=Math.ceil(q*t)}if(VarTime===2){periods=Math.ceil(dayInTerm/k)}if(VarTime===3){periods=(AgeEnd-AgeStart)*q}if(periods<1){return}var cont_r=0;var base=0;var power=0;var eq=0;var eq_p=0;var PerDep=0;var DepBal=0;var DepPrincBal=0;var DepIntBal=0;var iDep=0;var InBal=0;var InIntBal=0;var TotPrincBal=0;var TotIntBal=0;var TotBal=0;var FinBalReal=0;if(m===0){cont_r=mathjs.pow(ex,r)-1;m=1;base=1+cont_r/m}else{base=1+r/m}power=m/q;eq=q*(mathjs.pow(base,power)-1);eq_p=eq/q;FinBalReal=FinBal*mathjs.pow(1+Infl,t);InBal=InDep*mathjs.pow(1+eq_p,periods);DepBal=FinBalReal-InBal;if(g!==eq_p&&q!==1){PerDep=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}if(g!==eq_p&&q===1){PerDep=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}if(g===eq_p){PerDep=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}if(PerDep<=0){PerDep=0;periods=Math.ceil(Math.log(eq_p*FinBalReal/(eq_p*InDep))/Math.log(eq_p+1))}for(var i=0;i<=periods;i++){if(i>0){if(i===1){iDep=PerDep}else{iDep=PerDep*mathjs.pow(1+g_p,i-1)}DepPrincBal+=iDep;InBal=InDep*mathjs.pow(1+eq_p,i);InIntBal=InBal-InDep;if(g!==eq_p&&q!==1){DepBal=PerDep*(mathjs.pow(1+eq_p,i)-mathjs.pow(1+g_p,i))*(1+eq_p*VarType)/(eq_p-g_p)}if(g!==eq_p&&q===1){DepBal=PerDep*(mathjs.pow(1+eq_p,i)-mathjs.pow(1+g,i))*(1+eq_p*VarType)/(eq_p-g)}if(g===eq_p){DepBal=PerDep*i*mathjs.pow(1+eq_p,i-1)*(1+eq_p*VarType)}DepIntBal=DepBal-DepPrincBal;TotPrincBal=InDep+DepPrincBal;TotIntBal=InIntBal+DepIntBal;TotBal=TotPrincBal+TotIntBal;if(TotBal>FinBalReal){TotBal=FinBal}if(TotBal===FinBalReal){TotIntBal=TotBal-TotPrincBal}}}payment_per_period=PerDep;sum_savings=DepPrincBal;total_return=TotIntBal;final_nom_value=TotBal;real_return=FinBal-TotPrincBal;return 1});omni.define("get_payment_per_period",function(){return payment_per_period});omni.define("get_sum_savings",function(){return sum_savings});omni.define("get_total_return",function(){return total_return});omni.define("get_final_nom_value",function(){return final_nom_value});omni.define("get_real_return",function(){return real_return});function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Savings goal turns Your goal, I would like to reach it… and Time to reach your goal into Period name and Period name 2. There is no hidden constant here: change period name and your goal moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Savings goal calculator works', 'html' => <<<'TXT'
            <p>Savings goal answers one question from 20 numbers, and the answer is Period name and Period name 2.</p><p>The relationship it solves reads Annual growth rate = (Periodic growth rate + 1)^(How often?) − 1.</p><p>What comes back is Period name and Period name 2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 20 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your goal</strong> — in USD</li><li><strong>I would like to reach it…</strong> — a plain number, no unit</li><li><strong>Time to reach your goal</strong> — in years / months</li><li><strong>Date to reach your goal</strong> — a plain number, no unit, entered as a date. Note that if the number of periods between the day you start saving and the date of your goal is fractional, the number of periods is rounded up.</li><li><strong>Your age now</strong> — in years. For the sake of simplicity, we suppose that your birthday is today.</li><li><strong>Your target age</strong> — in years</li><li><strong>Your starting savings</strong> — in USD. Use this field if you already have some savings.</li><li><strong>Interest rate or return</strong> — in percent. Annual nominal interest rate or annual rate of return.</li><li><strong>Compounding method</strong> — a plain number, no unit. The frequency interest is added to the principal balance of your savings, or, in other words, how often the earned return or interest is reinvested.&amp;nbsp;</li><li><strong>Inflation rate</strong> — in percent. The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures.</li><li><strong>How often?</strong> — a plain number, no unit</li><li><strong>From which day?</strong> — a plain number, no unit, entered as a date</li><li><strong>When?</strong> — a plain number, no unit</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic contribution over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of your periodic contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.</li><li><strong>Var time</strong> — a plain number, no unit</li><li><strong>Var type</strong> — a plain number, no unit</li><li><strong>Var rep</strong> — a plain number, no unit</li><li><strong>Display</strong> — a plain number, no unit</li><li><strong>Return status</strong> — a plain number, no unit</li></ul><p>The answers come back as Period name, Period name 2. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Your goal = 1.000e+6 USD, I would like to reach it… = 3, Time to reach your goal = 480 yrsmos, Your age now = 32 years, Your target age = 65 years, Your starting savings = 7 USD, Interest rate or return = 4 perc, Compounding method = 12, Inflation rate = 9 perc, When? = 0, Var time = 10, Var type = 2, Var rep = 3, Display = 4, Date to reach your goal = Sun 1 March 2026 and From which day? = Sun 1 March 2026; the answers are <strong>How often?</strong> = 12.</p><ul><li><strong>How often?</strong> = 12</li></ul><p>That is <strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>How often?</strong> = 12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Time to reach your goal offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code></li><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code> — the form to use when Periodic growth rate and How often? are the values you have.</li><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual growth rate and How often? are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annual growth rate, How often? and Periodic growth rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your goal from 1.000e+6 to 2.000e+6, leaving every other box alone. The panel moves from <strong>How often?</strong> 12 to <strong>How often?</strong> 12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Time to reach your goal, Interest rate or return and Inflation rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Period name and Period name 2 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your goal left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your goal is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>I would like to reach it… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I would like to reach it… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your goal is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Your goal, I would like to reach it…, Time to reach your goal and Date to reach your goal. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Your goal into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Period name with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Period name is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Your goal, I would like to reach it… and Time to reach your goal and the number you are missing is Period name and Period name 2.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/time-value-of-money">Time value of money</a>, <a href="/finance/times-interest-earned-ratio">Times interest earned ratio</a> and <a href="/finance/total-asset-turnover">Total asset turnover Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Savings goal calculator work out?', 'a' => 'Period name and Period name 2, from Periodic growth rate and How often?. The relationship is Annual growth rate = (Periodic growth rate + 1)^(How often?) − 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your goal (USD), I would like to reach it…, Time to reach your goal (years / months), Date to reach your goal, Your age now (years). Enter your goal, i would like to reach it… and time to reach your goal; Period name is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annual growth rate, How often?, Periodic growth rate and Return status can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'How often? = 12. Those are the defaults written into the form — move Your goal and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Period name is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your goal left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Period name keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/time-value-of-money', 'name' => 'Time value of money'],
            ['path' => '/finance/times-interest-earned-ratio', 'name' => 'Times interest earned ratio'],
            ['path' => '/finance/total-asset-turnover', 'name' => 'Total asset turnover Calculator'],
        ],
        'authors' => [],
    ],
];
