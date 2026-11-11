<?php

/**
 * Elapsed Time Calculator
 * /everyday-life/elapsed-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Elapsed Time Calculator',
    'meta' => ['title' => 'Elapsed Time Calculator — With a Break Taken Off', 'description' => 'Elapsed time from a start and an end clock time, minus a break, reported as decimal hours, minutes and the duration written on the clock face. Formula shown.', 'h1' => 'Elapsed Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '08:00'],
                ['name' => 'end', 'label' => 'End time', 'type' => 'time', 'default' => '16:30'],
                [
                    'name' => 'break_minutes',
                    'label' => 'Pause to take off',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overnight',
                    'label' => 'Does the end time fall on the next day?',
                    'type' => 'select',
                    'options' => ['No, same day' => 0, 'Yes, past midnight' => 1],
                    'control' => 'SELECT',
                    'default' => 'No, same day',
                ],
                [
                    'name' => 'elapsed_hours',
                    'label' => 'Elapsed hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'elapsed_minutes',
                    'label' => 'Elapsed minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                ['name' => 'elapsed_clock', 'label' => 'Elapsed time on the clock', 'type' => 'time'],
            ],
        ],
    ],
    'formula' => ['elapsed_minutes' => 'mod(end - start + overnight * 86400000, 86400000) / 60000 - break_minutes', 'elapsed_hours' => 'mod(end - start + overnight * 86400000, 86400000) / 3600000 - break_minutes / 60', 'elapsed_clock' => 'mod(end - start + overnight * 86400000, 86400000) - break_minutes * 60000'],
    'article' => [
        'intro' => <<<'TXT'
        How long something took, once a pause is taken out. The duration itself is shown as a clock value as well as in hours and minutes, so it can be copied straight into a log.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Elapsed time is what a job actually took, and the pause in the middle is what makes the subtraction awkward. A start at eight, an end at half past four and a forty-five minute stop is not a subtraction you want to do twice.</p><p>The page takes the pause out and shows the rest three ways: as a decimal, as minutes, and as a clock value like 07:45 that can be written straight onto a sheet.</p><p>The answer is <strong>elapsed hours and elapsed minutes and elapsed time on the clock</strong>, worked out from start time and end time and pause to take off and does the end time fall on the next day?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>elapsed_minutes</strong></td><td><code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 60000 - Pause to take off</code></td></tr><tr><td><strong>elapsed_hours</strong></td><td><code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 3600000 - Pause to take off ÷ 60</code></td></tr><tr><td><strong>elapsed_clock</strong></td><td><code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) - Pause to take off × 60000</code></td></tr></tbody></table><p>The clock difference is wrapped into one day, the pause is converted from minutes into milliseconds and subtracted on every line, and the clock line leaves the answer in milliseconds so the page can draw it as a duration rather than a number.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports elapsed hours and elapsed minutes and elapsed time on the clock.</p><ul><li><strong>Start time</strong>.</li><li><strong>End time</strong>.</li><li><strong>Pause to take off</strong> — min.</li><li><strong>Does the end time fall on the next day?</strong>. A choice: No, same day, Yes, past midnight.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Elapsed hours</strong> — h.</li><li><strong>Elapsed minutes</strong> — min.</li><li><strong>Elapsed time on the clock</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 08:00, end time = 16:30, pause to take off = 45 min, does the end time fall on the next day? = 0 into the form and the panel reads:</p><ul><li><strong>Elapsed hours</strong> = <code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 3600000 - Pause to take off ÷ 60</code> = <strong>7.75 h</strong></li><li><strong>Elapsed minutes</strong> = <code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 60000 - Pause to take off</code> = <strong>465 min</strong></li><li><strong>Elapsed time on the clock</strong> = <code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) - Pause to take off × 60000</code> = <strong>07:45</strong></li></ul><p>The clock line is the one to copy: it is already in the form a time sheet holds, with no decimal point to argue about.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Eight in the morning to half past four is eight and a half hours; take off forty-five minutes and the elapsed time is 7.75 hours, 465 minutes or 07:45 on the clock.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Elapsed hours</th><th>Elapsed minutes</th><th>Elapsed time on the clock</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>−12.9 %</td><td>−12.9 %</td><td>-0 d</td></tr><tr><td><strong>End time</strong> +1 hour</td><td>+12.9 %</td><td>+12.9 %</td><td>+0 d</td></tr><tr><td><strong>Pause to take off</strong> +10 %</td><td>−0.97 %</td><td>−0.97 %</td><td>-0 d</td></tr><tr><td><strong>Does the end time fall on the next day?</strong> +10 %</td><td>+30.97 %</td><td>+30.97 %</td><td>+0 d</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Does the end time fall on the next day?</strong>. <strong>Pause to take off</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 08:00</li><li><strong>End time</strong> opens at 16:30</li><li><strong>Pause to take off</strong> opens at 45 min</li><li><strong>Does the end time fall on the next day?</strong> opens at 0</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 09:00, end time = 12:30, pause to take off = 15, does the end time fall on the next day? = 0: <strong>Elapsed hours</strong> = 3.25 h, <strong>Elapsed minutes</strong> = 195 min, <strong>Elapsed time on the clock</strong> = 03:15. Three and a half hours less a quarter of an hour is 3.25 hours, written as 03:15 on the clock line.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Taking the pause off twice.</strong> It is subtracted on every line at once, so it should be typed once and not adjusted for.</li><li><strong>Assuming the clock line is an arrival time.</strong> It is a duration, so 07:45 means seven and three-quarter hours, not a quarter to eight.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One pause.</strong> Several pauses go in as their sum.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and end time and pause to take off and does the end time fall on the next day?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Elapsed hours and elapsed minutes and elapsed time on the clock should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Timing a repair that included a parts run.</li></li><li><li>Recording study time with a break in the middle.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hours-between-two-times">Hours between two times</a> <a href="/everyday-life/time-duration">Time duration</a> <a href="/everyday-life/clock-duration">Clock duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>7.75</td><td>-2.25</td><td>×-0.29</td></tr><tr><td><strong>End time</strong> +10 hours</td><td>7.75</td><td>17.75</td><td>×2.29</td></tr><tr><td><strong>Pause to take off</strong> ×10</td><td>7.75</td><td>1</td><td>×0.129</td></tr><tr><td><strong>Does the end time fall on the next day?</strong> ×10</td><td>7.75</td><td>7.75</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Elapsed Time calculator work out?', 'a' => <<<'TXT'
            It returns elapsed hours and elapsed minutes and elapsed time on the clock from start time and end time and pause to take off and does the end time fall on the next day?. The relationship is mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 60000 - Pause to take off.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, End time, Pause to take off (min), Does the end time fall on the next day?. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: pause to take off in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the elapsed time shown on a clock face?', 'a' => 'Because the form people copy onto paper is 07:45, not 7.75. The decimal is there for the multiplication that comes next.'],
            ['q' => 'Does a zero pause break anything?', 'a' => 'No. Zero means the elapsed time is the whole span, and the clock line matches the start-to-end difference exactly.'],
            ['q' => 'Can the end be on the next day?', 'a' => 'Yes, with the overnight switch. A shift that finishes at 02:00 then reports the hours actually worked.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-between-two-times', 'name' => 'Hours between two times'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
            ['path' => '/everyday-life/clock-duration', 'name' => 'Clock duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
