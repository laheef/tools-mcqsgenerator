<?php

/**
 * Hours Between Two Times Calculator
 * /everyday-life/hours-between-two-times
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hours Between Two Times Calculator',
    'meta' => ['title' => 'Hours Between Two Times — Paid Hours With a Break', 'description' => 'The hours between two clock times with a break taken off, reported as paid hours, paid minutes and the gross span, for a shift, a sitting or a session. Formula.', 'h1' => 'Hours Between Two Times Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '09:00'],
                ['name' => 'end', 'label' => 'End time', 'type' => 'time', 'default' => '17:30'],
                [
                    'name' => 'break_minutes',
                    'label' => 'Break taken',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overnight',
                    'label' => 'Does the shift end after midnight?',
                    'type' => 'select',
                    'options' => ['No, same day' => 0, 'Yes, next morning' => 1],
                    'control' => 'SELECT',
                    'default' => 'No, same day',
                ],
                [
                    'name' => 'paid_hours',
                    'label' => 'Paid hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'paid_minutes',
                    'label' => 'Paid minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'gross_hours',
                    'label' => 'Gross hours before the break',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['gross_hours' => 'mod(end - start + overnight * 86400000, 86400000) / 3600000', 'paid_hours' => 'mod(end - start + overnight * 86400000, 86400000) / 3600000 - break_minutes / 60', 'paid_minutes' => 'mod(end - start + overnight * 86400000, 86400000) / 60000 - break_minutes'],
    'article' => [
        'intro' => 'A shift length minus a break. The gross figure is there to check the subtraction, and the paid figure is the one that goes on the sheet.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An unpaid break is the small print of every shift. The clock says nine to half past five, which is eight and a half hours, and the payslip says eight, because half an hour was not worked. Both figures are true and only one is payable.</p><p>The page keeps them apart. Gross hours is what the clock says, paid hours is what is left after the break, and the minutes line is the same figure in the unit a payroll system stores.</p><p>The answer is <strong>paid hours and paid minutes and gross hours before the break</strong>, worked out from start time and end time and break taken and does the shift end after midnight?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gross_hours</strong></td><td><code>mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 3600000</code></td></tr><tr><td><strong>paid_hours</strong></td><td><code>mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 3600000 - Break taken ÷ 60</code></td></tr><tr><td><strong>paid_minutes</strong></td><td><code>mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 60000 - Break taken</code></td></tr></tbody></table><p>The span is the difference between the two readings, wrapped into one day when the shift crosses midnight. The break is converted from minutes into hours only on the paid-hours line, which is why the gross line stays whole.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports paid hours and paid minutes and gross hours before the break.</p><ul><li><strong>Start time</strong>.</li><li><strong>End time</strong>.</li><li><strong>Break taken</strong> — min.</li><li><strong>Does the shift end after midnight?</strong>. A choice: No, same day, Yes, next morning.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Paid hours</strong> — h.</li><li><strong>Paid minutes</strong> — min.</li><li><strong>Gross hours before the break</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 09:00, end time = 17:30, break taken = 30 min, does the shift end after midnight? = 0 into the form and the panel reads:</p><ul><li><strong>Paid hours</strong> = <code>mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 3600000 - Break taken ÷ 60</code> = <strong>8 h</strong></li><li><strong>Paid minutes</strong> = <code>mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 60000 - Break taken</code> = <strong>480 min</strong></li><li><strong>Gross hours before the break</strong> = <code>mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 3600000</code> = <strong>8.5 h</strong></li></ul><p>The gross line is worth keeping in view: a paid figure that looks wrong is usually a break typed as 3 instead of 30.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>09:00 to 17:30 is 8.5 hours gross. Take off thirty minutes and the paid figure is 8.0 hours, or 480 minutes. A night shift of 22:00 to 06:00 with a forty-five minute break pays 7.25 hours.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Paid hours</th><th>Paid minutes</th><th>Gross hours before the break</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>−12.5 %</td><td>−12.5 %</td><td>−11.76 %</td></tr><tr><td><strong>End time</strong> +1 hour</td><td>+12.5 %</td><td>+12.5 %</td><td>+11.76 %</td></tr><tr><td><strong>Break taken</strong> +10 %</td><td>−0.62 %</td><td>−0.62 %</td><td>+0 %</td></tr><tr><td><strong>Does the shift end after midnight?</strong> +10 %</td><td>+30 %</td><td>+30 %</td><td>+28.24 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Does the shift end after midnight?</strong>. <strong>Break taken</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 09:00</li><li><strong>End time</strong> opens at 17:30</li><li><strong>Break taken</strong> opens at 30 min</li><li><strong>Does the shift end after midnight?</strong> opens at 0</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 22:00, end time = 06:00, break taken = 45, does the shift end after midnight? = 1: <strong>Paid hours</strong> = 7.25 h, <strong>Paid minutes</strong> = 435 min, <strong>Gross hours before the break</strong> = 8 h. A night shift of eight gross hours pays seven and a quarter once the forty-five minute break is off.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Typing the break in hours.</strong> The box asks for minutes, so half an hour is 30 and not 0.5.</li><li><strong>Forgetting the overnight switch.</strong> A shift ending at 06:00 is a negative span without it, which pays nothing.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One break per shift.</strong> Two breaks are one figure added together in the box before it goes in.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and end time and break taken and does the shift end after midnight?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Paid hours and paid minutes and gross hours before the break should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>A shift with an unpaid lunch break.</li></li><li><li>A tutoring or care session with a pause in the middle.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-duration">Time duration</a> <a href="/everyday-life/count-hours">Count hours</a> <a href="/everyday-life/hours-to-decimal">Hours to decimal</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>8</td><td>-2</td><td>×-0.25</td></tr><tr><td><strong>End time</strong> +10 hours</td><td>8</td><td>18</td><td>×2.25</td></tr><tr><td><strong>Break taken</strong> ×10</td><td>8</td><td>3.5</td><td>×0.438</td></tr><tr><td><strong>Does the shift end after midnight?</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hours Between Two Times calculator work out?', 'a' => <<<'TXT'
            It returns paid hours and paid minutes and gross hours before the break from start time and end time and break taken and does the shift end after midnight?. The relationship is mod(End time - Start time + Does the shift end after midnight? × 86400000, 86400000) ÷ 3600000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, End time, Break taken (min), Does the shift end after midnight?. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: break taken in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is the break taken off the clock time or the paid time?', 'a' => 'The paid time. Gross hours stay as the clock reads, and the break is subtracted from the answer rather than moved around the dial.'],
            ['q' => 'What if the break is paid?', 'a' => 'Put zero in the break box. The paid figure then matches the gross figure.'],
            ['q' => 'Why does the answer have four decimals?', 'a' => 'Because a paid hour can be a fraction of an hour and payroll usually wants it to two decimals. Round it there rather than here.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
            ['path' => '/everyday-life/count-hours', 'name' => 'Count hours'],
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
