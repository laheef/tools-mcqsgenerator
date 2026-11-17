<?php

/**
 * Annual salary per hour
 * /finance/annual-salary-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annual salary per hour',
    'meta' => ['title' => 'Annual salary per hour Calculator: Free, With Steps', 'description' => 'Annual salary per hour works out daily wage and weekly wage and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Annual salary per hour Calculator', 'updated' => '2024-06-30'],
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
        [
            'title' => 'Other periods',
            'note' => '',
            'blocks' => [
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
                            'name' => 'per_minute',
                            'label' => 'Per minute',
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
                            'label' => 'Per second',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
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
            'results' => ['weekly_wage' => 'hourly_wage*hours_per_week', 'hours_per_week' => 'weekly_wage/hourly_wage', 'hourly_wage' => 'weekly_wage/hours_per_week'],
        ],
        [
            'title' => 'daily_wage = hourly_wage * hours_per_week / 5',
            'results' => ['daily_wage' => '(1/5)*hourly_wage*hours_per_week', 'hours_per_week' => '5*daily_wage/hourly_wage', 'hourly_wage' => '5*daily_wage/hours_per_week'],
        ],
        [
            'title' => 'annual_salary = hourly_wage * hours_per_week * 52',
            'results' => ['hours_per_week' => '(1/52)*annual_salary/hourly_wage', 'annual_salary' => '52*hourly_wage*hours_per_week', 'hourly_wage' => '(1/52)*annual_salary/hours_per_week'],
        ],
        [
            'title' => 'monthly_wage = hourly_wage * hours_per_week * 52 / 12',
            'results' => ['monthly_wage' => '(13/3)*hourly_wage*hours_per_week', 'hours_per_week' => '(3/13)*monthly_wage/hourly_wage', 'hourly_wage' => '(3/13)*monthly_wage/hours_per_week'],
        ],
        [
            'title' => 'per_minute = hourly_wage / 60',
            'results' => ['per_minute' => '(1/60)*hourly_wage', 'hourly_wage' => '60*per_minute'],
        ],
        [
            'title' => 'per_second = hourly_wage / 3600',
            'results' => ['per_second' => '(1/3600)*hourly_wage', 'hourly_wage' => '3600*per_second'],
        ],
        [
            'title' => 'biweekly_wage = hourly_wage * hours_per_week * 2',
            'results' => ['biweekly_wage' => '2*hourly_wage*hours_per_week', 'hours_per_week' => '(1/2)*biweekly_wage/hourly_wage', 'hourly_wage' => '(1/2)*biweekly_wage/hours_per_week'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annual salary per hour works out Daily wage and Weekly wage from Hours per week and Hourly wage. Nothing is looked up on this page: daily wage is computed from hours per week and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Daily wage is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Annual salary per hour calculator works', 'html' => <<<'TXT'
            <p>Annual salary per hour answers one question from 2 numbers, and the answer is Daily wage, Weekly wage and Monthly wage.</p><p>The relationship it solves reads Weekly wage = Hourly wage × Hours per week.</p><p>What comes back is Daily wage, Weekly wage, Monthly wage and Annual salary — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hours per week</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>The result boxes are Daily wage in USD, Weekly wage in USD, Monthly wage in USD, Annual salary in USD, Biweekly wage in USD, Per minute in USD, Per second in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hours per week = 40 and Hourly wage = 100 USD; the answers are <strong>Weekly wage</strong> = 4000 USD, <strong>Daily wage</strong> = 800 USD, <strong>Annual salary</strong> = 208000 USD, <strong>Monthly wage</strong> = 17333 USD, <strong>Per minute</strong> = 1.67 USD, <strong>Per second</strong> = 0.0278 USD and <strong>Biweekly wage</strong> = 8000 USD.</p><ul><li><strong>Weekly wage</strong> = 4000 USD</li><li><strong>Daily wage</strong> = 800 USD</li><li><strong>Annual salary</strong> = 208000 USD</li><li><strong>Monthly wage</strong> = 17333 USD</li><li><strong>Per minute</strong> = 1.67 USD</li><li><strong>Per second</strong> = 0.0278 USD</li><li><strong>Biweekly wage</strong> = 8000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly wage</strong> = 4000, <strong>Daily wage</strong> = 800, <strong>Annual salary</strong> = 208000, <strong>Monthly wage</strong> = 17333, <strong>Per minute</strong> = 1.67, <strong>Per second</strong> = 0.0278 and <strong>Biweekly wage</strong> = 8000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Daily wage is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li><li><strong>Monthly wage</strong> = <code>(13 ÷ 3) × Hourly wage × Hours per week</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily wage ÷ Hourly wage</code> — the form to use when Daily wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>5 × Daily wage ÷ Hours per week</code> — the form to use when Daily wage and Hours per week are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>(1 ÷ 52) × Annual salary ÷ Hourly wage</code> — the form to use when Annual salary and Hourly wage are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weekly wage, Hours per week and Hourly wage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hours per week, from 40 to 80 — and the answers go from <strong>Weekly wage</strong> 4000 USD, <strong>Daily wage</strong> 800 USD, <strong>Annual salary</strong> 208000 USD, <strong>Monthly wage</strong> 17333 USD, <strong>Per minute</strong> 1.67 USD, <strong>Per second</strong> 0.0278 USD and <strong>Biweekly wage</strong> 8000 USD to <strong>Weekly wage</strong> 8000 USD, <strong>Daily wage</strong> 1600 USD, <strong>Annual salary</strong> 416000 USD, <strong>Monthly wage</strong> 34667 USD, <strong>Per minute</strong> 1.67 USD, <strong>Per second</strong> 0.0278 USD and <strong>Biweekly wage</strong> 16000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Daily wage, Weekly wage and Monthly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hours per week and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hours per week</strong> takes a plain number with no unit attached. Change it and Weekly wage, Hourly wage and Daily wage changes with it. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. Change it and Weekly wage, Hours per week and Daily wage changes with it. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Daily wage</strong> is a plain number and the page's own defaults put it at 800. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 4000. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly wage</strong> is a plain number and the page's own defaults put it at 17333. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 208000. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Biweekly wage</strong> is a plain number and the page's own defaults put it at 8000. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Per minute</strong> is a plain number and the page's own defaults put it at 1.67. It is worked out from Hourly wage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Per second</strong> is a plain number and the page's own defaults put it at 0.0278. It is worked out from Hourly wage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th><th>Daily wage</th><th>Annual salary</th><th>Monthly wage</th><th>Per minute</th><th>Per second</th><th>Biweekly wage</th></tr></thead><tbody><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hours per week = 20 and Hourly wage = 50 USD, the answer is <strong>Weekly wage</strong> = 1000 USD, <strong>Daily wage</strong> = 200 USD, <strong>Annual salary</strong> = 52000 USD, <strong>Monthly wage</strong> = 4333 USD, <strong>Per minute</strong> = 0.8333 USD, <strong>Per second</strong> = 0.0139 USD and <strong>Biweekly wage</strong> = 2000 USD.</li><li>With Hours per week = 120 and Hourly wage = 100 USD, the answer is <strong>Weekly wage</strong> = 12000 USD, <strong>Daily wage</strong> = 2400 USD, <strong>Annual salary</strong> = 624000 USD, <strong>Monthly wage</strong> = 52000 USD, <strong>Per minute</strong> = 1.67 USD, <strong>Per second</strong> = 0.0278 USD and <strong>Biweekly wage</strong> = 24000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Daily wage is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hours per week and Hourly wage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Hours per week and Hourly wage and the number you are missing is Daily wage and Weekly wage.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cell-phone-plan">Cell phone plan Calculator</a>, <a href="/finance/gtin-check-digit">Check digit Calculator</a> and <a href="/finance/child-tax-credit">Child tax credit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annual salary per hour calculator work out?', 'a' => 'Daily wage, Weekly wage, Monthly wage and Annual salary, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hours per week, Hourly wage (USD). Fill hours per week and hourly wage and leave Daily wage empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Weekly wage, Hours per week, Hourly wage and Daily wage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly wage = 4000 USD, Daily wage = 800 USD, Annual salary = 208000 USD, Monthly wage = 17333 USD, Per minute = 1.67 USD, Per second = 0.0278 USD and Biweekly wage = 8000 USD. The figures come from Hours per week as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Daily wage is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Daily wage keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cell-phone-plan', 'name' => 'Cell phone plan Calculator'],
            ['path' => '/finance/gtin-check-digit', 'name' => 'Check digit Calculator'],
            ['path' => '/finance/child-tax-credit', 'name' => 'Child tax credit Calculator'],
        ],
        'authors' => [],
    ],
];
