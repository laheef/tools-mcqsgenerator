<?php

/**
 * EPF
 * /finance/epf
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EPF',
    'meta' => ['title' => 'EPF Calculator — Free, With Worked Examples', 'description' => 'EPF turns basic pay, dearness allowance and employee contribution percent into employee contribution and employer contribution. Any box can be the unknown.', 'h1' => 'EPF Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'basic_pay',
                            'label' => 'Basic pay',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.01'],
                            'default' => '15000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dearness_allowance',
                            'label' => 'Dearness allowance',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employee_percent',
                            'label' => 'Employee contribution percent',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employee_contribution',
                            'label' => 'Employee contribution',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_contribution',
                            'label' => 'Employer contribution',
                            'type' => 'number',
                            'help' => '3.67% of (Basic + DA) and excess of EPS contribution in case (Basic + DA) is more than ₹15000.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'present_age',
                            'label' => 'Present age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement_age',
                            'label' => 'Retirement age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Maximum retirement age to qualify for full EPF withdrawal is 58 years. However, you can withdraw 90% of your EPF corpus on reaching the age of 57 years.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '58',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'epf_interest_rate',
                            'label' => 'EPF interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salary_raise_rate',
                            'label' => 'Expected salary hike rate',
                            'type' => 'number',
                            'help' => 'Expected rate of increase in salary per year.',
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
                            'name' => 'current_balance',
                            'label' => 'Current EPF balance',
                            'type' => 'number',
                            'suffix' => '₹ ',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_employee_contribution',
                            'label' => 'Total employee contribution',
                            'type' => 'number',
                            'suffix' => '₹ ',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_employer_contribution',
                            'label' => 'Total employer contribution',
                            'type' => 'number',
                            'suffix' => '₹ ',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'epf_amt',
                            'label' => 'EPF maturity amount',
                            'type' => 'number',
                            'suffix' => '₹ ',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_percent',
                            'label' => 'Employer contribution percent',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.67',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_contribution_main',
                            'label' => 'Employer contribution main',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_contribution_eps_excess',
                            'label' => 'Employer contribution eps excess',
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
            'title' => 'employee_contribution = copy_function(employee_percent * (basic_pay + dearness_allowance) / 100)',
            'results' => ['employee_contribution' => 'copy_function((1/100)*employee_percent*(basic_pay + dearness_allowance))'],
        ],
        [
            'title' => <<<'TXT'
            employer_contribution =  moreThanZeroCondition(basic_pay + dearness_allowance - 15000, employer_contribution_main + employer_contribution_eps_excess, employer_contribution_main)
            TXT,
            'results' => ['employer_contribution' => <<<'TXT'
            moreThanZeroCondition(basic_pay + dearness_allowance - 15000, copy_function((1/100)*employer_percent*(basic_pay + dearness_allowance)) + copy_function((833/10000)*basic_pay + (833/10000)*dearness_allowance - 2499/2), copy_function((1/100)*employer_percent*(basic_pay + dearness_allowance)))
            TXT],
        ],
        [
            'title' => 'employer_contribution_main = copy_function(employer_percent * (basic_pay + dearness_allowance) / 100)',
            'results' => ['employer_contribution_main' => 'copy_function((1/100)*employer_percent*(basic_pay + dearness_allowance))'],
        ],
        [
            'title' => 'employer_contribution_eps_excess = copy_function(8.33 * (basic_pay + dearness_allowance - 15000) / 100)',
            'results' => ['employer_contribution_eps_excess' => 'copy_function((833/10000)*basic_pay + (833/10000)*dearness_allowance - 2499/2)'],
        ],
        [
            'title' => <<<'TXT'
            epf_amt =get_epf(basic_pay, dearness_allowance, employee_percent, employer_percent, present_age, retirement_age, current_balance, salary_raise_rate, epf_interest_rate)
            TXT,
            'results' => ['epf_amt' => 'get_epf(basic_pay, dearness_allowance, employee_percent, employer_percent, present_age, retirement_age, current_balance, salary_raise_rate, epf_interest_rate)'],
        ],
        [
            'title' => <<<'TXT'
            total_employee_contribution = total_employee_cont(basic_pay, dearness_allowance, employee_percent, present_age, retirement_age, current_balance, salary_raise_rate)
            TXT,
            'results' => ['total_employee_contribution' => 'total_employee_cont(basic_pay, dearness_allowance, employee_percent, present_age, retirement_age, current_balance, salary_raise_rate)'],
        ],
        [
            'title' => <<<'TXT'
            total_employer_contribution = total_employer_cont(basic_pay, dearness_allowance, employer_percent, present_age, retirement_age, current_balance, salary_raise_rate)
            TXT,
            'results' => ['total_employer_contribution' => 'total_employer_cont(basic_pay, dearness_allowance, employer_percent, present_age, retirement_age, current_balance, salary_raise_rate)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("copy_function",function(value_to_copy){return value_to_copy.toFixed(2)});omni.define("get_epf",function(basic_pay,dearness_allowance,employee_percentage,employer_percentage,present_age,retirement_age,balance,salary_raise_rate,epf_interest_rate){var current_balance=[];current_balance[0]=balance;var employee_contribution=[],employer_contribution=[],total_contribution=[];var epf=[];for(var i=0;i<=retirement_age-present_age;i++){employee_contribution[i]=12*(employee_percentage/100)*(basic_pay+dearness_allowance)*Math.pow(1+salary_raise_rate/100,i);employer_contribution[i]=12*(employer_percentage/100)*(basic_pay+dearness_allowance)*Math.pow(1+salary_raise_rate/100,i);if(basic_pay+dearness_allowance>15000){employer_contribution[i]+=8.33*(basic_pay+dearness_allowance)/100-1249.5}if(i>0){current_balance[i]=epf[i-1]}epf[i]=(current_balance[i]+employee_contribution[i]+employer_contribution[i])*(1+epf_interest_rate/100)}return epf[retirement_age-present_age]});omni.define("moreThanZeroCondition",function(conditionValue,value1,value2){return conditionValue>0?value1:value2});omni.define("total_employee_cont",function(basic_pay,dearness_allowance,employee_percentage,present_age,retirement_age,balance,salary_raise_rate){var current_balance=[];current_balance[0]=balance;var employee_contribution=[];var total_employee_contribution=[];for(var i=0;i<=retirement_age-present_age;i++){employee_contribution[i]=12*(employee_percentage/100)*(basic_pay+dearness_allowance)*Math.pow(1+salary_raise_rate/100,i);total_employee_contribution[i]=employee_contribution[i];if(i>0){total_employee_contribution[i]+=total_employee_contribution[i-1]}}return total_employee_contribution[retirement_age-present_age]});omni.define("total_employer_cont",function(basic_pay,dearness_allowance,employer_percentage,present_age,retirement_age,balance,salary_raise_rate){var current_balance=[];current_balance[0]=balance;var employer_contribution=[],total_employer_contribution=[];for(var i=0;i<=retirement_age-present_age;i++){employer_contribution[i]=12*(employer_percentage/100)*(basic_pay+dearness_allowance)*Math.pow(1+salary_raise_rate/100,i);total_employer_contribution[i]=employer_contribution[i];if(i>0){total_employer_contribution[i]+=total_employer_contribution[i-1]}}return total_employer_contribution[retirement_age-present_age]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        EPF takes Basic pay, Dearness allowance and Employee contribution percent and returns Employee contribution and Employer contribution. It is a single relationship that reads employee contribution out of basic pay, not a table of canned results keyed by them. Units for Employee contribution default to months and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the EPF calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind EPF: it takes 3 numbers and reports Employee contribution, Employer contribution and Total employee contribution.</p><p>Written with the labels from the form, Employee contribution = copy_function((1 ÷ 100) × Employee contribution percent × (Basic pay + Dearness allowance)).</p><p>The answers are Employee contribution, Employer contribution, Total employee contribution and Total employer contribution; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Basic pay</strong> — in months</li><li><strong>Dearness allowance</strong> — in months</li><li><strong>Employee contribution percent</strong> — in percent</li></ul><p>The result boxes are Employee contribution in months, Employer contribution in months, Total employee contribution in ₹, Total employer contribution in ₹, EPF maturity amount in ₹, Employer contribution main, Employer contribution eps excess; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Basic pay = 15000 mos, Dearness allowance = 4 mos, Employee contribution percent = 12 perc, Present age = 25 years, Retirement age = 58 years, EPF interest rate = 8.5 perc, Expected salary hike rate = 5 perc and Current EPF balance = 10 ₹ — through the same formula and the panel reports <strong>Employer contribution percent</strong> = 0.0367.</p><ul><li><strong>Employer contribution percent</strong> = 0.0367</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Employee contribution</strong> = <code>copy_function((1 ÷ 100) × Employee contribution percent × (Basic pay + Dearness allowance))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Employer contribution percent</strong> = 0.0367 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Employee contribution offers 5 units and opens on months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Employee contribution</strong> = <code>copy_function((1 ÷ 100) × Employee contribution percent × (Basic pay + Dearness allowance))</code></li><li><strong>Employer contribution main</strong> = <code>copy_function((1 ÷ 100) × Employer contribution percent × (Basic pay + Dearness allowance))</code></li><li><strong>Employer contribution eps excess</strong> = <code>copy_function((833 ÷ 10000) × Basic pay + (833 ÷ 10000) × Dearness allowance − 2499 ÷ 2)</code></li><li><strong>EPF maturity amount</strong> = <code>get_epf(Basic pay, Dearness allowance, Employee contribution percent, Employer contribution percent, Present age, Retirement age, Current EPF balance, Expected salary hike rate, EPF interest rate)</code></li><li><strong>Total employee contribution</strong> = <code>total_employee_cont(Basic pay, Dearness allowance, Employee contribution percent, Present age, Retirement age, Current EPF balance, Expected salary hike rate)</code></li><li><strong>Total employer contribution</strong> = <code>total_employer_cont(Basic pay, Dearness allowance, Employer contribution percent, Present age, Retirement age, Current EPF balance, Expected salary hike rate)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Employee contribution</strong> = <code>copy_function((1 ÷ 100) × Employee contribution percent × (Basic pay + Dearness allowance))</code> — the form to use when Employee contribution percent, Basic pay and Dearness allowance are the values you have.</li><li><strong>Employer contribution main</strong> = <code>copy_function((1 ÷ 100) × Employer contribution percent × (Basic pay + Dearness allowance))</code> — the form to use when Employer contribution percent, Basic pay and Dearness allowance are the values you have.</li><li><strong>Employer contribution eps excess</strong> = <code>copy_function((833 ÷ 10000) × Basic pay + (833 ÷ 10000) × Dearness allowance − 2499 ÷ 2)</code> — the form to use when Basic pay and Dearness allowance are the values you have.</li><li><strong>EPF maturity amount</strong> = <code>get_epf(Basic pay, Dearness allowance, Employee contribution percent, Employer contribution percent, Present age, Retirement age, Current EPF balance, Expected salary hike rate, EPF interest rate)</code> — the form to use when Basic pay, Dearness allowance, Employee contribution percent and Employer contribution percent are the values you have.</li><li><strong>Total employee contribution</strong> = <code>total_employee_cont(Basic pay, Dearness allowance, Employee contribution percent, Present age, Retirement age, Current EPF balance, Expected salary hike rate)</code> — the form to use when Basic pay, Dearness allowance, Employee contribution percent and Present age are the values you have.</li><li><strong>Total employer contribution</strong> = <code>total_employer_cont(Basic pay, Dearness allowance, Employer contribution percent, Present age, Retirement age, Current EPF balance, Expected salary hike rate)</code> — the form to use when Basic pay, Dearness allowance, Employer contribution percent and Present age are the values you have.</li></ul><p>Any one of Employee contribution, Employer contribution and Employer contribution main can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Basic pay from 15000 to 30000, leaving every other box alone. The panel moves from <strong>Employer contribution percent</strong> 0.0367 to <strong>Employer contribution percent</strong> 0.0367.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Basic pay, Dearness allowance and Employee contribution percent is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Employee contribution, Employer contribution and Total employee contribution are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Basic pay left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Basic pay is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dearness allowance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dearness allowance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Basic pay to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the EPF form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Basic pay</strong> is a months quantity: the page opens it in mos and converts anything else you pick before the formula runs. It feeds Employee contribution, Employer contribution and Employer contribution main. Fill it from a measurement rather than a memory — Basic pay is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dearness allowance</strong> is a months quantity: the page opens it in mos and converts anything else you pick before the formula runs. It feeds Employee contribution, Employer contribution and Employer contribution main. Fill it from a measurement rather than a memory — Dearness allowance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Employee contribution percent</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Employee contribution, EPF maturity amount and Total employee contribution. Fill it from a measurement rather than a memory — Employee contribution percent is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Basic pay, Dearness allowance and Employee contribution percent ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Basic pay — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Employee contribution in mos against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Employee contribution follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Basic pay, Dearness allowance and Employee contribution percent measured, Employee contribution and Employer contribution wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/roe">Return on equity (ROE) Calculator</a>, <a href="/finance/roic">Return on invested capital (ROIC) Calculator</a> and <a href="/finance/ros">Return on sales (ROS)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EPF calculator work out?', 'a' => <<<'TXT'
            Employee contribution, Employer contribution, Total employee contribution and Total employer contribution, from Employee contribution percent, Basic pay and Dearness allowance. The relationship is Employee contribution = copy_function((1 ÷ 100) × Employee contribution percent × (Basic pay + Dearness allowance)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Basic pay (months), Dearness allowance (months), Employee contribution percent (percent). Enter basic pay, dearness allowance and employee contribution percent; Employee contribution is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Employee contribution, Employer contribution, Employer contribution main and Employer contribution eps excess blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Employer contribution percent = 0.0367. That comes from the page\'s own defaults, entered in Basic pay; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Employee contribution is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Basic pay blank and the page solves for it, reporting Employee contribution instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Employee contribution keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/roe', 'name' => 'Return on equity (ROE) Calculator'],
            ['path' => '/finance/roic', 'name' => 'Return on invested capital (ROIC) Calculator'],
            ['path' => '/finance/ros', 'name' => 'Return on sales (ROS)'],
        ],
        'authors' => [],
    ],
];
