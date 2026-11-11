<?php

/**
 * Count Hours Calculator
 * /everyday-life/count-hours
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Count Hours Calculator',
    'meta' => ['title' => 'Count Hours — Total Hours Over a Number of Days', 'description' => 'The hours in one day\'s shift, repeated over a number of days, reported as hours per day, total hours and total minutes, for a payslip, a course or a project..', 'h1' => 'Count Hours Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Shift start', 'type' => 'time', 'default' => '09:00'],
                ['name' => 'end', 'label' => 'Shift end', 'type' => 'time', 'default' => '17:30'],
                [
                    'name' => 'break_minutes',
                    'label' => 'Break each day',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days worked',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_per_day',
                    'label' => 'Hours per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Total hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'total_minutes',
                    'label' => 'Total minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['hours_per_day' => 'mod(end - start - break_minutes * 60000, 86400000) / 3600000', 'total_hours' => 'days * mod(end - start - break_minutes * 60000, 86400000) / 3600000', 'total_minutes' => 'days * mod(end - start - break_minutes * 60000, 86400000) / 60000'],
    'article' => [
        'intro' => 'One day\'s hours multiplied out over a run of days. A break is taken off before the multiplication, so the total is paid time rather than clock time.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A month of shifts is one multiplication, and the multiplication is only right if the daily figure is right. Nine to half past five less half an hour is eight hours; twenty of those is a hundred and sixty, not a hundred and seventy.</p><p>The page shows the daily figure beside the total for that reason. If the total looks wrong the daily line usually shows why, and a break typed as three instead of thirty is visible there and invisible in the total.</p><p>The answer is <strong>hours per day and total hours and total minutes</strong>, worked out from shift start and shift end and break each day and days worked. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours_per_day</strong></td><td><code>mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 3600000</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>Days worked × mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 3600000</code></td></tr><tr><td><strong>total_minutes</strong></td><td><code>Days worked × mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 60000</code></td></tr></tbody></table><p>The day's span is taken from the two clock readings and the break is converted from minutes and subtracted. Both totals are that daily figure multiplied by the day count, one in hours and one in minutes.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports hours per day and total hours and total minutes.</p><ul><li><strong>Shift start</strong>.</li><li><strong>Shift end</strong>.</li><li><strong>Break each day</strong> — min.</li><li><strong>Days worked</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours per day</strong> — h.</li><li><strong>Total hours</strong> — h.</li><li><strong>Total minutes</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put shift start = 09:00, shift end = 17:30, break each day = 30 min, days worked = 20 days into the form and the panel reads:</p><ul><li><strong>Hours per day</strong> = <code>mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 3600000</code> = <strong>8 h</strong></li><li><strong>Total hours</strong> = <code>Days worked × mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 3600000</code> = <strong>160 h</strong></li><li><strong>Total minutes</strong> = <code>Days worked × mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 60000</code> = <strong>9 600 min</strong></li></ul><p>The day count is a count of shifts worked, not calendar days, so a month with a week off is 15 rather than 20.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Nine to half past five with a thirty-minute break is eight hours a day: twenty days come to 160 hours, or 9 600 minutes. Five days of the same shift come to 40 hours.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours per day</th><th>Total hours</th><th>Total minutes</th></tr></thead><tbody><tr><td><strong>Shift start</strong> +1 hour</td><td>−12.5 %</td><td>−12.5 %</td><td>−12.5 %</td></tr><tr><td><strong>Shift end</strong> +1 hour</td><td>+12.5 %</td><td>+12.5 %</td><td>+12.5 %</td></tr><tr><td><strong>Break each day</strong> +10 %</td><td>−0.62 %</td><td>−0.62 %</td><td>−0.62 %</td></tr><tr><td><strong>Days worked</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Shift start</strong>. <strong>Break each day</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Shift start</strong> opens at 09:00</li><li><strong>Shift end</strong> opens at 17:30</li><li><strong>Break each day</strong> opens at 30 min</li><li><strong>Days worked</strong> opens at 20 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set shift start = 08:00, shift end = 16:00, break each day = 0, days worked = 5: <strong>Hours per day</strong> = 8 h, <strong>Total hours</strong> = 40 h, <strong>Total minutes</strong> = 2 400 min. Eight hours with no break over five days is 40 hours, the standard week the page is usually checked against.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting calendar days.</strong> The box asks for days worked; weekends and leave are not shifts.</li><li><strong>Leaving the break at zero on a shift that has one.</strong> The total then runs high by the break times the days, which is the error nobody notices.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Identical days.</strong> A pattern with different hours each day needs the time adder, one line per shift.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need shift start and shift end and break each day and days worked. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours per day and total hours and total minutes should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Converting a rota into a monthly figure.</li></li><li><li>Costing a course that runs the same hours daily.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hours-between-two-times">Hours between two times</a> <a href="/everyday-life/hours-to-decimal">Hours to decimal</a> <a href="/everyday-life/time-duration">Time duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Shift start</strong> +10 hours</td><td>8</td><td>-2</td><td>×-0.25</td></tr><tr><td><strong>Shift end</strong> +10 hours</td><td>8</td><td>18</td><td>×2.25</td></tr><tr><td><strong>Break each day</strong> ×10</td><td>8</td><td>3.5</td><td>×0.438</td></tr><tr><td><strong>Days worked</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Count Hours calculator work out?', 'a' => <<<'TXT'
            It returns hours per day and total hours and total minutes from shift start and shift end and break each day and days worked. The relationship is mod(Shift end - Shift start - Break each day × 60000, 86400000) ÷ 3600000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Shift start, Shift end, Break each day (min), Days worked (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: break each day in min; days worked in days. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Are the days calendar days or shifts?', 'a' => 'Shifts. Five rows on the rota is 5, whatever the calendar says.'],
            ['q' => 'Can the total go over a month?', 'a' => 'Yes. The day count has no ceiling, so a six-week placement is 30 shifts rather than a second calculation.'],
            ['q' => 'Why show minutes as well as hours?', 'a' => 'Because payroll systems store minutes, and a total of 160 hours is 9 600 minutes when it is asked for in the other unit.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-between-two-times', 'name' => 'Hours between two times'],
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
