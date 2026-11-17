<?php

/**
 * Labor cost
 * /finance/labor-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Labor cost',
    'meta' => ['title' => 'Labor cost Calculator: Formula, Steps & Examples', 'description' => 'Labor cost turns gross hours per week and Pay Rate into gross hours per year. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Labor cost Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Gross pay',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'HoursPerWeek',
                            'label' => 'Gross hours per week',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'GrossHours',
                            'label' => 'Gross hours per year',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayRate',
                            'label' => 'Pay Rate',
                            'type' => 'number',
                            'suffix' => '/hours',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'GrossPay',
                            'label' => 'Gross pay',
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
            'title' => 'Net hours worked',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AbsentDaysYear',
                            'label' => 'Absent days per year',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'HoursNotWorked',
                            'label' => 'Hours not worked per year',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NetHoursWorked',
                            'label' => 'Net hours worked',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional annual costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Taxes',
                            'label' => 'Taxes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '900',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Insurance',
                            'label' => 'Insurance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '600',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Benefits',
                            'label' => 'Benefits',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Overtime',
                            'label' => 'Overtime',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '800',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Supplies',
                            'label' => 'Supplies',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '400',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'OtherAnnualCosts',
                            'label' => 'Other annual costs',
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
            'title' => 'Main results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AnnualPayrolLaborCost',
                            'label' => 'Annual payroll labor cost',
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
                            'name' => 'HourlyLaborCost',
                            'label' => 'Hourly labor cost',
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
            'title' => 'Labor cost percentage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalRevenue',
                            'label' => 'Total revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '80000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LaborCostPercentage',
                            'label' => 'Labor cost percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'GrossPay = PayRate * GrossHours',
            'results' => ['GrossHours' => 'GrossPay/PayRate', 'GrossPay' => 'GrossHours*PayRate', 'PayRate' => 'GrossPay/GrossHours'],
        ],
        [
            'title' => 'NetHoursWorked = GrossHours - HoursNotWorked',
            'results' => ['HoursNotWorked' => 'GrossHours - NetHoursWorked', 'NetHoursWorked' => 'GrossHours - HoursNotWorked', 'GrossHours' => 'HoursNotWorked + NetHoursWorked'],
        ],
        [
            'title' => 'OtherAnnualCosts = Insurance + Taxes + Overtime + Benefits + Supplies',
            'results' => [
                'Taxes' => '-Benefits - Insurance + OtherAnnualCosts - Overtime - Supplies',
                'Benefits' => '-Insurance + OtherAnnualCosts - Overtime - Supplies - Taxes',
                'Supplies' => '-Benefits - Insurance + OtherAnnualCosts - Overtime - Taxes',
                'OtherAnnualCosts' => 'Benefits + Insurance + Overtime + Supplies + Taxes',
                'Overtime' => '-Benefits - Insurance + OtherAnnualCosts - Supplies - Taxes',
                'Insurance' => '-Benefits + OtherAnnualCosts - Overtime - Supplies - Taxes',
            ],
        ],
        [
            'title' => 'AnnualPayrolLaborCost = GrossPay + OtherAnnualCosts ',
            'results' => ['GrossPay' => 'AnnualPayrolLaborCost - OtherAnnualCosts', 'AnnualPayrolLaborCost' => 'GrossPay + OtherAnnualCosts', 'OtherAnnualCosts' => 'AnnualPayrolLaborCost - GrossPay'],
        ],
        [
            'title' => 'HourlyLaborCost = AnnualPayrolLaborCost / NetHoursWorked ',
            'results' => ['NetHoursWorked' => 'AnnualPayrolLaborCost/HourlyLaborCost', 'HourlyLaborCost' => 'AnnualPayrolLaborCost/NetHoursWorked', 'AnnualPayrolLaborCost' => 'HourlyLaborCost*NetHoursWorked'],
        ],
        [
            'title' => 'GrossHours = HoursPerWeek * 52',
            'results' => ['GrossHours' => '52*HoursPerWeek', 'HoursPerWeek' => '(1/52)*GrossHours'],
        ],
        [
            'title' => 'HoursNotWorked = AbsentDaysYear * HoursPerWeek/5',
            'results' => ['AbsentDaysYear' => '5*HoursNotWorked/HoursPerWeek', 'HoursNotWorked' => '(1/5)*AbsentDaysYear*HoursPerWeek', 'HoursPerWeek' => '5*HoursNotWorked/AbsentDaysYear'],
        ],
        [
            'title' => 'LaborCostPercentage = AnnualPayrolLaborCost / TotalRevenue',
            'results' => ['LaborCostPercentage' => 'AnnualPayrolLaborCost/TotalRevenue', 'AnnualPayrolLaborCost' => 'LaborCostPercentage*TotalRevenue', 'TotalRevenue' => 'AnnualPayrolLaborCost/LaborCostPercentage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Labor cost turns Gross hours per year and Pay Rate into Gross hours per week and Gross pay. Nothing is looked up on this page: gross hours per week is computed from gross hours per year and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Gross hours per week is opened in hours; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Labor cost calculator works', 'html' => <<<'TXT'
            <p>The Labor cost calculator applies one relationship to 2 numbers and reports Gross hours per week, Gross pay and Absent days per year.</p><p>In the form&#039;s own words, Gross pay = Gross hours per year × Pay Rate.</p><p>The answers are Gross hours per week, Gross pay, Absent days per year and Hours not worked per year; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Gross hours per year</strong> — in hours</li><li><strong>Pay Rate</strong> — in /hours</li></ul><p>The result boxes are Gross hours per week in hours, Gross pay in USD, Absent days per year in days, Hours not worked per year in hours, Net hours worked in hours, Taxes in USD, Insurance in USD, Benefits in USD, Overtime in USD, Supplies in USD, Other annual costs in USD, Annual payroll labor cost in USD, Hourly labor cost in USD, Total revenue in USD, Labor cost percentage in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Gross hours per week = 40 hours, Pay Rate = 10 /hours, Gross pay = 1000 USD, Absent days per year = 15 days, Hours not worked per year = 100 hours, Net hours worked = 1000 hours, Taxes = 900 USD, Insurance = 600 USD, Benefits = 1200 USD, Overtime = 800 USD, Supplies = 400 USD, Other annual costs = 1000 USD, Annual payroll labor cost = 10 USD, Hourly labor cost = 100 USD, Total revenue = 80000 USD and Labor cost percentage = 10 perc — through the same formula and the panel reports <strong>Gross hours per year</strong> = 100 hours.</p><ul><li><strong>Gross hours per year</strong> = 100 hours</li></ul><p>That is <strong>Gross pay</strong> = <code>Gross hours per year × Pay Rate</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross hours per year</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Labor cost percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross pay</strong> = <code>Gross hours per year × Pay Rate</code></li><li><strong>Gross hours per year</strong> = <code>Gross pay ÷ Pay Rate</code></li><li><strong>Pay Rate</strong> = <code>Gross pay ÷ Gross hours per year</code></li><li><strong>Net hours worked</strong> = <code>Gross hours per year − Hours not worked per year</code></li><li><strong>Hours not worked per year</strong> = <code>Gross hours per year − Net hours worked</code></li><li><strong>Other annual costs</strong> = <code>Benefits + Insurance + Overtime + Supplies + Taxes</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross pay</strong> = <code>Gross hours per year × Pay Rate</code> — the form to use when Gross hours per year and Pay Rate are the values you have.</li><li><strong>Gross hours per year</strong> = <code>Gross pay ÷ Pay Rate</code> — the form to use when Gross pay and Pay Rate are the values you have.</li><li><strong>Pay Rate</strong> = <code>Gross pay ÷ Gross hours per year</code> — the form to use when Gross pay and Gross hours per year are the values you have.</li><li><strong>Net hours worked</strong> = <code>Gross hours per year − Hours not worked per year</code> — the form to use when Gross hours per year and Hours not worked per year are the values you have.</li><li><strong>Hours not worked per year</strong> = <code>Gross hours per year − Net hours worked</code> — the form to use when Gross hours per year and Net hours worked are the values you have.</li><li><strong>Gross hours per year</strong> = <code>Hours not worked per year + Net hours worked</code> — the form to use when Hours not worked per year and Net hours worked are the values you have.</li><li><strong>Other annual costs</strong> = <code>Benefits + Insurance + Overtime + Supplies + Taxes</code> — the form to use when Benefits, Insurance, Overtime and Supplies are the values you have.</li><li><strong>Taxes</strong> = <code>− Benefits − Insurance + Other annual costs − Overtime − Supplies</code> — the form to use when Benefits, Insurance, Other annual costs and Overtime are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross pay, Gross hours per year and Pay Rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Gross hours per week, from 40 to 80 — and the answers go from <strong>Gross hours per year</strong> 100 hours to <strong>Gross hours per year</strong> 100 hours.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross hours per week, Gross pay and Absent days per year are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Gross hours per year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gross hours per year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Pay Rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Pay Rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Gross hours per year is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Labor cost form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Gross hours per year</strong> is measured in hours. It feeds Gross pay, Pay Rate and Hours not worked per year. Fill it from a measurement rather than a memory — Gross hours per year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pay Rate</strong> is measured in /hours. It feeds Gross hours per year and Gross pay. Fill it from a measurement rather than a memory — Pay Rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Gross hours per year and Pay Rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Gross hours per year — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Gross hours per week in hours against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross hours per week follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Gross hours per year and Pay Rate and the number you are missing is Gross hours per week and Gross pay.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/us-income-percentile">US income percentile Calculator</a>, <a href="/finance/va-disability">VA disability Calculator</a> and <a href="/finance/va-loan">VA loan Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Labor cost is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Labor cost calculator work out?', 'a' => <<<'TXT'
            Gross hours per week, Gross pay, Absent days per year and Hours not worked per year, from Gross hours per year and Pay Rate. The relationship is Gross pay = Gross hours per year × Pay Rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Gross hours per year (hours), Pay Rate (/hours). Fill gross hours per year and pay Rate and leave Gross hours per week empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Gross pay, Gross hours per year, Pay Rate and Net hours worked can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross hours per year = 100 hours. The figures come from Gross hours per year as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gross hours per week is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Gross hours per year blank and the page solves for it, reporting Gross hours per week instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gross hours per week keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/us-income-percentile', 'name' => 'US income percentile Calculator'],
            ['path' => '/finance/va-disability', 'name' => 'VA disability Calculator'],
            ['path' => '/finance/va-loan', 'name' => 'VA loan Calculator'],
        ],
        'authors' => [],
    ],
];
