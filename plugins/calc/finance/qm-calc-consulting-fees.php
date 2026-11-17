<?php

/**
 * Consulting fees
 * /finance/consulting-fees
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Consulting fees',
    'meta' => ['title' => 'Consulting fees — Formula, Steps & Examples', 'description' => 'Consulting fees turns working hours per day and number of weekdays in a year into number of billable days. The formula is printed in the form\'s own words.', 'h1' => 'Consulting fees Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Billable days a year',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'working_hours',
                            'label' => 'Working hours per day',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_weekdays',
                            'label' => 'Number of weekdays in a year',
                            'type' => 'select',
                            'options' => ['260' => '260', '261' => '261', '262' => '262'],
                            'dataset' => 'weekdays',
                            'control' => 'DROPDOWN',
                            'default' => '261',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'holiday_days',
                            'label' => 'Number of holiday days each year?',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sick_days',
                            'label' => 'Number of sick days each year?',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'admin_days',
                            'label' => 'Number of marketing, admin, non-client work days each year?',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'billable_days',
                            'label' => 'Number of billable days',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annual operating costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advertising',
                            'label' => 'Advertising and marketing',
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
                            'name' => 'equipment',
                            'label' => 'Equipment, hardware and software',
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
                            'name' => 'training',
                            'label' => 'Training and education',
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
                            'name' => 'memberships',
                            'label' => 'Memberships and associations',
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
                            'name' => 'insurance',
                            'label' => 'Insurance',
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
                            'name' => 'healthcare',
                            'label' => 'Healthcare',
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
                            'name' => 'office_expenses',
                            'label' => 'Office expenses',
                            'type' => 'number',
                            'help' => 'Overheads such as telephone bills, internet bills, electricity bills, etc.',
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
                            'name' => 'rent',
                            'label' => 'Office space rent',
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
                            'name' => 'supplies',
                            'label' => 'Supplies',
                            'type' => 'number',
                            'help' => 'Postage, stationery, etc.',
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
                            'name' => 'professional_fees',
                            'label' => 'Professional fees',
                            'type' => 'number',
                            'help' => 'Accountant, lawyer, etc.',
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
                            'name' => 'annual_operating_costs',
                            'label' => 'Annual operating costs',
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
            'title' => 'Project size and target income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_project_value',
                            'label' => 'Average project value',
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
                            'name' => 'target_income',
                            'label' => 'Target income',
                            'type' => 'number',
                            'help' => 'How much do you want to earn before taxes?',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_billable_rate',
                            'label' => 'Daily billable rate',
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
                            'name' => 'hourly_rate',
                            'label' => 'Hourly rate',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        You need a daily billable rate of {{daily_billable_rate.monetaryValue}} to meet your target income, with an hourly rate of {{hourly_rate.monetaryValue}}. You need to have at least {{projects_per_year.formattedValue}} projects per year to meet this target.
                        TXT],
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
                            'name' => 'projects_per_year',
                            'label' => 'Projects per year',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'billable_days = num_weekdays - holiday_days - sick_days - admin_days',
            'results' => [
                'billable_days' => '-admin_days - holiday_days + num_weekdays - sick_days',
                'holiday_days' => '-admin_days - billable_days + num_weekdays - sick_days',
                'sick_days' => '-admin_days - billable_days - holiday_days + num_weekdays',
                'num_weekdays' => 'admin_days + billable_days + holiday_days + sick_days',
                'admin_days' => '-billable_days - holiday_days + num_weekdays - sick_days',
            ],
        ],
        [
            'title' => 'annual_operating_costs = advertising + equipment + training + memberships + insurance + healthcare + office_expenses + rent + supplies + professional_fees',
            'results' => [
                'annual_operating_costs' => 'advertising + equipment + healthcare + insurance + memberships + office_expenses + professional_fees + rent + supplies + training',
                'professional_fees' => '-advertising + annual_operating_costs - equipment - healthcare - insurance - memberships - office_expenses - rent - supplies - training',
                'supplies' => '-advertising + annual_operating_costs - equipment - healthcare - insurance - memberships - office_expenses - professional_fees - rent - training',
                'advertising' => 'annual_operating_costs - equipment - healthcare - insurance - memberships - office_expenses - professional_fees - rent - supplies - training',
                'training' => '-advertising + annual_operating_costs - equipment - healthcare - insurance - memberships - office_expenses - professional_fees - rent - supplies',
                'insurance' => '-advertising + annual_operating_costs - equipment - healthcare - memberships - office_expenses - professional_fees - rent - supplies - training',
                'rent' => '-advertising + annual_operating_costs - equipment - healthcare - insurance - memberships - office_expenses - professional_fees - supplies - training',
                'memberships' => '-advertising + annual_operating_costs - equipment - healthcare - insurance - office_expenses - professional_fees - rent - supplies - training',
                'equipment' => '-advertising + annual_operating_costs - healthcare - insurance - memberships - office_expenses - professional_fees - rent - supplies - training',
                'healthcare' => '-advertising + annual_operating_costs - equipment - insurance - memberships - office_expenses - professional_fees - rent - supplies - training',
                'office_expenses' => '-advertising + annual_operating_costs - equipment - healthcare - insurance - memberships - professional_fees - rent - supplies - training',
            ],
        ],
        [
            'title' => 'projects_per_year = (target_income + annual_operating_costs) / average_project_value',
            'results' => ['target_income' => '-annual_operating_costs + average_project_value*projects_per_year', 'annual_operating_costs' => 'average_project_value*projects_per_year - target_income', 'projects_per_year' => '(annual_operating_costs + target_income)/average_project_value', 'average_project_value' => '(annual_operating_costs + target_income)/projects_per_year'],
        ],
        [
            'title' => 'daily_billable_rate = (target_income + annual_operating_costs) / billable_days',
            'results' => ['target_income' => '-annual_operating_costs + billable_days*daily_billable_rate', 'annual_operating_costs' => 'billable_days*daily_billable_rate - target_income', 'daily_billable_rate' => '(annual_operating_costs + target_income)/billable_days', 'billable_days' => '(annual_operating_costs + target_income)/daily_billable_rate'],
        ],
        [
            'title' => 'hourly_rate = daily_billable_rate / working_hours',
            'results' => ['working_hours' => 'daily_billable_rate/hourly_rate', 'daily_billable_rate' => 'hourly_rate*working_hours', 'hourly_rate' => 'daily_billable_rate/working_hours'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Consulting fees works out Working hours per day and Number of billable days from Number of weekdays in a year, Number of holiday days each year? and Number of sick days each year?. Nothing is looked up on this page: working hours per day is computed from number of weekdays in a year and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Working hours per day is opened in hours; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Consulting fees calculator works', 'html' => <<<'TXT'
            <p>The Consulting fees calculator applies one relationship to 4 numbers and reports Working hours per day, Number of billable days and Advertising and marketing.</p><p>The relationship it solves reads Number of billable days = − Number of marketing, admin, non-client work days each year? − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?.</p><p>What comes back is Working hours per day, Number of billable days, Advertising and marketing and Equipment, hardware and software — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Number of weekdays in a year</strong> — a plain number, no unit</li><li><strong>Number of holiday days each year?</strong> — in days</li><li><strong>Number of sick days each year?</strong> — in days</li><li><strong>Number of marketing, admin, non-client work days each year?</strong> — in days</li></ul><p>The result boxes are Working hours per day in hours, Number of billable days in days, Advertising and marketing in USD, Equipment, hardware and software in USD, Training and education in USD, Memberships and associations in USD, Insurance in USD, Healthcare in USD, Office expenses in USD, Office space rent in USD, Supplies in USD, Professional fees in USD, Annual operating costs in USD, Average project value in USD, Target income in USD, Daily billable rate in USD, Hourly rate in USD, Projects per year; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Working hours per day = 8 hrs, Number of weekdays in a year = 261, Number of holiday days each year? = 100 days, Number of sick days each year? = 1000 days, Number of marketing, admin, non-client work days each year? = 10 days, Advertising and marketing = 100 USD, Equipment, hardware and software = 1000 USD, Training and education = 10 USD, Memberships and associations = 100 USD, Insurance = 1000 USD, Healthcare = 10 USD, Office expenses = 100 USD, Office space rent = 1000 USD, Supplies = 10 USD, Professional fees = 100 USD, Annual operating costs = 1000 USD, Average project value = 10 USD, Target income = 100 USD, Daily billable rate = 1000 USD, Hourly rate = 10 USD and Projects per year = 100 gives <strong>Number of billable days</strong> = -849 days.</p><ul><li><strong>Number of billable days</strong> = -849 days</li></ul><p>That is <strong>Number of billable days</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Number of billable days</strong> = -849. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Working hours per day lists 8 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Number of billable days</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?</code></li><li><strong>Number of holiday days each year?</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of billable days + Number of weekdays in a year − Number of sick days each year?</code></li><li><strong>Number of sick days each year?</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of billable days − Number of holiday days each year? + Number of weekdays in a year</code></li><li><strong>Number of weekdays in a year</strong> = <code>Number of marketing, admin, non-client work days each year? + Number of billable days + Number of holiday days each year? + Number of sick days each year?</code></li><li><strong>Number of marketing, admin, non-client work days each year?</strong> = <code>− Number of billable days − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?</code></li><li><strong>Annual operating costs</strong> = <code>Advertising and marketing + Equipment, hardware and software + Healthcare + Insurance + Memberships and associations + Office expenses + Professional fees + Office space rent + Supplies + Training and education</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Number of billable days</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?</code> — the form to use when Number of marketing, admin, non-client work days each year?, Number of holiday days each year?, Number of weekdays in a year and Number of sick days each year? are the values you have.</li><li><strong>Number of holiday days each year?</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of billable days + Number of weekdays in a year − Number of sick days each year?</code> — the form to use when Number of marketing, admin, non-client work days each year?, Number of billable days, Number of weekdays in a year and Number of sick days each year? are the values you have.</li><li><strong>Number of sick days each year?</strong> = <code>− Number of marketing, admin, non-client work days each year? − Number of billable days − Number of holiday days each year? + Number of weekdays in a year</code> — the form to use when Number of marketing, admin, non-client work days each year?, Number of billable days, Number of holiday days each year? and Number of weekdays in a year are the values you have.</li><li><strong>Number of weekdays in a year</strong> = <code>Number of marketing, admin, non-client work days each year? + Number of billable days + Number of holiday days each year? + Number of sick days each year?</code> — the form to use when Number of marketing, admin, non-client work days each year?, Number of billable days, Number of holiday days each year? and Number of sick days each year? are the values you have.</li><li><strong>Number of marketing, admin, non-client work days each year?</strong> = <code>− Number of billable days − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?</code> — the form to use when Number of billable days, Number of holiday days each year?, Number of weekdays in a year and Number of sick days each year? are the values you have.</li><li><strong>Annual operating costs</strong> = <code>Advertising and marketing + Equipment, hardware and software + Healthcare + Insurance + Memberships and associations + Office expenses + Professional fees + Office space rent + Supplies + Training and education</code> — the form to use when Advertising and marketing, Equipment, hardware and software, Healthcare and Insurance are the values you have.</li><li><strong>Professional fees</strong> = <code>− Advertising and marketing + Annual operating costs − Equipment, hardware and software − Healthcare − Insurance − Memberships and associations − Office expenses − Office space rent − Supplies − Training and education</code> — the form to use when Advertising and marketing, Annual operating costs, Equipment, hardware and software and Healthcare are the values you have.</li><li><strong>Advertising and marketing</strong> = <code>Annual operating costs − Equipment, hardware and software − Healthcare − Insurance − Memberships and associations − Office expenses − Professional fees − Office space rent − Supplies − Training and education</code> — the form to use when Annual operating costs, Equipment, hardware and software, Healthcare and Insurance are the values you have.</li></ul><p>Any one of Number of billable days, Number of holiday days each year? and Number of sick days each year? can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Working hours per day, from 8 to 16 — and the answers go from <strong>Number of billable days</strong> -849 days to <strong>Number of billable days</strong> -849 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Number of holiday days each year?, Number of sick days each year? and Number of marketing, admin, non-client work days each year? carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Working hours per day, Number of billable days and Advertising and marketing are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of weekdays in a year left as a guess.</strong> Anything typed into Number of weekdays in a year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of holiday days each year? left as a guess.</strong> Anything typed into Number of holiday days each year? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of weekdays in a year and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Working hours per day is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of weekdays in a year, Number of holiday days each year? and Number of sick days each year? are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of weekdays in a year, Number of holiday days each year? and Number of sick days each year? and the number you are missing is Working hours per day and Number of billable days.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/fibonacci-retracement">Fibonacci retracement Calculator</a>, <a href="/finance/fica-tax">FICA tax Calculator</a> and <a href="/finance/fifo-for-inventories">FIFO for inventories</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Consulting fees calculator work out?', 'a' => <<<'TXT'
            Working hours per day, Number of billable days, Advertising and marketing and Equipment, hardware and software, from Number of marketing, admin, non-client work days each year?, Number of holiday days each year?, Number of weekdays in a year and Number of sick days each year?. The relationship is Number of billable days = − Number of marketing, admin, non-client work days each year? − Number of holiday days each year? + Number of weekdays in a year − Number of sick days each year?.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of weekdays in a year, Number of holiday days each year? (days), Number of sick days each year? (days), Number of marketing, admin, non-client work days each year? (days). With number of weekdays in a year, number of holiday days each year? and number of sick days each year? in place, Working hours per day can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Number of billable days, Number of holiday days each year?, Number of sick days each year? and Number of weekdays in a year blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Number of billable days = -849 days. That comes from the page's own defaults, entered in Number of weekdays in a year; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Working hours per day is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Number of weekdays in a year blank and the page solves for it, reporting Working hours per day instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Working hours per day at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/fibonacci-retracement', 'name' => 'Fibonacci retracement Calculator'],
            ['path' => '/finance/fica-tax', 'name' => 'FICA tax Calculator'],
            ['path' => '/finance/fifo-for-inventories', 'name' => 'FIFO for inventories'],
        ],
        'authors' => [],
    ],
];
