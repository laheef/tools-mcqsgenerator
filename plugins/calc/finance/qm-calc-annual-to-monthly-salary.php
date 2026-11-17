<?php

/**
 * Annual to monthly salary
 * /finance/annual-to-monthly-salary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annual to monthly salary',
    'meta' => ['title' => 'Annual to monthly salary Calculator: Free, With Steps', 'description' => 'Annual to monthly salary takes hours per week and returns annual salary. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Annual to monthly salary Calculator', 'updated' => '2026-03-29'],
    'sections' => [
        [
            'title' => 'Your salary',
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
                            'rounding' => ['standard', '0'],
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
            ],
        ],
        [
            'title' => 'Other wage measures',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly salary',
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
                            'label' => 'Weekly salary',
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
                            'name' => 'daily',
                            'label' => 'Daily salary',
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
                            'label' => 'Hourly salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'More wage measures',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'biweekly',
                            'label' => 'Biweekly salary',
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
                            'name' => 'per_minute',
                            'label' => 'Salary per minute',
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
                            'label' => 'Salary per second',
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
            'results' => ['weekly' => 'hourly*hours_per_week', 'hours_per_week' => 'weekly/hourly', 'hourly' => 'weekly/hours_per_week'],
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
            'results' => ['monthly' => '(13/3)*hourly*hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly', 'hourly' => '(3/13)*monthly/hours_per_week'],
        ],
        [
            'title' => 'per_minute = hourly / 60',
            'results' => ['hourly' => '60*per_minute', 'per_minute' => '(1/60)*hourly'],
        ],
        [
            'title' => 'per_second = hourly / 3600',
            'results' => ['per_second' => '(1/3600)*hourly', 'hourly' => '3600*per_second'],
        ],
        [
            'title' => 'biweekly = hourly * hours_per_week * 2',
            'results' => ['biweekly' => '2*hourly*hours_per_week', 'hours_per_week' => '(1/2)*biweekly/hourly', 'hourly' => '(1/2)*biweekly/hours_per_week'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Hours per week and Hourly salary into Annual to monthly salary and the answer comes back as Annual salary and Monthly salary. It is a single relationship that reads annual salary out of hours per week, not a table of canned results keyed by them. Units for Annual salary default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Annual to monthly salary calculator works', 'html' => <<<'TXT'
            <p>The Annual to monthly salary calculator applies one relationship to 2 numbers and reports Annual salary, Monthly salary and Weekly salary.</p><p>The relationship it solves reads Weekly salary = Hourly salary × Hours per week.</p><p>What comes back is Annual salary, Monthly salary, Weekly salary and Daily salary — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hours per week</strong> — a plain number, no unit</li><li><strong>Hourly salary</strong> — in USD</li></ul><p>What you get back is Annual salary in USD, Monthly salary in USD, Weekly salary in USD, Daily salary in USD, Biweekly salary in USD, Salary per minute in USD, Salary per second in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hours per week = 40 and Hourly salary = 100 USD; the answers are <strong>Weekly salary</strong> = 4000 USD, <strong>Daily salary</strong> = 800 USD, <strong>Annual salary</strong> = 208000 USD, <strong>Monthly salary</strong> = 17333 USD, <strong>Salary per minute</strong> = 1.67 USD, <strong>Salary per second</strong> = 0.0278 USD and <strong>Biweekly salary</strong> = 8000 USD.</p><ul><li><strong>Weekly salary</strong> = 4000 USD</li><li><strong>Daily salary</strong> = 800 USD</li><li><strong>Annual salary</strong> = 208000 USD</li><li><strong>Monthly salary</strong> = 17333 USD</li><li><strong>Salary per minute</strong> = 1.67 USD</li><li><strong>Salary per second</strong> = 0.0278 USD</li><li><strong>Biweekly salary</strong> = 8000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly salary</strong> = <code>Hourly salary × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly salary</strong> = 4000, <strong>Daily salary</strong> = 800, <strong>Annual salary</strong> = 208000, <strong>Monthly salary</strong> = 17333, <strong>Salary per minute</strong> = 1.67, <strong>Salary per second</strong> = 0.0278 and <strong>Biweekly salary</strong> = 8000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Annual salary is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly salary</strong> = <code>Hourly salary × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly salary ÷ Hourly salary</code></li><li><strong>Hourly salary</strong> = <code>Weekly salary ÷ Hours per week</code></li><li><strong>Daily salary</strong> = <code>(1 ÷ 5) × Hourly salary × Hours per week</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly salary × Hours per week</code></li><li><strong>Monthly salary</strong> = <code>(13 ÷ 3) × Hourly salary × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly salary</strong> = <code>Hourly salary × Hours per week</code> — the form to use when Hourly salary and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly salary ÷ Hourly salary</code> — the form to use when Weekly salary and Hourly salary are the values you have.</li><li><strong>Hourly salary</strong> = <code>Weekly salary ÷ Hours per week</code> — the form to use when Weekly salary and Hours per week are the values you have.</li><li><strong>Daily salary</strong> = <code>(1 ÷ 5) × Hourly salary × Hours per week</code> — the form to use when Hourly salary and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily salary ÷ Hourly salary</code> — the form to use when Daily salary and Hourly salary are the values you have.</li><li><strong>Hourly salary</strong> = <code>5 × Daily salary ÷ Hours per week</code> — the form to use when Daily salary and Hours per week are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly salary × Hours per week</code> — the form to use when Hourly salary and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>(1 ÷ 52) × Annual salary ÷ Hourly salary</code> — the form to use when Annual salary and Hourly salary are the values you have.</li></ul><p>Any one of Weekly salary, Hours per week and Hourly salary can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hours per week from 40 to 80, leaving every other box alone. The panel moves from <strong>Weekly salary</strong> 4000 USD, <strong>Daily salary</strong> 800 USD, <strong>Annual salary</strong> 208000 USD, <strong>Monthly salary</strong> 17333 USD, <strong>Salary per minute</strong> 1.67 USD, <strong>Salary per second</strong> 0.0278 USD and <strong>Biweekly salary</strong> 8000 USD to <strong>Weekly salary</strong> 8000 USD, <strong>Daily salary</strong> 1600 USD, <strong>Annual salary</strong> 416000 USD, <strong>Monthly salary</strong> 34667 USD, <strong>Salary per minute</strong> 1.67 USD, <strong>Salary per second</strong> 0.0278 USD and <strong>Biweekly salary</strong> 16000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual salary, Monthly salary and Weekly salary are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly salary left as a guess.</strong> Anything typed into Hourly salary is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hours per week and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hours per week</strong> takes a plain number with no unit attached. The page reads it when it works out Weekly salary, Hourly salary and Daily salary. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly salary</strong> takes a plain number with no unit attached. The page reads it when it works out Weekly salary, Hours per week and Daily salary. Have it to hand before you start: Hourly salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 208000. The value follows from Hourly salary and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly salary</strong> is a plain number and the page's own defaults put it at 17333. The value follows from Hourly salary and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Weekly salary</strong> is a plain number and the page's own defaults put it at 4000. The value follows from Hourly salary and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Daily salary</strong> is a plain number and the page's own defaults put it at 800. The value follows from Hourly salary and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Biweekly salary</strong> is a plain number and the page's own defaults put it at 8000. The value follows from Hourly salary and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Salary per minute</strong> is a plain number and the page's own defaults put it at 1.67. The value follows from Hourly salary. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Salary per second</strong> is a plain number and the page's own defaults put it at 0.0278. The value follows from Hourly salary. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly salary</th><th>Daily salary</th><th>Annual salary</th><th>Monthly salary</th><th>Salary per minute</th><th>Salary per second</th><th>Biweekly salary</th></tr></thead><tbody><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Hourly salary</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Hourly salary: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hours per week = 20 and Hourly salary = 50 USD, the answer is <strong>Weekly salary</strong> = 1000 USD, <strong>Daily salary</strong> = 200 USD, <strong>Annual salary</strong> = 52000 USD, <strong>Monthly salary</strong> = 4333 USD, <strong>Salary per minute</strong> = 0.8333 USD, <strong>Salary per second</strong> = 0.0139 USD and <strong>Biweekly salary</strong> = 2000 USD.</li><li>With Hours per week = 120 and Hourly salary = 100 USD, the answer is <strong>Weekly salary</strong> = 12000 USD, <strong>Daily salary</strong> = 2400 USD, <strong>Annual salary</strong> = 624000 USD, <strong>Monthly salary</strong> = 52000 USD, <strong>Salary per minute</strong> = 1.67 USD, <strong>Salary per second</strong> = 0.0278 USD and <strong>Biweekly salary</strong> = 24000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual salary is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hours per week and Hourly salary measured, Annual salary and Monthly salary wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/stimulus-heroes">Second stimulus check - HEROES Act Calculator</a>, <a href="/finance/second-stimulus-check">Second stimulus check</a> and <a href="/finance/sell-through-rate">Sell-through rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annual to monthly salary calculator work out?', 'a' => <<<'TXT'
            Annual salary, Monthly salary, Weekly salary and Daily salary, from Hourly salary and Hours per week. The relationship is Weekly salary = Hourly salary × Hours per week.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hours per week, Hourly salary (USD). With hours per week and hourly salary in place, Annual salary can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly salary, Hours per week, Hourly salary and Daily salary blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly salary = 4000 USD, Daily salary = 800 USD, Annual salary = 208000 USD, Monthly salary = 17333 USD, Salary per minute = 1.67 USD, Salary per second = 0.0278 USD and Biweekly salary = 8000 USD. Those are the defaults written into the form — move Hours per week and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annual salary is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annual salary keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/stimulus-heroes', 'name' => 'Second stimulus check - HEROES Act Calculator'],
            ['path' => '/finance/second-stimulus-check', 'name' => 'Second stimulus check'],
            ['path' => '/finance/sell-through-rate', 'name' => 'Sell-through rate Calculator'],
        ],
        'authors' => [],
    ],
];
