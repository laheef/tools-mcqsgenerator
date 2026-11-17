<?php

/**
 * Weekly pay
 * /finance/weekly-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Weekly pay',
    'meta' => ['title' => 'Weekly pay Calculator: Formula, Steps & Examples', 'description' => 'Weekly pay works out daily pay and monthly pay from hourly wage, hours per week and days per week. Results come back in USD, with any other unit a click away.', 'h1' => 'Weekly pay Calculator', 'updated' => '2026-01-22'],
    'sections' => [
        [
            'title' => 'Data',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hourly == 15 and hours_per_week == 40 and days_per_week == 5', 'text' => 'Onim Example 1: Hourly wage — If you earn $15 per hour and work 8&nbsp;hours a day, 5 days a week, what\'s your weekly pay?&nbsp;'],
                                ['when' => 'weekly == 692.31 and hours_per_week == 40 and days_per_week == 5', 'text' => 'Onim Example 2: Monthly salary — If your weekly pay is $692.31, what\'s your monthly salary?'],
                            ],
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
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily',
                            'label' => 'Daily pay',
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
                            'name' => 'monthly',
                            'label' => 'Monthly pay',
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
        [
            'title' => 'Hours and days you work',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly',
                            'label' => 'Weekly pay',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hourly == 15 and hours_per_week == 40 and days_per_week == 5', 'text' => <<<'TXT'
                                How the result is calculated: Multiply your hourly wage by the number of hours you work per day: 15 × 8 = 120 Multiply the result by the number of days you work per week: 120 × 5 = 600 The final result is your weekly pay: $600.00.&nbsp;
                                TXT],
                                ['when' => 'weekly == 692.31 and hours_per_week == 40 and days_per_week == 5', 'text' => <<<'TXT'
                                How the result is calculated: Take your weekly pay: $692.31. Multiply by 52 (weeks per year) and divide by 12 (months per year): 692.31 × 52/12 = 3000 The final result is your monthly salary: $3,000.00.
                                TXT],
                            ],
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
                        ['type' => 'note', 'text' => 'Check our examples: • Example 1 ⧉ — Hourly wage • Example 2 ⧉ — Monthly salary'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['weekly' => 'hourly*hours_per_week', 'hourly' => 'weekly/hours_per_week', 'hours_per_week' => 'weekly/hourly'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['days_per_week' => 'hourly*hours_per_week/daily', 'daily' => 'hourly*hours_per_week/days_per_week', 'hourly' => 'daily*days_per_week/hours_per_week', 'hours_per_week' => 'daily*days_per_week/hourly'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hourly' => '(1/52)*yearly/hours_per_week', 'hours_per_week' => '(1/52)*yearly/hourly', 'yearly' => '52*hourly*hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hourly' => '(3/13)*monthly/hours_per_week', 'monthly' => '(13/3)*hourly*hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Weekly pay works out Daily pay and Monthly pay from Hourly wage and Hours per week. The arithmetic is the whole method: daily pay is worked out from hourly wage by one formula, applied once. Daily pay comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Weekly pay calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Weekly pay: it takes 2 numbers and reports Daily pay, Monthly pay and Annual salary.</p><p>Written with the labels from the form, Weekly pay = Hourly wage × Hours per week.</p><p>The result panel carries Daily pay, Monthly pay, Annual salary and Days per week, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — a plain number, no unit</li></ul><p>What you get back is Daily pay in USD, Monthly pay in USD, Annual salary in USD, Days per week, Weekly pay in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hourly wage = 10 USD, Daily pay = 100 USD, Monthly pay = 1000 USD, Annual salary = 10 USD, Hours per week = 40 and Days per week = 5; the answers are <strong>Weekly pay</strong> = 400 USD.</p><ul><li><strong>Weekly pay</strong> = 400 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly pay</strong> = <code>Hourly wage × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly pay</strong> = 400. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Daily pay is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly pay</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hourly wage</strong> = <code>Weekly pay ÷ Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly pay ÷ Hourly wage</code></li><li><strong>Daily pay</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily pay</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly pay</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly pay ÷ Hours per week</code> — the form to use when Weekly pay and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly pay ÷ Hourly wage</code> — the form to use when Weekly pay and Hourly wage are the values you have.</li><li><strong>Daily pay</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily pay</code> — the form to use when Hourly wage, Hours per week and Daily pay are the values you have.</li><li><strong>Hourly wage</strong> = <code>Daily pay × Days per week ÷ Hours per week</code> — the form to use when Daily pay, Days per week and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily pay × Days per week ÷ Hourly wage</code> — the form to use when Daily pay, Days per week and Hourly wage are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Any one of Weekly pay, Hourly wage and Hours per week can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hourly wage, from 10 to 20 — and the answers go from <strong>Weekly pay</strong> 400 USD to <strong>Weekly pay</strong> 800 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Daily pay, Monthly pay and Annual salary are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hourly wage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Weekly pay form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. The page reads it when it works out Weekly pay, Hours per week and Days per week. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> takes a plain number with no unit attached. The page reads it when it works out Weekly pay, Hourly wage and Days per week. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Daily pay</strong> is a plain number. The value follows from Hourly wage, Hours per week and Days per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly pay</strong> is a plain number. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual salary</strong> is a plain number. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Days per week</strong> is a plain number. The value follows from Hourly wage, Hours per week and Daily pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Weekly pay</strong> is a plain number and the page's own defaults put it at 400. The value follows from Hourly wage and Hours per week. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly pay</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Daily pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual salary</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days per week</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Daily pay, Monthly pay and Annual salary barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hourly wage = 5 USD, Daily pay = 50 USD, Monthly pay = 500 USD, Annual salary = 5 USD, Hours per week = 20 and Days per week = 2.5 and the page reports <strong>Weekly pay</strong> = 100 USD.</li><li>Feed in Hourly wage = 30 USD, Daily pay = 100 USD, Monthly pay = 1000 USD, Annual salary = 10 USD, Hours per week = 40 and Days per week = 5 and the page reports <strong>Weekly pay</strong> = 1200 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Daily pay is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly wage and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hourly wage and Hours per week measured, Daily pay and Monthly pay wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/attrition-rate">Attrition rate</a>, <a href="/finance/auto-loan">Auto loan</a> and <a href="/finance/average-collection">Average collection period Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Weekly pay calculator work out?', 'a' => 'Daily pay, Monthly pay, Annual salary and Days per week, from Hourly wage and Hours per week. The relationship is Weekly pay = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week. Fill hourly wage and hours per week and leave Daily pay empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Weekly pay, Hourly wage, Hours per week and Daily pay blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Weekly pay = 400 USD. That comes from the page\'s own defaults, entered in Hourly wage; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Daily pay is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly wage blank and the page solves for it, reporting Daily pay instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily pay at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/attrition-rate', 'name' => 'Attrition rate'],
            ['path' => '/finance/auto-loan', 'name' => 'Auto loan'],
            ['path' => '/finance/average-collection', 'name' => 'Average collection period Calculator'],
        ],
        'authors' => [],
    ],
];
