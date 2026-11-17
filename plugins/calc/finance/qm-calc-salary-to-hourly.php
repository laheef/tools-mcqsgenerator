<?php

/**
 * Salary to hourly
 * /finance/salary-to-hourly
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Salary to hourly',
    'meta' => ['title' => 'Salary to hourly — Formula, Steps & Examples', 'description' => 'Salary to hourly works out annual salary from hourly wage and hours per week. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Salary to hourly Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
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
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly',
                            'label' => 'Annual salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your wage as:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'daily',
                            'label' => 'Daily',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'weekly',
                            'label' => 'Weekly',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'biweekly',
                            'label' => 'Biweekly',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other time intervals',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'per_minute',
                            'label' => 'Per minute',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '3'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'per_second',
                            'label' => 'Per second',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '5'],
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
            'results' => ['hours_per_week' => 'weekly/hourly', 'weekly' => 'hourly*hours_per_week', 'hourly' => 'weekly/hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / 5',
            'results' => ['hours_per_week' => '5*daily/hourly', 'hourly' => '5*daily/hours_per_week', 'daily' => '(1/5)*hourly*hours_per_week'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hours_per_week' => '(1/52)*yearly/hourly', 'hourly' => '(1/52)*yearly/hours_per_week', 'yearly' => '52*hourly*hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hours_per_week' => '(3/13)*monthly/hourly', 'monthly' => '(13/3)*hourly*hours_per_week', 'hourly' => '(3/13)*monthly/hours_per_week'],
        ],
        [
            'title' => 'per_minute = hourly / 60',
            'results' => ['per_minute' => '(1/60)*hourly', 'hourly' => '60*per_minute'],
        ],
        [
            'title' => 'per_second = hourly / 3600',
            'results' => ['hourly' => '3600*per_second', 'per_second' => '(1/3600)*hourly'],
        ],
        [
            'title' => 'biweekly = hourly * hours_per_week * 2',
            'results' => ['hours_per_week' => '(1/2)*biweekly/hourly', 'biweekly' => '2*hourly*hours_per_week', 'hourly' => '(1/2)*biweekly/hours_per_week'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Hourly wage and Hours per week into Salary to hourly and the answer comes back as Annual salary and Daily. Nothing is looked up on this page: annual salary is computed from hourly wage and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Annual salary is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Salary to hourly calculator works', 'html' => <<<'TXT'
            <p>The Salary to hourly calculator applies one relationship to 2 numbers and reports Annual salary, Daily and Monthly.</p><p>Written with the labels from the form, Weekly = Hourly wage × Hours per week.</p><p>The answers are Annual salary, Daily, Monthly and Weekly; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — a plain number, no unit</li></ul><p>What you get back is Annual salary in USD, Daily in USD, Monthly in USD, Weekly in USD, Biweekly in USD, Per minute in USD, Per second in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Hourly wage = 10 USD and Hours per week = 40 gives <strong>Weekly</strong> = 400 USD, <strong>Daily</strong> = 80 USD, <strong>Annual salary</strong> = 20800 USD, <strong>Monthly</strong> = 1733 USD, <strong>Per minute</strong> = 0.1667 USD, <strong>Per second</strong> = 0.0028 USD and <strong>Biweekly</strong> = 800 USD.</p><ul><li><strong>Weekly</strong> = 400 USD</li><li><strong>Daily</strong> = 80 USD</li><li><strong>Annual salary</strong> = 20800 USD</li><li><strong>Monthly</strong> = 1733 USD</li><li><strong>Per minute</strong> = 0.1667 USD</li><li><strong>Per second</strong> = 0.0028 USD</li><li><strong>Biweekly</strong> = 800 USD</li></ul><p>That is <strong>Weekly</strong> = <code>Hourly wage × Hours per week</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly</strong> = 400, <strong>Daily</strong> = 80, <strong>Annual salary</strong> = 20800, <strong>Monthly</strong> = 1733, <strong>Per minute</strong> = 0.1667, <strong>Per second</strong> = 0.0028 and <strong>Biweekly</strong> = 800. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Annual salary is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weekly</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly ÷ Hours per week</code></li><li><strong>Daily</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li><li><strong>Monthly</strong> = <code>(13 ÷ 3) × Hourly wage × Hours per week</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weekly</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly ÷ Hourly wage</code> — the form to use when Weekly and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly ÷ Hours per week</code> — the form to use when Weekly and Hours per week are the values you have.</li><li><strong>Daily</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily ÷ Hourly wage</code> — the form to use when Daily and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>5 × Daily ÷ Hours per week</code> — the form to use when Daily and Hours per week are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>(1 ÷ 52) × Annual salary ÷ Hourly wage</code> — the form to use when Annual salary and Hourly wage are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weekly, Hours per week and Hourly wage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hourly wage, from 10 to 20 — and the answers go from <strong>Weekly</strong> 400 USD, <strong>Daily</strong> 80 USD, <strong>Annual salary</strong> 20800 USD, <strong>Monthly</strong> 1733 USD, <strong>Per minute</strong> 0.1667 USD, <strong>Per second</strong> 0.0028 USD and <strong>Biweekly</strong> 800 USD to <strong>Weekly</strong> 800 USD, <strong>Daily</strong> 160 USD, <strong>Annual salary</strong> 41600 USD, <strong>Monthly</strong> 3467 USD, <strong>Per minute</strong> 0.3333 USD, <strong>Per second</strong> 0.0056 USD and <strong>Biweekly</strong> 1600 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual salary, Daily and Monthly are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Hourly wage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Hours per week, Weekly and Daily. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per week</strong> takes a plain number with no unit attached. It feeds Weekly, Hourly wage and Daily. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 20800. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Daily</strong> is a plain number and the page's own defaults put it at 80. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly</strong> is a plain number and the page's own defaults put it at 1733. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly</strong> is a plain number and the page's own defaults put it at 400. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Biweekly</strong> is a plain number and the page's own defaults put it at 800. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Per minute</strong> is a plain number and the page's own defaults put it at 0.1667. It is computed from Hourly wage, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Per second</strong> is a plain number and the page's own defaults put it at 0.0028. It is computed from Hourly wage, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly</th><th>Daily</th><th>Annual salary</th><th>Monthly</th><th>Per minute</th><th>Per second</th><th>Biweekly</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hourly wage = 5 USD and Hours per week = 20, the answer is <strong>Weekly</strong> = 100 USD, <strong>Daily</strong> = 20 USD, <strong>Annual salary</strong> = 5200 USD, <strong>Monthly</strong> = 433 USD, <strong>Per minute</strong> = 0.0833 USD, <strong>Per second</strong> = 0.0014 USD and <strong>Biweekly</strong> = 200 USD.</li><li>With Hourly wage = 30 USD and Hours per week = 40, the answer is <strong>Weekly</strong> = 1200 USD, <strong>Daily</strong> = 240 USD, <strong>Annual salary</strong> = 62400 USD, <strong>Monthly</strong> = 5200 USD, <strong>Per minute</strong> = 0.5 USD, <strong>Per second</strong> = 0.0083 USD and <strong>Biweekly</strong> = 2400 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual salary is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly wage and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hourly wage and Hours per week is what you already know and Annual salary and Daily is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/sales-commission">Sales commission Calculator</a>, <a href="/finance/sales-tax">Sales tax Calculator</a> and <a href="/finance/sales">Sales</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Salary to hourly calculator work out?', 'a' => 'Annual salary, Daily, Monthly and Weekly, from Hourly wage and Hours per week. The relationship is Weekly = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week. Enter hourly wage and hours per week; Annual salary is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Weekly, Hours per week, Hourly wage and Daily can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly = 400 USD, Daily = 80 USD, Annual salary = 20800 USD, Monthly = 1733 USD, Per minute = 0.1667 USD, Per second = 0.0028 USD and Biweekly = 800 USD. Those are the defaults written into the form — move Hourly wage and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annual salary is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hourly wage left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual salary keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/sales-commission', 'name' => 'Sales commission Calculator'],
            ['path' => '/finance/sales-tax', 'name' => 'Sales tax Calculator'],
            ['path' => '/finance/sales', 'name' => 'Sales'],
        ],
        'authors' => [],
    ],
];
