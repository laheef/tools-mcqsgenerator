<?php

/**
 * Biweekly pay
 * /finance/biweekly-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Biweekly pay',
    'meta' => ['title' => 'Biweekly pay Calculator — Formula & Results', 'description' => 'Biweekly pay reports annual salary, monthly wage, weekly wage and daily wage. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Biweekly pay Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => 'Input any of the wages below to obtain the answer',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly',
                            'label' => 'Annual salary',
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
                            'name' => 'monthly',
                            'label' => 'Monthly wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly',
                            'label' => 'Weekly wage',
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
                            'name' => 'daily',
                            'label' => 'Daily wage',
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
                            'name' => 'hourly',
                            'label' => 'Hourly wage',
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
                            'name' => 'per_minute',
                            'label' => 'Per minute wage',
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
                            'name' => 'per_second',
                            'label' => 'Per second wage',
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
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Are you sure this is the number of hours per week? This is more than 12 daily hours from Monday to Saturday.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days per week',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Answer',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'biweekly',
                            'label' => 'Biweekly wage',
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
    ],
    'formula' => [
        [
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['weekly' => 'hourly*hours_per_week', 'hours_per_week' => 'weekly/hourly', 'hourly' => 'weekly/hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['hourly' => 'daily*days_per_week/hours_per_week', 'daily' => 'hourly*hours_per_week/days_per_week', 'hours_per_week' => 'daily*days_per_week/hourly', 'days_per_week' => 'hourly*hours_per_week/daily'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['yearly' => '52*hourly*hours_per_week', 'hours_per_week' => '(1/52)*yearly/hourly', 'hourly' => '(1/52)*yearly/hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['monthly' => '(13/3)*hourly*hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly', 'hourly' => '(3/13)*monthly/hours_per_week'],
        ],
        [
            'title' => 'per_minute = hourly / 60',
            'results' => ['per_minute' => '(1/60)*hourly', 'hourly' => '60*per_minute'],
        ],
        [
            'title' => 'per_second = hourly / 3600',
            'results' => ['per_second' => '(1/3600)*hourly', 'hourly' => '3600*per_second'],
        ],
        [
            'title' => 'biweekly = hourly * hours_per_week * 2',
            'results' => ['hourly' => '(1/2)*biweekly/hours_per_week', 'hours_per_week' => '(1/2)*biweekly/hourly', 'biweekly' => '2*hourly*hours_per_week'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Biweekly pay works out Annual salary and Monthly wage from Hourly wage and Hours per week. Nothing is looked up on this page: annual salary is computed from hourly wage and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Annual salary is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Biweekly pay calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Biweekly pay: it takes 2 numbers and reports Annual salary, Monthly wage and Weekly wage.</p><p>The relationship it solves reads Weekly wage = Hourly wage × Hours per week.</p><p>The result panel carries Annual salary, Monthly wage, Weekly wage and Daily wage, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — in hours</li></ul><p>The result boxes are Annual salary in USD, Monthly wage in USD, Weekly wage in USD, Daily wage in USD, Per minute wage in USD, Per second wage in USD, Days per week in days, Biweekly wage in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Annual salary = 10 USD, Monthly wage = 100 USD, Daily wage = 1000 USD, Hourly wage = 10 USD, Per minute wage = 100 USD, Per second wage = 1000 USD, Hours per week = 40 hrs, Days per week = 5 days and Biweekly wage = 1000 USD; the answers are <strong>Weekly wage</strong> = 400 USD.</p><ul><li><strong>Weekly wage</strong> = 400 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly wage</strong> = 400. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Days per week lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Daily wage × Days per week ÷ Hours per week</code> — the form to use when Daily wage, Days per week and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily wage × Days per week ÷ Hourly wage</code> — the form to use when Daily wage, Days per week and Hourly wage are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code> — the form to use when Hourly wage, Hours per week and Daily wage are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Any one of Weekly wage, Hours per week and Hourly wage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Annual salary, from 10 to 20 — and the answers go from <strong>Weekly wage</strong> 400 USD to <strong>Weekly wage</strong> 400 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Hours per week carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Annual salary, Monthly wage and Weekly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hourly wage and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Biweekly pay form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Weekly wage, Hours per week and Daily wage. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. It feeds Weekly wage, Hourly wage and Daily wage. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Annual salary</strong> is a plain number. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly wage</strong> is a plain number. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 400. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Daily wage</strong> is a plain number. The value follows from Hourly wage, Hours per week and Days per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Per minute wage</strong> is a plain number. The value follows from Hourly wage. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Per second wage</strong> is a plain number. The value follows from Hourly wage. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Days per week</strong> is a days figure. The value follows from Hourly wage, Hours per week and Daily wage. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Biweekly wage</strong> is a plain number. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Biweekly pay actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos, yrs and sec. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual salary is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly wage and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hourly wage and Hours per week measured, Annual salary and Monthly wage wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/debt-consolidation">Debt consolidation</a>, <a href="/finance/debt-payoff">Debt payoff Calculator</a> and <a href="/finance/dscr">Debt service coverage ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Biweekly pay calculator work out?', 'a' => 'Annual salary, Monthly wage, Weekly wage and Daily wage, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week (hours). Fill hourly wage and hours per week and leave Annual salary empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly wage, Hours per week, Hourly wage and Daily wage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Weekly wage = 400 USD. The figures come from Hourly wage as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Annual salary is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly wage blank and the page solves for it, reporting Annual salary instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual salary keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/debt-consolidation', 'name' => 'Debt consolidation'],
            ['path' => '/finance/debt-payoff', 'name' => 'Debt payoff Calculator'],
            ['path' => '/finance/dscr', 'name' => 'Debt service coverage ratio Calculator'],
        ],
        'authors' => [],
    ],
];
