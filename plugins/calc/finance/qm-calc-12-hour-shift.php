<?php

/**
 * 12 hour shift
 * /finance/12-hour-shift
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '12 hour shift',
    'meta' => ['title' => '12 hour shift Calculator — Formula & Results', 'description' => 'Enter hourly wage, overtime hourly wage and number of regular hours and 12 hour shift returns average wage per hour and pay per day. Any box can be the unknown.', 'h1' => '12 hour shift Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'Pay and hours',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly_wage',
                            'label' => 'Hourly wage',
                            'type' => 'number',
                            'help' => 'Your regular wage per hour.',
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
                            'name' => 'overtime_hourly_wage',
                            'label' => 'Overtime hourly wage',
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
                            'name' => 'number_of_regular_hours',
                            'label' => 'Number of regular hours',
                            'type' => 'number',
                            'help' => 'The hours you\'d work per day at the regular wage.',
                            'unit' => '124',
                            'unit_default' => 'hour',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '12-hour shift pay',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_wage_per_hour',
                            'label' => 'Average wage per hour',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pay_per_day',
                            'label' => 'Pay per day',
                            'type' => 'number',
                            'help' => 'Assuming one twelve-hour shift.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'pay_per_week',
                            'label' => 'Pay per week',
                            'type' => 'number',
                            'help' => 'Assuming five 12-hour shifts.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pay_per_month',
                            'label' => 'Pay per month',
                            'type' => 'number',
                            'help' => 'Assuming 22 12-hour shifts.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'pay_per_year',
                            'label' => 'Pay per year',
                            'type' => 'number',
                            'help' => 'Assuming 260 12-hour shifts.',
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
            'title' => 'pay_per_day = hourly_wage * number_of_regular_hours + (12 - number_of_regular_hours) * overtime_hourly_wage',
            'results' => ['hourly_wage' => '(number_of_regular_hours*overtime_hourly_wage - 12*overtime_hourly_wage + pay_per_day)/number_of_regular_hours', 'overtime_hourly_wage' => '(hourly_wage*number_of_regular_hours - pay_per_day)/(number_of_regular_hours - 12)', 'number_of_regular_hours' => '(-12*overtime_hourly_wage + pay_per_day)/(hourly_wage - overtime_hourly_wage)', 'pay_per_day' => 'hourly_wage*number_of_regular_hours - number_of_regular_hours*overtime_hourly_wage + 12*overtime_hourly_wage'],
        ],
        [
            'title' => 'pay_per_week = pay_per_day * 5 ',
            'results' => ['pay_per_week' => '5*pay_per_day', 'pay_per_day' => '(1/5)*pay_per_week'],
        ],
        [
            'title' => 'pay_per_month = pay_per_day * 22',
            'results' => ['pay_per_month' => '22*pay_per_day', 'pay_per_day' => '(1/22)*pay_per_month'],
        ],
        [
            'title' => 'pay_per_year = pay_per_day * 260',
            'results' => ['pay_per_day' => '(1/260)*pay_per_year', 'pay_per_year' => '260*pay_per_day'],
        ],
        [
            'title' => 'average_wage_per_hour = pay_per_day/12',
            'results' => ['average_wage_per_hour' => '(1/12)*pay_per_day', 'pay_per_day' => '12*average_wage_per_hour'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        12 hour shift turns Hourly wage, Overtime hourly wage and Number of regular hours into Average wage per hour and Pay per day. It is a single relationship that reads average wage per hour out of hourly wage, not a table of canned results keyed by them. Units for Average wage per hour default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the 12 hour shift calculator works', 'html' => <<<'TXT'
            <p>The 12 hour shift calculator applies one relationship to 3 numbers and reports Average wage per hour, Pay per day and Pay per week.</p><p>Written with the labels from the form, Pay per day = Hourly wage × Number of regular hours − Number of regular hours × Overtime hourly wage + 12 × Overtime hourly wage.</p><p>The answers are Average wage per hour, Pay per day, Pay per week and Pay per month; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Hourly wage</strong> — in USD. Your regular wage per hour.</li><li><strong>Overtime hourly wage</strong> — in USD</li><li><strong>Number of regular hours</strong> — in hours. The hours you&#039;d work per day at the regular wage.</li></ul><p>The result boxes are Average wage per hour in USD, Pay per day in USD, Pay per week in USD, Pay per month in USD, Pay per year in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hourly wage = 10 USD, Overtime hourly wage = 100 USD and Number of regular hours = 8 hour; the answers are <strong>Pay per day</strong> = 480 USD, <strong>Pay per week</strong> = 2400 USD, <strong>Pay per month</strong> = 10560 USD, <strong>Pay per year</strong> = 124800 USD and <strong>Average wage per hour</strong> = 40 USD.</p><ul><li><strong>Pay per day</strong> = 480 USD</li><li><strong>Pay per week</strong> = 2400 USD</li><li><strong>Pay per month</strong> = 10560 USD</li><li><strong>Pay per year</strong> = 124800 USD</li><li><strong>Average wage per hour</strong> = 40 USD</li></ul><p>That is <strong>Pay per day</strong> = <code>Hourly wage × Number of regular hours − Number of regular hours × Overtime hourly wage + 12 × Overtime hourly wage</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Pay per day</strong> = 480, <strong>Pay per week</strong> = 2400, <strong>Pay per month</strong> = 10560, <strong>Pay per year</strong> = 124800 and <strong>Average wage per hour</strong> = 40 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Number of regular hours offers 4 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Pay per day</strong> = <code>Hourly wage × Number of regular hours − Number of regular hours × Overtime hourly wage + 12 × Overtime hourly wage</code></li><li><strong>Hourly wage</strong> = <code>(Number of regular hours × Overtime hourly wage − 12 × Overtime hourly wage + Pay per day) ÷ Number of regular hours</code></li><li><strong>Overtime hourly wage</strong> = <code>(Hourly wage × Number of regular hours − Pay per day) ÷ (Number of regular hours − 12)</code></li><li><strong>Number of regular hours</strong> = <code>( − 12 × Overtime hourly wage + Pay per day) ÷ (Hourly wage − Overtime hourly wage)</code></li><li><strong>Pay per week</strong> = <code>5 × Pay per day</code></li><li><strong>Pay per month</strong> = <code>22 × Pay per day</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Pay per day</strong> = <code>Hourly wage × Number of regular hours − Number of regular hours × Overtime hourly wage + 12 × Overtime hourly wage</code> — the form to use when Hourly wage, Number of regular hours and Overtime hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>(Number of regular hours × Overtime hourly wage − 12 × Overtime hourly wage + Pay per day) ÷ Number of regular hours</code> — the form to use when Number of regular hours, Overtime hourly wage and Pay per day are the values you have.</li><li><strong>Overtime hourly wage</strong> = <code>(Hourly wage × Number of regular hours − Pay per day) ÷ (Number of regular hours − 12)</code> — the form to use when Hourly wage, Number of regular hours and Pay per day are the values you have.</li><li><strong>Number of regular hours</strong> = <code>( − 12 × Overtime hourly wage + Pay per day) ÷ (Hourly wage − Overtime hourly wage)</code> — the form to use when Overtime hourly wage, Pay per day and Hourly wage are the values you have.</li><li><strong>Pay per week</strong> = <code>5 × Pay per day</code> — the form to use when Pay per day are the values you have.</li><li><strong>Pay per day</strong> = <code>(1 ÷ 5) × Pay per week</code> — the form to use when Pay per week are the values you have.</li><li><strong>Pay per month</strong> = <code>22 × Pay per day</code> — the form to use when Pay per day are the values you have.</li><li><strong>Pay per day</strong> = <code>(1 ÷ 22) × Pay per month</code> — the form to use when Pay per month are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Pay per day, Hourly wage and Overtime hourly wage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hourly wage from 10 to 20, leaving every other box alone. The panel moves from <strong>Pay per day</strong> 480 USD, <strong>Pay per week</strong> 2400 USD, <strong>Pay per month</strong> 10560 USD, <strong>Pay per year</strong> 124800 USD and <strong>Average wage per hour</strong> 40 USD to <strong>Pay per day</strong> 560 USD, <strong>Pay per week</strong> 2800 USD, <strong>Pay per month</strong> 12320 USD, <strong>Pay per year</strong> 145600 USD and <strong>Average wage per hour</strong> 46.67 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Number of regular hours is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Average wage per hour, Pay per day and Pay per week are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hourly wage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly wage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Overtime hourly wage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Overtime hourly wage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hourly wage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. Your regular wage per hour. It feeds Overtime hourly wage, Number of regular hours and Pay per day. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Overtime hourly wage</strong> takes a plain number with no unit attached. It feeds Hourly wage, Number of regular hours and Pay per day. Have it to hand before you start: Overtime hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of regular hours</strong> is a hours quantity: the page opens it in hour and converts anything else you pick before the formula runs. The hours you&#039;d work per day at the regular wage. It feeds Hourly wage, Overtime hourly wage and Pay per day. Have it to hand before you start: Number of regular hours is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Average wage per hour</strong> is a plain number and the page's own defaults put it at 40. It is worked out from Pay per day. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pay per day</strong> is a plain number and the page's own defaults put it at 480. It is worked out from Hourly wage, Number of regular hours and Overtime hourly wage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pay per week</strong> is a plain number and the page's own defaults put it at 2400. It is worked out from Pay per day. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pay per month</strong> is a plain number and the page's own defaults put it at 10560. It is worked out from Pay per day. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pay per year</strong> is a plain number and the page's own defaults put it at 124800. It is worked out from Pay per day. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — opens in <em>hour</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Average wage per hour follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hourly wage, Overtime hourly wage and Number of regular hours measured, Average wage per hour and Pay per day wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/overtime">Overtime Calculator</a>, <a href="/finance/overtime-paycheck">Overtime paycheck</a> and <a href="/finance/pag-ibig-housing-loan">Pag IBIG housing loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 12 hour shift calculator work out?', 'a' => <<<'TXT'
            Average wage per hour, Pay per day, Pay per week and Pay per month, from Hourly wage, Number of regular hours and Overtime hourly wage. The relationship is Pay per day = Hourly wage × Number of regular hours − Number of regular hours × Overtime hourly wage + 12 × Overtime hourly wage.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hourly wage (USD), Overtime hourly wage (USD), Number of regular hours (hours). Fill hourly wage, overtime hourly wage and number of regular hours and leave Average wage per hour empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Pay per day, Hourly wage, Overtime hourly wage and Number of regular hours can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Pay per day = 480 USD, Pay per week = 2400 USD, Pay per month = 10560 USD, Pay per year = 124800 USD and Average wage per hour = 40 USD. That comes from the page's own defaults, entered in Hourly wage; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Average wage per hour is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hourly wage left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Average wage per hour keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/overtime', 'name' => 'Overtime Calculator'],
            ['path' => '/finance/overtime-paycheck', 'name' => 'Overtime paycheck'],
            ['path' => '/finance/pag-ibig-housing-loan', 'name' => 'Pag IBIG housing loan Calculator'],
        ],
        'authors' => [],
    ],
];
