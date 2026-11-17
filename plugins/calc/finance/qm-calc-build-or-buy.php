<?php

/**
 * Build vs. Buy
 * /finance/build-or-buy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Build vs. Buy',
    'meta' => ['title' => 'Build vs. Buy Calculator — Formula & Results', 'description' => 'Build vs. Buy turns cost and employees required into effective cost per employee. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Build vs. Buy Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Buying an external service',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_cost',
                            'label' => 'Cost',
                            'type' => 'number',
                            'help' => 'Cost per year',
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
            'title' => 'Building your own software',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_employees',
                            'label' => 'Employees required',
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
                            'name' => 'time_to_build',
                            'label' => 'Time to build',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employee_gross_salary',
                            'label' => 'Employee salary (gross)',
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
                            'name' => 'overhead',
                            'label' => 'Overhead',
                            'type' => 'number',
                            'help' => 'Additional costs of an employee.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employee_cost',
                            'label' => 'Effective cost per employee',
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
                            'name' => 'days_maintenance',
                            'label' => 'Days of maintentance',
                            'type' => 'number',
                            'help' => 'How many days per time period will one employee spend on product maintenance?',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_to_build',
                            'label' => 'Cost to build',
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
                            'name' => 'annual_maintenance',
                            'label' => 'Annual maintenance',
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
            'title' => 'Build or buy?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_savings',
                            'label' => 'Annual savings',
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
                            'name' => 'years_to_profit',
                            'label' => 'Years to profit',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'annual_savings <= 0', 'text' => 'Buy the tool as an external service — it will never pay off to build it!&nbsp;'],
                                ['when' => 'years_to_profit <= 3', 'text' => 'Building the tool will pay off in {{years_to_profit.formattedValue}} years — it is a good idea to build it!&nbsp;'],
                                ['when' => 'years_to_profit <= 5 and years_to_profit > 3', 'text' => 'Building the tool will pay off in {{years_to_profit.formattedValue}} years — there is a small chance of saving some money in the long run.&nbsp;'],
                                ['when' => 'years_to_profit > 5', 'text' => 'You should buy the tool as an external service — it will (most probably) never pay off to build it!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'time_to_build * employee_cost * num_employees = cost_to_build',
            'results' => ['time_to_build' => 'cost_to_build/(employee_cost*num_employees)', 'cost_to_build' => 'employee_cost*num_employees*time_to_build', 'num_employees' => 'cost_to_build/(employee_cost*time_to_build)', 'employee_cost' => 'cost_to_build/(num_employees*time_to_build)'],
        ],
        [
            'title' => 'annual_maintenance = days_maintenance * employee_cost *12 /5',
            'results' => ['days_maintenance' => '(5/12)*annual_maintenance/employee_cost', 'annual_maintenance' => '(12/5)*days_maintenance*employee_cost', 'employee_cost' => '(5/12)*annual_maintenance/days_maintenance'],
        ],
        [
            'title' => 'annual_savings = annual_cost - annual_maintenance',
            'results' => ['annual_maintenance' => 'annual_cost - annual_savings', 'annual_cost' => 'annual_maintenance + annual_savings', 'annual_savings' => 'annual_cost - annual_maintenance'],
        ],
        [
            'title' => 'years_to_profit = get_yrs(cost_to_build, annual_savings )',
            'results' => ['years_to_profit' => 'get_yrs(cost_to_build, annual_savings)'],
        ],
        [
            'title' => 'employee_cost  = employee_gross_salary * (1+overhead)',
            'results' => ['employee_gross_salary' => 'employee_cost/(overhead + 1)', 'overhead' => '(employee_cost - employee_gross_salary)/employee_gross_salary', 'employee_cost' => 'employee_gross_salary*(overhead + 1)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_yrs",function(cost_to_build,annual_savings){if(annual_savings<=0){return NaN}else{return cost_to_build/annual_savings}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Build vs. Buy works out Cost and Employees required from Effective cost per employee and Days of maintentance. Nothing is looked up on this page: cost is computed from effective cost per employee and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Build vs. Buy calculator works', 'html' => <<<'TXT'
            <p>The Build vs. Buy calculator applies one relationship to 2 numbers and reports Cost, Employees required and Time to build.</p><p>Written with the labels from the form, Time to build = Cost to build ÷ (Effective cost per employee × Employees required).</p><p>The result panel carries Cost, Employees required, Time to build and Employee salary (gross), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Effective cost per employee</strong> — in USD</li><li><strong>Days of maintentance</strong> — in months. How many days per time period will one employee spend on product maintenance?</li></ul><p>What you get back is Cost in USD, Employees required, Time to build in weeks, Employee salary (gross) in USD, Overhead in percent, Cost to build in USD, Annual maintenance in USD, Annual savings in USD, Years to profit in years, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cost = 10 USD, Employees required = 1, Time to build = 1000 wk, Employee salary (gross) = 10 USD, Overhead = 25 perc, Days of maintentance = 1 mos, Cost to build = 10 USD, Annual maintenance = 100 USD, Annual savings = 1000 USD and Years to profit = 10 yrs gives <strong>Effective cost per employee</strong> = 0.01 USD.</p><ul><li><strong>Effective cost per employee</strong> = 0.01 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Time to build</strong> = <code>Cost to build ÷ (Effective cost per employee × Employees required)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Effective cost per employee</strong> = 0.01. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Time to build lists 5 options and opens on weeks. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time to build</strong> = <code>Cost to build ÷ (Effective cost per employee × Employees required)</code></li><li><strong>Cost to build</strong> = <code>Effective cost per employee × Employees required × Time to build</code></li><li><strong>Employees required</strong> = <code>Cost to build ÷ (Effective cost per employee × Time to build)</code></li><li><strong>Effective cost per employee</strong> = <code>Cost to build ÷ (Employees required × Time to build)</code></li><li><strong>Annual maintenance</strong> = <code>(12 ÷ 5) × Days of maintentance × Effective cost per employee</code></li><li><strong>Days of maintentance</strong> = <code>(5 ÷ 12) × Annual maintenance ÷ Effective cost per employee</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Time to build</strong> = <code>Cost to build ÷ (Effective cost per employee × Employees required)</code> — the form to use when Cost to build, Effective cost per employee and Employees required are the values you have.</li><li><strong>Cost to build</strong> = <code>Effective cost per employee × Employees required × Time to build</code> — the form to use when Effective cost per employee, Employees required and Time to build are the values you have.</li><li><strong>Employees required</strong> = <code>Cost to build ÷ (Effective cost per employee × Time to build)</code> — the form to use when Cost to build, Effective cost per employee and Time to build are the values you have.</li><li><strong>Effective cost per employee</strong> = <code>Cost to build ÷ (Employees required × Time to build)</code> — the form to use when Cost to build, Employees required and Time to build are the values you have.</li><li><strong>Annual maintenance</strong> = <code>(12 ÷ 5) × Days of maintentance × Effective cost per employee</code> — the form to use when Days of maintentance and Effective cost per employee are the values you have.</li><li><strong>Days of maintentance</strong> = <code>(5 ÷ 12) × Annual maintenance ÷ Effective cost per employee</code> — the form to use when Annual maintenance and Effective cost per employee are the values you have.</li><li><strong>Effective cost per employee</strong> = <code>(5 ÷ 12) × Annual maintenance ÷ Days of maintentance</code> — the form to use when Annual maintenance and Days of maintentance are the values you have.</li><li><strong>Annual savings</strong> = <code>Cost − Annual maintenance</code> — the form to use when Cost and Annual maintenance are the values you have.</li></ul><p>Any one of Time to build, Cost to build and Employees required can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost, from 10 to 20 — and the answers go from <strong>Effective cost per employee</strong> 0.01 USD to <strong>Effective cost per employee</strong> 0.01 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Days of maintentance carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Cost, Employees required and Time to build are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Effective cost per employee left as a guess.</strong> Anything typed into Effective cost per employee is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Days of maintentance left as a guess.</strong> Anything typed into Days of maintentance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Effective cost per employee is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Build vs. Buy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Effective cost per employee</strong> takes a plain number with no unit attached. Change it and Time to build, Cost to build and Employees required changes with it. Fill it from a measurement rather than a memory — Effective cost per employee is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Days of maintentance</strong> is a months quantity: the page opens it in mos and converts anything else you pick before the formula runs. How many days per time period will one employee spend on product maintenance?. Change it and Annual maintenance and Effective cost per employee changes with it. Fill it from a measurement rather than a memory — Days of maintentance is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cost</strong> is a plain number. The value follows from Annual maintenance and Annual savings. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Employees required</strong> is a plain number. The value follows from Cost to build, Effective cost per employee and Time to build. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Time to build</strong> is a weeks figure. The value follows from Cost to build, Effective cost per employee and Employees required. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Employee salary (gross)</strong> is a plain number. The value follows from Effective cost per employee and Overhead. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Overhead</strong> is a percent figure. The value follows from Effective cost per employee and Employee salary (gross). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cost to build</strong> is a plain number. The value follows from Effective cost per employee, Employees required and Time to build. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual maintenance</strong> is a plain number. The value follows from Days of maintentance and Effective cost per employee. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual savings</strong> is a plain number. The value follows from Cost and Annual maintenance. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Years to profit</strong> is a years figure. The value follows from Cost to build and Annual savings. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cost is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are weeks and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Effective cost per employee and Days of maintentance are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Effective cost per employee and Days of maintentance and the number you are missing is Cost and Employees required.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/post-judgment-interest">Post judgment interest Calculator</a>, <a href="/finance/post-office-monthly-income-scheme">Post Office Monthly Income Scheme</a> and <a href="/finance/powerball">Powerball</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Build vs. Buy calculator work out?', 'a' => <<<'TXT'
            Cost, Employees required, Time to build and Employee salary (gross), from Cost to build, Effective cost per employee and Employees required. The relationship is Time to build = Cost to build ÷ (Effective cost per employee × Employees required).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Effective cost per employee (USD), Days of maintentance (months). Fill effective cost per employee and days of maintentance and leave Cost empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Time to build, Cost to build, Employees required and Effective cost per employee blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Effective cost per employee = 0.01 USD. That comes from the page's own defaults, entered in Effective cost per employee; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cost is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Effective cost per employee blank and the page solves for it, reporting Cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cost keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/post-judgment-interest', 'name' => 'Post judgment interest Calculator'],
            ['path' => '/finance/post-office-monthly-income-scheme', 'name' => 'Post Office Monthly Income Scheme'],
            ['path' => '/finance/powerball', 'name' => 'Powerball'],
        ],
        'authors' => [],
    ],
];
