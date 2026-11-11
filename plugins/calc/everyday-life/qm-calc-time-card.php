<?php

/**
 * Time Card Calculator
 * /everyday-life/time-card
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time Card Calculator',
    'meta' => ['title' => 'Time Card — Hours Worked and Pay from a Shift', 'description' => 'Clock-in, clock-out and an unpaid break give the hours on a time card in decimals, the pay at a given rate, and the same shift across a full working week.', 'h1' => 'Time Card Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'start',
                    'label' => 'Clock in',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '9',
                    'help' => 'On the twenty-four hour clock: 9 is nine in the morning and 13.5 is half past one.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'end',
                    'label' => 'Clock out',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '17.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'break_min',
                    'label' => 'Unpaid break',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate',
                    'label' => 'Hourly rate',
                    'type' => 'number',
                    'suffix' => '$/h',
                    'default' => '22',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours worked',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'pay',
                    'label' => 'Pay for the shift',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'week_pay',
                    'label' => 'Five shifts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes worked',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['hours' => 'end - start - break_min / 60', 'pay' => '(end - start - break_min / 60) * rate', 'week_pay' => '(end - start - break_min / 60) * rate * 5', 'minutes' => '(end - start - break_min / 60) * 60'],
    'article' => [
        'intro' => 'The hours a shift is worth once an unpaid break comes off, the pay at an hourly rate, and what the same shift is over a five-day week.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A shift from nine to half past five looks like eight and a half hours and pays for eight, because half an hour of it was lunch and lunch is not paid.</p><p>The decimal matters. Eight hours is 8.00 on a payroll sheet and eight hours and a half is 8.50, but seven hours and forty minutes is 7.67 — and a timesheet written as 7.40 is wrong by sixteen minutes, which across a year is a shift.</p><p>The answer is <strong>hours worked and pay for the shift and five shifts and minutes worked</strong>, worked out from clock in and clock out and unpaid break and hourly rate. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>Clock out - Clock in - Unpaid break ÷ 60</code></td></tr><tr><td><strong>pay</strong></td><td><code>(Clock out - Clock in - Unpaid break ÷ 60) × Hourly rate</code></td></tr><tr><td><strong>week_pay</strong></td><td><code>(Clock out - Clock in - Unpaid break ÷ 60) × Hourly rate × 5</code></td></tr><tr><td><strong>minutes</strong></td><td><code>(Clock out - Clock in - Unpaid break ÷ 60) × 60</code></td></tr></tbody></table><p>Clock out less clock in less the break in hours gives the shift. Times the rate gives pay, and times five gives a week of the same shift.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports hours worked and pay for the shift and five shifts and minutes worked.</p><ul><li><strong>Clock in</strong> — h. On the twenty-four hour clock: 9 is nine in the morning and 13.5 is half past one.</li><li><strong>Clock out</strong> — h.</li><li><strong>Unpaid break</strong> — min.</li><li><strong>Hourly rate</strong> — $/h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours worked</strong> — h.</li><li><strong>Pay for the shift</strong> — $.</li><li><strong>Five shifts</strong> — $.</li><li><strong>Minutes worked</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put clock in = 9 h, clock out = 17.5 h, unpaid break = 30 min, hourly rate = 22 $/h into the form and the panel reads:</p><ul><li><strong>Hours worked</strong> = <code>Clock out - Clock in - Unpaid break ÷ 60</code> = <strong>8 h</strong></li><li><strong>Pay for the shift</strong> = <code>(Clock out - Clock in - Unpaid break ÷ 60) × Hourly rate</code> = <strong>176 $</strong></li><li><strong>Five shifts</strong> = <code>(Clock out - Clock in - Unpaid break ÷ 60) × Hourly rate × 5</code> = <strong>880 $</strong></li><li><strong>Minutes worked</strong> = <code>(Clock out - Clock in - Unpaid break ÷ 60) × 60</code> = <strong>480 min</strong></li></ul><p>A shift that finishes at six rather than half past five is 8.50 hours and 187 — the half hour is 11 dollars, and it is the half hour people forget to claim.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>17.5 - 9 - 30 ÷ 60</code>, which comes to <strong>8 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Nine to half past five with a half-hour break is 8.00 hours: 176 a shift and 880 over five shifts, 480 minutes worked.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours worked</th><th>Pay for the shift</th><th>Five shifts</th><th>Minutes worked</th></tr></thead><tbody><tr><td><strong>Clock in</strong> +10 %</td><td>−11.25 %</td><td>−11.25 %</td><td>−11.25 %</td><td>−11.25 %</td></tr><tr><td><strong>Clock out</strong> +10 %</td><td>+21.88 %</td><td>+21.88 %</td><td>+21.88 %</td><td>+21.88 %</td></tr><tr><td><strong>Unpaid break</strong> +10 %</td><td>−0.62 %</td><td>−0.62 %</td><td>−0.62 %</td><td>−0.62 %</td></tr><tr><td><strong>Hourly rate</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Clock out</strong>. <strong>Unpaid break</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Clock in</strong> opens at 9 h — On the twenty-four hour clock: 9 is nine in the morning and 13.5 is half past one.</li><li><strong>Clock out</strong> opens at 17.5 h</li><li><strong>Unpaid break</strong> opens at 30 min</li><li><strong>Hourly rate</strong> opens at 22 $/h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Clock in</th><th>Hours worked</th><th>Pay for the shift</th><th>Five shifts</th><th>Minutes worked</th></tr></thead><tbody><tr><td>4.5 h</td><td>12.5</td><td>275</td><td>1 375</td><td>750</td></tr><tr><td>9 h</td><td>8</td><td>176</td><td>880</td><td>480</td></tr><tr><td>18 h</td><td>-1</td><td>-22</td><td>-110</td><td>-60</td></tr><tr><td>45 h</td><td>-28</td><td>-616</td><td>-3 080</td><td>-1 680</td></tr><tr><td>90 h</td><td>-73</td><td>-1 606</td><td>-8 030</td><td>-4 380</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set clock in = 9, clock out = 18, unpaid break = 30, hourly rate = 22: <strong>Hours worked</strong> = 8.5 h, <strong>Pay for the shift</strong> = 187 $, <strong>Five shifts</strong> = 935 $, <strong>Minutes worked</strong> = 510 min. Finishing at six makes it 8.5 hours and 187 — half an hour a day, 55 a week, and 2 860 over a year of 52 weeks.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Writing 7.40 for seven hours forty.</strong> Decimal hours are not minutes. Forty minutes is 0.67 of an hour, and a timesheet in minutes and decimals mixed will always lose somebody money.</li><li><strong>Forgetting the break.</strong> A paid break is not deducted and an unpaid one is. Getting that the wrong way round in either direction is a payroll error that repeats every day.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Day shifts.</strong> A shift that passes midnight needs the clock-out read as twenty-four plus the hour, or two separate days.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need clock in and clock out and unpaid break and hourly rate. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours worked and pay for the shift and five shifts and minutes worked should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a payslip against the clock.</li></li><li><li>Working out what an extra half hour a day is worth.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/8-hour-shift">Eight-hour shift</a> <a href="/everyday-life/hours-to-decimal">Hours to decimal</a> <a href="/everyday-life/time-to-decimal">Time to decimal</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Clock in</strong> ×10</td><td>8</td><td>-73</td><td>×-9.125</td></tr><tr><td><strong>Clock out</strong> ×10</td><td>8</td><td>165.5</td><td>×20.688</td></tr><tr><td><strong>Unpaid break</strong> ×10</td><td>8</td><td>3.5</td><td>×0.438</td></tr><tr><td><strong>Hourly rate</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time Card calculator work out?', 'a' => <<<'TXT'
            It returns hours worked and pay for the shift and five shifts and minutes worked from clock in and clock out and unpaid break and hourly rate. The relationship is Clock out - Clock in - Unpaid break ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Clock in (h), Clock out (h), Unpaid break (min), Hourly rate ($/h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: clock in in h; clock out in h; unpaid break in min; hourly rate in $/h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is my pay lower than the hours suggest?', 'a' => <<<'TXT'
            Because the break is unpaid, because the timesheet is in decimals and someone entered minutes, or because the shift crossed a rounding rule at quarter of an hour.
            TXT],
            ['q' => 'How do I convert minutes to decimal hours?', 'a' => 'Divide by sixty. Ten minutes is 0.17, twenty is 0.33, thirty is 0.50 and forty is 0.67.'],
            ['q' => 'Does the calculator handle overtime?', 'a' => 'Not in this page — it prices every hour at the same rate. Overtime is the hours over the threshold times a multiplier, which is a second run of the sum.'],
        ],
        'related' => [
            ['path' => '/everyday-life/8-hour-shift', 'name' => 'Eight-hour shift'],
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
            ['path' => '/everyday-life/time-to-decimal', 'name' => 'Time to decimal'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
