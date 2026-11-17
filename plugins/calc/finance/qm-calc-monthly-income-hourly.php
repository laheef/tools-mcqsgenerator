<?php

/**
 * Monthly income hourly
 * /finance/monthly-income-hourly
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Monthly income hourly',
    'meta' => ['title' => 'Monthly income hourly Calculator: Free, With Steps', 'description' => 'Monthly income hourly takes hours per week and hourly income and returns annual income and biweekly income. The formula is printed in the form\'s own words.', 'h1' => 'Monthly income hourly Calculator', 'updated' => '2024-07-25'],
    'sections' => [
        [
            'title' => 'Your income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly income',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly',
                            'label' => 'Hourly income',
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
            'title' => 'Other income measures',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly',
                            'label' => 'Annual income',
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
                            'name' => 'biweekly',
                            'label' => 'Biweekly income',
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
                            'label' => 'Weekly income',
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
                            'label' => 'Daily income',
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
                            'label' => 'Per minute income',
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
                            'label' => 'Per second income',
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
            'results' => ['hourly' => 'weekly/hours_per_week', 'hours_per_week' => 'weekly/hourly', 'weekly' => 'hourly*hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / 5',
            'results' => ['daily' => '(1/5)*hourly*hours_per_week', 'hourly' => '5*daily/hours_per_week', 'hours_per_week' => '5*daily/hourly'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hourly' => '(1/52)*yearly/hours_per_week', 'hours_per_week' => '(1/52)*yearly/hourly', 'yearly' => '52*hourly*hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hourly' => '(3/13)*monthly/hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly', 'monthly' => '(13/3)*hourly*hours_per_week'],
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
            'results' => ['hourly' => '(1/2)*biweekly/hours_per_week', 'hours_per_week' => '(1/2)*biweekly/hourly', 'biweekly' => '2*hourly*hours_per_week'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Monthly income hourly takes Hours per week and Hourly income and returns Monthly income and Annual income. The arithmetic is the whole method: monthly income is worked out from hours per week by one formula, applied once. Monthly income comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Monthly income hourly calculator works', 'html' => <<<'TXT'
            <p>The Monthly income hourly calculator applies one relationship to 2 numbers and reports Monthly income, Annual income and Biweekly income.</p><p>The relationship it solves reads Weekly income = Hourly income × Hours per week.</p><p>The result panel carries Monthly income, Annual income, Biweekly income and Weekly income, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Hours per week</strong> — a plain number, no unit</li><li><strong>Hourly income</strong> — in USD</li></ul><p>The answers come back as Monthly income in USD, Annual income in USD, Biweekly income in USD, Weekly income in USD, Daily income in USD, Per minute income in USD, Per second income in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Hours per week = 40 and Hourly income = 100 USD — through the same formula and the panel reports <strong>Weekly income</strong> = 4000 USD, <strong>Daily income</strong> = 800 USD, <strong>Annual income</strong> = 208000 USD, <strong>Monthly income</strong> = 17333 USD, <strong>Per minute income</strong> = 1.67 USD, <strong>Per second income</strong> = 0.0278 USD and <strong>Biweekly income</strong> = 8000 USD.</p><ul><li><strong>Weekly income</strong> = 4000 USD</li><li><strong>Daily income</strong> = 800 USD</li><li><strong>Annual income</strong> = 208000 USD</li><li><strong>Monthly income</strong> = 17333 USD</li><li><strong>Per minute income</strong> = 1.67 USD</li><li><strong>Per second income</strong> = 0.0278 USD</li><li><strong>Biweekly income</strong> = 8000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly income</strong> = <code>Hourly income × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Weekly income</strong> = 4000, <strong>Daily income</strong> = 800, <strong>Annual income</strong> = 208000, <strong>Monthly income</strong> = 17333, <strong>Per minute income</strong> = 1.67, <strong>Per second income</strong> = 0.0278 and <strong>Biweekly income</strong> = 8000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Monthly income takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weekly income</strong> = <code>Hourly income × Hours per week</code></li><li><strong>Hourly income</strong> = <code>Weekly income ÷ Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly income ÷ Hourly income</code></li><li><strong>Daily income</strong> = <code>(1 ÷ 5) × Hourly income × Hours per week</code></li><li><strong>Annual income</strong> = <code>52 × Hourly income × Hours per week</code></li><li><strong>Monthly income</strong> = <code>(13 ÷ 3) × Hourly income × Hours per week</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weekly income</strong> = <code>Hourly income × Hours per week</code> — the form to use when Hourly income and Hours per week are the values you have.</li><li><strong>Hourly income</strong> = <code>Weekly income ÷ Hours per week</code> — the form to use when Weekly income and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly income ÷ Hourly income</code> — the form to use when Weekly income and Hourly income are the values you have.</li><li><strong>Daily income</strong> = <code>(1 ÷ 5) × Hourly income × Hours per week</code> — the form to use when Hourly income and Hours per week are the values you have.</li><li><strong>Hourly income</strong> = <code>5 × Daily income ÷ Hours per week</code> — the form to use when Daily income and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily income ÷ Hourly income</code> — the form to use when Daily income and Hourly income are the values you have.</li><li><strong>Annual income</strong> = <code>52 × Hourly income × Hours per week</code> — the form to use when Hourly income and Hours per week are the values you have.</li><li><strong>Hourly income</strong> = <code>(1 ÷ 52) × Annual income ÷ Hours per week</code> — the form to use when Annual income and Hours per week are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weekly income, Hourly income and Hours per week can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hours per week, from 40 to 80 — and the answers go from <strong>Weekly income</strong> 4000 USD, <strong>Daily income</strong> 800 USD, <strong>Annual income</strong> 208000 USD, <strong>Monthly income</strong> 17333 USD, <strong>Per minute income</strong> 1.67 USD, <strong>Per second income</strong> 0.0278 USD and <strong>Biweekly income</strong> 8000 USD to <strong>Weekly income</strong> 8000 USD, <strong>Daily income</strong> 1600 USD, <strong>Annual income</strong> 416000 USD, <strong>Monthly income</strong> 34667 USD, <strong>Per minute income</strong> 1.67 USD, <strong>Per second income</strong> 0.0278 USD and <strong>Biweekly income</strong> 16000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Monthly income, Annual income and Biweekly income are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hours per week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hours per week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hourly income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hours per week and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Monthly income hourly form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hours per week</strong> takes a plain number with no unit attached. The page reads it when it works out Hourly income, Weekly income and Daily income. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hourly income</strong> takes a plain number with no unit attached. The page reads it when it works out Hours per week, Weekly income and Daily income. Fill it from a measurement rather than a memory — Hourly income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Monthly income</strong> is a plain number and the page's own defaults put it at 17333. It is computed from Hourly income and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual income</strong> is a plain number and the page's own defaults put it at 208000. It is computed from Hourly income and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Biweekly income</strong> is a plain number and the page's own defaults put it at 8000. It is computed from Hourly income and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly income</strong> is a plain number and the page's own defaults put it at 4000. It is computed from Hourly income and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Daily income</strong> is a plain number and the page's own defaults put it at 800. It is computed from Hourly income and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Per minute income</strong> is a plain number and the page's own defaults put it at 1.67. It is computed from Hourly income, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Per second income</strong> is a plain number and the page's own defaults put it at 0.0278. It is computed from Hourly income, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly income</th><th>Daily income</th><th>Annual income</th><th>Monthly income</th><th>Per minute income</th><th>Per second income</th><th>Biweekly income</th></tr></thead><tbody><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Hourly income</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Hourly income sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hours per week = 20 and Hourly income = 50 USD and the page reports <strong>Weekly income</strong> = 1000 USD, <strong>Daily income</strong> = 200 USD, <strong>Annual income</strong> = 52000 USD, <strong>Monthly income</strong> = 4333 USD, <strong>Per minute income</strong> = 0.8333 USD, <strong>Per second income</strong> = 0.0139 USD and <strong>Biweekly income</strong> = 2000 USD.</li><li>Feed in Hours per week = 120 and Hourly income = 100 USD and the page reports <strong>Weekly income</strong> = 12000 USD, <strong>Daily income</strong> = 2400 USD, <strong>Annual income</strong> = 624000 USD, <strong>Monthly income</strong> = 52000 USD, <strong>Per minute income</strong> = 1.67 USD, <strong>Per second income</strong> = 0.0278 USD and <strong>Biweekly income</strong> = 24000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Monthly income follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Hours per week and Hourly income and the number you are missing is Monthly income and Annual income.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/student-loan-repayment-us">Student Loan Repayment - Covid</a>, <a href="/finance/subscription-waste">Subscription waste Calculator</a> and <a href="/finance/sustainable-growth-rate">Sustainable growth rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Monthly income hourly calculator work out?', 'a' => <<<'TXT'
            Monthly income, Annual income, Biweekly income and Weekly income, from Hourly income and Hours per week. The relationship is Weekly income = Hourly income × Hours per week.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hours per week, Hourly income (USD). Enter hours per week and hourly income; Monthly income is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Weekly income, Hourly income, Hours per week and Daily income can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly income = 4000 USD, Daily income = 800 USD, Annual income = 208000 USD, Monthly income = 17333 USD, Per minute income = 1.67 USD, Per second income = 0.0278 USD and Biweekly income = 8000 USD. Those are the defaults written into the form — move Hours per week and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Monthly income is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hours per week blank and the page solves for it, reporting Monthly income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Monthly income keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/student-loan-repayment-us', 'name' => 'Student Loan Repayment - Covid'],
            ['path' => '/finance/subscription-waste', 'name' => 'Subscription waste Calculator'],
            ['path' => '/finance/sustainable-growth-rate', 'name' => 'Sustainable growth rate Calculator'],
        ],
        'authors' => [],
    ],
];
