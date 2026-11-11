<?php

/**
 * Hours Calculator
 * /everyday-life/hours
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hours Calculator',
    'meta' => ['title' => 'Hours — A Week of Shifts and What the Overtime Is', 'description' => 'Thirty-eight weekday hours, five on Saturday and two on Sunday is forty-five: the week total, the hours over the threshold and what the overtime pays.', 'h1' => 'Hours Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'weekday_hours',
                    'label' => 'Total weekday hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '38',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'saturday_hours',
                    'label' => 'Saturday hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sunday_hours',
                    'label' => 'Sunday hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'threshold',
                    'label' => 'Overtime after',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '40',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate',
                    'label' => 'Hourly rate',
                    'type' => 'number',
                    'suffix' => '$/h',
                    'default' => '21',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Hours this week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'overtime',
                    'label' => 'Hours of overtime',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'regular_pay',
                    'label' => 'Regular pay',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'overtime_pay',
                    'label' => 'Overtime pay',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'total_pay',
                    'label' => 'Total pay',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'total_hours' => 'weekday_hours + saturday_hours + sunday_hours',
        'overtime' => 'max(0, weekday_hours + saturday_hours + sunday_hours - threshold)',
        'regular_pay' => 'min(weekday_hours + saturday_hours + sunday_hours, threshold) * rate',
        'overtime_pay' => 'max(0, weekday_hours + saturday_hours + sunday_hours - threshold) * rate * 1.5',
        'total_pay' => 'min(weekday_hours + saturday_hours + sunday_hours, threshold) * rate + max(0, weekday_hours + saturday_hours + sunday_hours - threshold) * rate * 1.5',
    ],
    'article' => [
        'intro' => 'A week of hours added up from the days worked, with the hours past a threshold priced at a higher rate and the two parts of the pay kept apart.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A week of hours is a single sum, and the pay on top of it is not. The first forty hours are paid at the rate; the five past forty are paid at time and a half, and the two figures have to be kept apart because they are taxed and recorded differently.</p><p>In this week the days come to 45, so forty hours are regular and five are overtime. At 21 an hour that is 840 plus 157.50, and the 997.50 is not the same number as 45 hours at 21 — which would be 945, understating the overtime by 52.50.</p><p>The answer is <strong>hours this week and hours of overtime and regular pay and overtime pay and total pay</strong>, worked out from total weekday hours and saturday hours and sunday hours and overtime after and hourly rate. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_hours</strong></td><td><code>Total weekday hours + Saturday hours + Sunday hours</code></td></tr><tr><td><strong>overtime</strong></td><td><code>max(0, Total weekday hours + Saturday hours + Sunday hours - Overtime after)</code></td></tr><tr><td><strong>regular_pay</strong></td><td><code>min(Total weekday hours + Saturday hours + Sunday hours, Overtime after) × Hourly rate</code></td></tr><tr><td><strong>overtime_pay</strong></td><td><code>max(0, Total weekday hours + Saturday hours + Sunday hours - Overtime after) × Hourly rate × 1.5</code></td></tr><tr><td><strong>total_pay</strong></td><td><code>min(Total weekday hours + Saturday hours + Sunday hours, Overtime after) × Hourly rate + max(0, Total weekday hours + Saturday hours + Sunday hours - Overtime after) × Hourly rate × 1.5</code></td></tr></tbody></table><p>The three day totals add to the week. Anything over the threshold is overtime, paid at one and a half times the rate, and the rest is paid at the rate.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports hours this week and hours of overtime and regular pay and overtime pay and total pay.</p><ul><li><strong>Total weekday hours</strong> — h.</li><li><strong>Saturday hours</strong> — h.</li><li><strong>Sunday hours</strong> — h.</li><li><strong>Overtime after</strong> — h.</li><li><strong>Hourly rate</strong> — $/h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours this week</strong> — h.</li><li><strong>Hours of overtime</strong> — h.</li><li><strong>Regular pay</strong> — $.</li><li><strong>Overtime pay</strong> — $.</li><li><strong>Total pay</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put total weekday hours = 38 h, saturday hours = 5 h, sunday hours = 2 h, overtime after = 40 h, hourly rate = 21 $/h into the form and the panel reads:</p><ul><li><strong>Hours this week</strong> = <code>Total weekday hours + Saturday hours + Sunday hours</code> = <strong>45 h</strong></li><li><strong>Hours of overtime</strong> = <code>max(0, Total weekday hours + Saturday hours + Sunday hours - Overtime after)</code> = <strong>5 h</strong></li><li><strong>Regular pay</strong> = <code>min(Total weekday hours + Saturday hours + Sunday hours, Overtime after) × Hourly rate</code> = <strong>840 $</strong></li><li><strong>Overtime pay</strong> = <code>max(0, Total weekday hours + Saturday hours + Sunday hours - Overtime after) × Hourly rate × 1.5</code> = <strong>157.5 $</strong></li><li><strong>Total pay</strong> = <code>min(Total weekday hours + Saturday hours + Sunday hours, Overtime after) × Hourly rate + max(0, Total weekday hours + Saturday hours + Sunday hours - Overtime after) × Hourly rate × 1.5</code> = <strong>997.5 $</strong></li></ul><p>Drop Sunday and the week is 43 hours with three of overtime, 861.50 in total — two hours of Sunday pays 63, which is the rate doing the arithmetic.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>38 + 5 + 2</code>, which comes to <strong>45 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>38 weekday hours, 5 on Saturday and 2 on Sunday come to 45. Five are overtime: 840 regular pay, 157.50 overtime and 997.50 for the week.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours this week</th><th>Hours of overtime</th><th>Regular pay</th><th>Overtime pay</th><th>Total pay</th></tr></thead><tbody><tr><td><strong>Total weekday hours</strong> +10 %</td><td>+8.44 %</td><td>+76 %</td><td>+0 %</td><td>+76 %</td><td>+12 %</td></tr><tr><td><strong>Saturday hours</strong> +10 %</td><td>+1.11 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+1.58 %</td></tr><tr><td><strong>Sunday hours</strong> +10 %</td><td>+0.44 %</td><td>+4 %</td><td>+0 %</td><td>+4 %</td><td>+0.63 %</td></tr><tr><td><strong>Overtime after</strong> +10 %</td><td>+0 %</td><td>−80 %</td><td>+10 %</td><td>−80 %</td><td>−4.21 %</td></tr><tr><td><strong>Hourly rate</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Overtime after</strong>. <strong>Sunday hours</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Total weekday hours</strong> opens at 38 h</li><li><strong>Saturday hours</strong> opens at 5 h</li><li><strong>Sunday hours</strong> opens at 2 h</li><li><strong>Overtime after</strong> opens at 40 h</li><li><strong>Hourly rate</strong> opens at 21 $/h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Total weekday hours</th><th>Hours this week</th><th>Hours of overtime</th><th>Regular pay</th><th>Overtime pay</th><th>Total pay</th></tr></thead><tbody><tr><td>19 h</td><td>26</td><td>0</td><td>546</td><td>0</td><td>546</td></tr><tr><td>38 h</td><td>45</td><td>5</td><td>840</td><td>157.5</td><td>997.5</td></tr><tr><td>76 h</td><td>83</td><td>43</td><td>840</td><td>1 354.5</td><td>2 194.5</td></tr><tr><td>190 h</td><td>197</td><td>157</td><td>840</td><td>4 945.5</td><td>5 785.5</td></tr><tr><td>380 h</td><td>387</td><td>347</td><td>840</td><td>10 930.5</td><td>11 770.5</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set total weekday hours = 38, saturday hours = 5, sunday hours = 0, overtime after = 40, hourly rate = 21: <strong>Hours this week</strong> = 43 h, <strong>Hours of overtime</strong> = 3 h, <strong>Regular pay</strong> = 840 $, <strong>Overtime pay</strong> = 94.5 $, <strong>Total pay</strong> = 934.5 $. Without Sunday the week is 43 hours, three of overtime, and 861.50 — the two Sunday hours were worth 63.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Paying every hour at the rate.</strong> Forty-five hours at 21 is 945, and the overtime owed is 52.50 more than that. The error is always in the employee's favour and it is always wrong.</li><li><strong>Assuming the threshold is daily.</strong> Some jurisdictions count overtime after eight hours a day rather than forty a week, and a long Tuesday then has overtime in it even if the week does not.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One multiplier.</strong> Weekend rates, night rates and public holidays often differ from the time and a half used here.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need total weekday hours and saturday hours and sunday hours and overtime after and hourly rate. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours this week and hours of overtime and regular pay and overtime pay and total pay should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a weekly payslip before it is queried.</li></li><li><li>Deciding whether a Saturday shift is worth taking.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-card">Time card</a> <a href="/everyday-life/time-to-hours-conversion">Time to hours</a> <a href="/everyday-life/8-hour-shift">Eight-hour shift</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Total weekday hours</strong> ×10</td><td>45</td><td>387</td><td>×8.6</td></tr><tr><td><strong>Saturday hours</strong> ×10</td><td>45</td><td>90</td><td>×2</td></tr><tr><td><strong>Sunday hours</strong> ×10</td><td>45</td><td>63</td><td>×1.4</td></tr><tr><td><strong>Overtime after</strong> ×10</td><td>45</td><td>45</td><td>unchanged</td></tr><tr><td><strong>Hourly rate</strong> ×10</td><td>45</td><td>45</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hours calculator work out?', 'a' => <<<'TXT'
            It returns hours this week and hours of overtime and regular pay and overtime pay and total pay from total weekday hours and saturday hours and sunday hours and overtime after and hourly rate. The relationship is Total weekday hours + Saturday hours + Sunday hours.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Total weekday hours (h), Saturday hours (h), Sunday hours (h), Overtime after (h), Hourly rate ($/h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: total weekday hours in h; saturday hours in h; sunday hours in h; overtime after in h; hourly rate in $/h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is time and a half on 21 an hour?', 'a' => '31.50. Multiply the rate by one and a half, and check the overtime line against it rather than the base rate.'],
            ['q' => 'Does overtime start after eight hours a day or forty a week?', 'a' => <<<'TXT'
            It depends where you work. The United States uses forty a week federally, several states use eight a day, and most of Europe has no weekly overtime threshold at all.
            TXT],
            ['q' => 'Is overtime taxed more?', 'a' => 'No. It is taxed at the same rates, but a larger payslip can cross a withholding band and appear to be taxed more.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
            ['path' => '/everyday-life/time-to-hours-conversion', 'name' => 'Time to hours'],
            ['path' => '/everyday-life/8-hour-shift', 'name' => 'Eight-hour shift'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
