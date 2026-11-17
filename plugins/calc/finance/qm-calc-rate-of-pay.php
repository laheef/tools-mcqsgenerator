<?php

/**
 * Rate of pay
 * /finance/rate-of-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rate of pay',
    'meta' => ['title' => 'Rate of pay Calculator: Formula, Steps & Examples', 'description' => 'Rate of pay turns hours per week and hourly wage into daily wage and weekly wage. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Rate of pay Calculator', 'updated' => '2024-07-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
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
                        ['type' => 'note', 'text' => 'Put in one of the wages to see the rest!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly_wage',
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
                            'name' => 'daily_wage',
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
                            'name' => 'weekly_wage',
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
                            'name' => 'biweekly_wage',
                            'label' => 'Biweekly wage',
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
                            'name' => 'monthly_wage',
                            'label' => 'Monthly wage',
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
                            'name' => 'annual_salary',
                            'label' => 'Annual salary',
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
            'title' => 'weekly_wage = hourly_wage * hours_per_week',
            'results' => ['hourly_wage' => 'weekly_wage/hours_per_week', 'hours_per_week' => 'weekly_wage/hourly_wage', 'weekly_wage' => 'hourly_wage*hours_per_week'],
        ],
        [
            'title' => 'daily_wage = hourly_wage * hours_per_week / 5',
            'results' => ['hourly_wage' => '5*daily_wage/hours_per_week', 'hours_per_week' => '5*daily_wage/hourly_wage', 'daily_wage' => '(1/5)*hourly_wage*hours_per_week'],
        ],
        [
            'title' => 'annual_salary = hourly_wage * hours_per_week * 52',
            'results' => ['hourly_wage' => '(1/52)*annual_salary/hours_per_week', 'hours_per_week' => '(1/52)*annual_salary/hourly_wage', 'annual_salary' => '52*hourly_wage*hours_per_week'],
        ],
        [
            'title' => 'monthly_wage = hourly_wage * hours_per_week * 52 / 12',
            'results' => ['hourly_wage' => '(3/13)*monthly_wage/hours_per_week', 'hours_per_week' => '(3/13)*monthly_wage/hourly_wage', 'monthly_wage' => '(13/3)*hourly_wage*hours_per_week'],
        ],
        [
            'title' => 'biweekly_wage = hourly_wage * hours_per_week * 2',
            'results' => ['hourly_wage' => '(1/2)*biweekly_wage/hours_per_week', 'hours_per_week' => '(1/2)*biweekly_wage/hourly_wage', 'biweekly_wage' => '2*hourly_wage*hours_per_week'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Hours per week and Hourly wage into Rate of pay and the answer comes back as Daily wage and Weekly wage. There is no hidden constant here: change daily wage and hours per week moves with it. The main result, Daily wage, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Rate of pay calculator works', 'html' => <<<'TXT'
            <p>The Rate of pay calculator applies one relationship to 2 numbers and reports Daily wage, Weekly wage and Biweekly wage.</p><p>The relationship it solves reads Weekly wage = Hourly wage × Hours per week.</p><p>What comes back is Daily wage, Weekly wage, Biweekly wage and Monthly wage — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Hours per week</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>What you get back is Daily wage in USD, Weekly wage in USD, Biweekly wage in USD, Monthly wage in USD, Annual salary in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hours per week = 40 and Hourly wage = 100 USD; the answers are <strong>Weekly wage</strong> = 4000 USD, <strong>Daily wage</strong> = 800 USD, <strong>Annual salary</strong> = 208000 USD, <strong>Monthly wage</strong> = 17333 USD and <strong>Biweekly wage</strong> = 8000 USD.</p><ul><li><strong>Weekly wage</strong> = 4000 USD</li><li><strong>Daily wage</strong> = 800 USD</li><li><strong>Annual salary</strong> = 208000 USD</li><li><strong>Monthly wage</strong> = 17333 USD</li><li><strong>Biweekly wage</strong> = 8000 USD</li></ul><p>The line behind those figures is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly wage</strong> = 4000, <strong>Daily wage</strong> = 800, <strong>Annual salary</strong> = 208000, <strong>Monthly wage</strong> = 17333 and <strong>Biweekly wage</strong> = 8000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Daily wage is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li><li><strong>Monthly wage</strong> = <code>(13 ÷ 3) × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>5 × Daily wage ÷ Hours per week</code> — the form to use when Daily wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily wage ÷ Hourly wage</code> — the form to use when Daily wage and Hourly wage are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>(1 ÷ 52) × Annual salary ÷ Hours per week</code> — the form to use when Annual salary and Hours per week are the values you have.</li></ul><p>Any one of Weekly wage, Hourly wage and Hours per week can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hours per week from 40 to 80, leaving every other box alone. The panel moves from <strong>Weekly wage</strong> 4000 USD, <strong>Daily wage</strong> 800 USD, <strong>Annual salary</strong> 208000 USD, <strong>Monthly wage</strong> 17333 USD and <strong>Biweekly wage</strong> 8000 USD to <strong>Weekly wage</strong> 8000 USD, <strong>Daily wage</strong> 1600 USD, <strong>Annual salary</strong> 416000 USD, <strong>Monthly wage</strong> 34667 USD and <strong>Biweekly wage</strong> 16000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Daily wage, Weekly wage and Biweekly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Hours per week to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hours per week</strong> takes a plain number with no unit attached. It feeds Hourly wage, Weekly wage and Daily wage. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Hours per week, Weekly wage and Daily wage. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Daily wage</strong> is a plain number and the page's own defaults put it at 800. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 4000. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Biweekly wage</strong> is a plain number and the page's own defaults put it at 8000. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly wage</strong> is a plain number and the page's own defaults put it at 17333. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 208000. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th><th>Daily wage</th><th>Annual salary</th><th>Monthly wage</th><th>Biweekly wage</th></tr></thead><tbody><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hours per week = 20 and Hourly wage = 50 USD, the answer is <strong>Weekly wage</strong> = 1000 USD, <strong>Daily wage</strong> = 200 USD, <strong>Annual salary</strong> = 52000 USD, <strong>Monthly wage</strong> = 4333 USD and <strong>Biweekly wage</strong> = 2000 USD.</li><li>With Hours per week = 120 and Hourly wage = 100 USD, the answer is <strong>Weekly wage</strong> = 12000 USD, <strong>Daily wage</strong> = 2400 USD, <strong>Annual salary</strong> = 624000 USD, <strong>Monthly wage</strong> = 52000 USD and <strong>Biweekly wage</strong> = 24000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Daily wage is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Hours per week and Hourly wage and the number you are missing is Daily wage and Weekly wage.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/annual-salary-per-hour">Annual salary per hour Calculator</a>, <a href="/finance/annual-to-monthly-salary">Annual to monthly salary Calculator</a> and <a href="/finance/annualized-rate-of-return">Annualized rate of return Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rate of pay calculator work out?', 'a' => 'Daily wage, Weekly wage, Biweekly wage and Monthly wage, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hours per week, Hourly wage (USD). With hours per week and hourly wage in place, Daily wage can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly wage, Hourly wage, Hours per week and Daily wage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly wage = 4000 USD, Daily wage = 800 USD, Annual salary = 208000 USD, Monthly wage = 17333 USD and Biweekly wage = 8000 USD. Those are the defaults written into the form — move Hours per week and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Daily wage is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily wage at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/annual-salary-per-hour', 'name' => 'Annual salary per hour Calculator'],
            ['path' => '/finance/annual-to-monthly-salary', 'name' => 'Annual to monthly salary Calculator'],
            ['path' => '/finance/annualized-rate-of-return', 'name' => 'Annualized rate of return Calculator'],
        ],
        'authors' => [],
    ],
];
