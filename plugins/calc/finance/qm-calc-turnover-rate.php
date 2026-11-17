<?php

/**
 * Turnover rate
 * /finance/turnover-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turnover rate',
    'meta' => ['title' => 'Turnover rate Calculator — Formula & Results', 'description' => 'Enter calculate average number of employees? and employess at the beginning and get turnover rate back. The formula is printed in the form\'s own words.', 'h1' => 'Turnover rate Calculator', 'updated' => '2026-09-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calculate_average',
                            'label' => 'Calculate average number of employees?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'average_employees',
                            'help' => 'If you have the number of employees at the beginning and end of the considered period, we can calculate the average for you.',
                            'default' => 'No',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Turnover rate calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employees_beginning',
                            'label' => 'Employess at the beginning',
                            'type' => 'number',
                            'help' => 'How many active employees were there at the beginning of the period (e.g. month, year) you are considering?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employees_end',
                            'label' => 'Employees at the end',
                            'type' => 'number',
                            'help' => 'How many active employees were there at the end of the period (e.g. month, year) you are considering?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employees_average',
                            'label' => 'Average number of employees',
                            'type' => 'number',
                            'help' => 'How many active employees were there over the considered period on average?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'leavers',
                            'label' => 'Number of employees who left',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            How many employees left over the period of time you're considering? Only include people who left permanently (for example by resignation, dismissal, retirement). Temporary absences, such as maternity leaves and sabbaticals, don't apply.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turnover_rate',
                            'label' => 'Turnover rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turnover_rate_average',
                            'label' => 'Turnover rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'turnover_rate =  leavers / ( (employees_beginning + employees_end) / 2 ) ',
            'results' => ['turnover_rate' => '2*leavers/(employees_beginning + employees_end)', 'employees_beginning' => '-employees_end + 2*leavers/turnover_rate', 'leavers' => '(1/2)*turnover_rate*(employees_beginning + employees_end)', 'employees_end' => '-employees_beginning + 2*leavers/turnover_rate'],
        ],
        [
            'title' => 'turnover_rate_average = leavers / employees_average ',
            'results' => ['employees_average' => 'leavers/turnover_rate_average', 'turnover_rate_average' => 'leavers/employees_average', 'leavers' => 'employees_average*turnover_rate_average'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Employess at the beginning, Employees at the end and Number of employees who left into Turnover rate and the answer comes back as Average number of employees and Turnover rate. It is a single relationship that reads average number of employees out of employess at the beginning, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Turnover rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Turnover rate: it takes 3 numbers and reports Average number of employees, Turnover rate and Turnover rate.</p><p>In the form&#039;s own words, Turnover rate = 2 × Number of employees who left ÷ (Employess at the beginning + Employees at the end).</p><p>What comes back is Average number of employees, Turnover rate and Turnover rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Employess at the beginning</strong> — a plain number, no unit. How many active employees were there at the beginning of the period (e.g. month, year) you are considering?</li><li><strong>Employees at the end</strong> — a plain number, no unit. How many active employees were there at the end of the period (e.g. month, year) you are considering?</li><li><strong>Number of employees who left</strong> — a plain number, no unit. How many employees left over the period of time you&#039;re considering? Only include people who left permanently (for example by resignation, dismissal, retirement). Temporary absences, such as maternity leaves and sabbaticals, don&#039;t apply.</li></ul><p>The result boxes are Average number of employees, Turnover rate in percent, Turnover rate in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Turnover rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Turnover rate</strong> = <code>2 × Number of employees who left ÷ (Employess at the beginning + Employees at the end)</code></li><li><strong>Employess at the beginning</strong> = <code>− Employees at the end + 2 × Number of employees who left ÷ Turnover rate</code></li><li><strong>Number of employees who left</strong> = <code>(1 ÷ 2) × Turnover rate × (Employess at the beginning + Employees at the end)</code></li><li><strong>Employees at the end</strong> = <code>− Employess at the beginning + 2 × Number of employees who left ÷ Turnover rate</code></li><li><strong>Average number of employees</strong> = <code>Number of employees who left ÷ Turnover rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Turnover rate</strong> = <code>2 × Number of employees who left ÷ (Employess at the beginning + Employees at the end)</code> — the form to use when Number of employees who left, Employess at the beginning and Employees at the end are the values you have.</li><li><strong>Employess at the beginning</strong> = <code>− Employees at the end + 2 × Number of employees who left ÷ Turnover rate</code> — the form to use when Employees at the end, Number of employees who left and Turnover rate are the values you have.</li><li><strong>Number of employees who left</strong> = <code>(1 ÷ 2) × Turnover rate × (Employess at the beginning + Employees at the end)</code> — the form to use when Turnover rate, Employess at the beginning and Employees at the end are the values you have.</li><li><strong>Employees at the end</strong> = <code>− Employess at the beginning + 2 × Number of employees who left ÷ Turnover rate</code> — the form to use when Employess at the beginning, Number of employees who left and Turnover rate are the values you have.</li><li><strong>Turnover rate</strong> = <code>Number of employees who left ÷ Average number of employees</code> — the form to use when Number of employees who left and Average number of employees are the values you have.</li><li><strong>Average number of employees</strong> = <code>Number of employees who left ÷ Turnover rate</code> — the form to use when Number of employees who left and Turnover rate are the values you have.</li><li><strong>Number of employees who left</strong> = <code>Average number of employees × Turnover rate</code> — the form to use when Average number of employees and Turnover rate are the values you have.</li></ul><p>Any one of Turnover rate, Employess at the beginning and Number of employees who left can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Average number of employees, Turnover rate and Turnover rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Employess at the beginning left as a guess.</strong> Anything typed into Employess at the beginning is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Employees at the end left as a guess.</strong> Anything typed into Employees at the end is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of employees who left left as a guess.</strong> Anything typed into Number of employees who left is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Employess at the beginning and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Turnover rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Employess at the beginning</strong> takes a plain number with no unit attached. How many active employees were there at the beginning of the period (e.g. month, year) you are considering?. It feeds Turnover rate, Number of employees who left and Employees at the end. Fill it from a measurement rather than a memory — Employess at the beginning is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Employees at the end</strong> takes a plain number with no unit attached. How many active employees were there at the end of the period (e.g. month, year) you are considering?. It feeds Turnover rate, Employess at the beginning and Number of employees who left. Fill it from a measurement rather than a memory — Employees at the end is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of employees who left</strong> takes a plain number with no unit attached. How many employees left over the period of time you&#039;re considering? Only include people who left permanently (for example by resignation, dismissal, retirement). Temporary absences, such as maternity leaves and sabbaticals, don&#039;t apply. It feeds Turnover rate, Employess at the beginning and Employees at the end. Fill it from a measurement rather than a memory — Number of employees who left is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average number of employees</strong> is a plain number. It is computed from Number of employees who left and Turnover rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Turnover rate</strong> is a percent figure. It is computed from Number of employees who left, Employess at the beginning and Employees at the end, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Turnover rate</strong> is a percent figure. It is computed from Number of employees who left and Average number of employees, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Turnover rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Average number of employees is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Employess at the beginning, Employees at the end and Number of employees who left are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Employess at the beginning, Employees at the end and Number of employees who left and the number you are missing is Average number of employees and Turnover rate.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/prorated-salary">Prorated salary</a>, <a href="/finance/put-call-parity">Put-call parity Calculator</a> and <a href="/finance/pvifa">PVIFA</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turnover rate calculator work out?', 'a' => <<<'TXT'
            Average number of employees, Turnover rate and Turnover rate, from Number of employees who left, Employess at the beginning and Employees at the end. The relationship is Turnover rate = 2 × Number of employees who left ÷ (Employess at the beginning + Employees at the end).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Employess at the beginning, Employees at the end, Number of employees who left. With employess at the beginning, employees at the end and number of employees who left in place, Average number of employees can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Turnover rate, Employess at the beginning, Number of employees who left and Employees at the end blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Average number of employees is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Employess at the beginning blank and the page solves for it, reporting Average number of employees instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Average number of employees at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/prorated-salary', 'name' => 'Prorated salary'],
            ['path' => '/finance/put-call-parity', 'name' => 'Put-call parity Calculator'],
            ['path' => '/finance/pvifa', 'name' => 'PVIFA'],
        ],
        'authors' => [],
    ],
];
