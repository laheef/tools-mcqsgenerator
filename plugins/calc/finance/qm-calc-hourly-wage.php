<?php

/**
 * Hourly wage
 * /finance/hourly-wage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hourly wage',
    'meta' => ['title' => 'Hourly wage Calculator — Formula, Units & Example', 'description' => 'Hourly wage reports per second, per minute, daily wage and weekly wage. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Hourly wage Calculator', 'updated' => '2024-07-19'],
    'sections' => [
        [
            'title' => 'Hourly wage',
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
                            'rounding' => ['omni', '0.000001'],
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
            'title' => 'Salary for time frames',
            'note' => '',
            'blocks' => [
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
                            'name' => 'weekly',
                            'label' => 'Weekly wage',
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
                            'label' => 'Biweekly wage',
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
    ],
    'formula' => [
        [
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['hours_per_week' => 'weekly/hourly', 'hourly' => 'weekly/hours_per_week', 'weekly' => 'hourly*hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / 5',
            'results' => ['daily' => '(1/5)*hourly*hours_per_week', 'hours_per_week' => '5*daily/hourly', 'hourly' => '5*daily/hours_per_week'],
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
            'results' => ['per_minute' => '(1/60)*hourly', 'hourly' => '60*per_minute'],
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
        Enter Hourly wage and Hours per week into Hourly wage and the answer comes back as Per second and Per minute. Nothing is looked up on this page: per second is computed from hourly wage and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Per second is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Hourly wage calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hourly wage: it takes 2 numbers and reports Per second, Per minute and Daily wage.</p><p>The relationship it solves reads Weekly wage = Hourly wage × Hours per week.</p><p>The result panel carries Per second, Per minute, Daily wage and Weekly wage, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — a plain number, no unit</li></ul><p>What you get back is Per second in USD, Per minute in USD, Daily wage in USD, Weekly wage in USD, Biweekly wage in USD, Monthly wage in USD, Annual salary in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Hourly wage = 10 USD and Hours per week = 40 — through the same formula and the panel reports <strong>Weekly wage</strong> = 400 USD, <strong>Daily wage</strong> = 80 USD, <strong>Annual salary</strong> = 20800 USD, <strong>Monthly wage</strong> = 1733 USD, <strong>Per minute</strong> = 0.1667 USD, <strong>Per second</strong> = 0.0028 USD and <strong>Biweekly wage</strong> = 800 USD.</p><ul><li><strong>Weekly wage</strong> = 400 USD</li><li><strong>Daily wage</strong> = 80 USD</li><li><strong>Annual salary</strong> = 20800 USD</li><li><strong>Monthly wage</strong> = 1733 USD</li><li><strong>Per minute</strong> = 0.1667 USD</li><li><strong>Per second</strong> = 0.0028 USD</li><li><strong>Biweekly wage</strong> = 800 USD</li></ul><p>That is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly wage</strong> = 400, <strong>Daily wage</strong> = 80, <strong>Annual salary</strong> = 20800, <strong>Monthly wage</strong> = 1733, <strong>Per minute</strong> = 0.1667, <strong>Per second</strong> = 0.0028 and <strong>Biweekly wage</strong> = 800. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Per second is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li><li><strong>Monthly wage</strong> = <code>(13 ÷ 3) × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily wage ÷ Hourly wage</code> — the form to use when Daily wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>5 × Daily wage ÷ Hours per week</code> — the form to use when Daily wage and Hours per week are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>(1 ÷ 52) × Annual salary ÷ Hourly wage</code> — the form to use when Annual salary and Hourly wage are the values you have.</li></ul><p>Any one of Weekly wage, Hours per week and Hourly wage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hourly wage, from 10 to 20 — and the answers go from <strong>Weekly wage</strong> 400 USD, <strong>Daily wage</strong> 80 USD, <strong>Annual salary</strong> 20800 USD, <strong>Monthly wage</strong> 1733 USD, <strong>Per minute</strong> 0.1667 USD, <strong>Per second</strong> 0.0028 USD and <strong>Biweekly wage</strong> 800 USD to <strong>Weekly wage</strong> 800 USD, <strong>Daily wage</strong> 160 USD, <strong>Annual salary</strong> 41600 USD, <strong>Monthly wage</strong> 3467 USD, <strong>Per minute</strong> 0.3333 USD, <strong>Per second</strong> 0.0056 USD and <strong>Biweekly wage</strong> 1600 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Per second, Per minute and Daily wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hourly wage and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Hourly wage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Hours per week, Weekly wage and Daily wage. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> takes a plain number with no unit attached. It feeds Hourly wage, Weekly wage and Daily wage. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Per second</strong> is a plain number and the page's own defaults put it at 0.0028. It is computed from Hourly wage, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Per minute</strong> is a plain number and the page's own defaults put it at 0.1667. It is computed from Hourly wage, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Daily wage</strong> is a plain number and the page's own defaults put it at 80. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 400. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Biweekly wage</strong> is a plain number and the page's own defaults put it at 800. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly wage</strong> is a plain number and the page's own defaults put it at 1733. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 20800. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th><th>Daily wage</th><th>Annual salary</th><th>Monthly wage</th><th>Per minute</th><th>Per second</th><th>Biweekly wage</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hourly wage = 5 USD and Hours per week = 20 and the page reports <strong>Weekly wage</strong> = 100 USD, <strong>Daily wage</strong> = 20 USD, <strong>Annual salary</strong> = 5200 USD, <strong>Monthly wage</strong> = 433 USD, <strong>Per minute</strong> = 0.0833 USD, <strong>Per second</strong> = 0.0014 USD and <strong>Biweekly wage</strong> = 200 USD.</li><li>Feed in Hourly wage = 30 USD and Hours per week = 40 and the page reports <strong>Weekly wage</strong> = 1200 USD, <strong>Daily wage</strong> = 240 USD, <strong>Annual salary</strong> = 62400 USD, <strong>Monthly wage</strong> = 5200 USD, <strong>Per minute</strong> = 0.5 USD, <strong>Per second</strong> = 0.0083 USD and <strong>Biweekly wage</strong> = 2400 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Per second is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Hourly wage and Hours per week and the number you are missing is Per second and Per minute.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/stimulus-payment">Stimulus payment Calculator</a>, <a href="/finance/stock-average">Stock average Calculator</a> and <a href="/finance/stock">Stock Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hourly wage calculator work out?', 'a' => 'Per second, Per minute, Daily wage and Weekly wage, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week. Enter hourly wage and hours per week; Per second is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly wage, Hours per week, Hourly wage and Daily wage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly wage = 400 USD, Daily wage = 80 USD, Annual salary = 20800 USD, Monthly wage = 1733 USD, Per minute = 0.1667 USD, Per second = 0.0028 USD and Biweekly wage = 800 USD. The figures come from Hourly wage as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Per second is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly wage blank and the page solves for it, reporting Per second instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Per second keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/stimulus-payment', 'name' => 'Stimulus payment Calculator'],
            ['path' => '/finance/stock-average', 'name' => 'Stock average Calculator'],
            ['path' => '/finance/stock', 'name' => 'Stock Calculator'],
        ],
        'authors' => [],
    ],
];
