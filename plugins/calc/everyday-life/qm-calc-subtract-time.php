<?php

/**
 * Subtract Time Calculator
 * /everyday-life/subtract-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Subtract Time Calculator',
    'meta' => ['title' => 'Subtract Time — Clock Time Minus Hours and Minutes', 'description' => 'Subtract hours and minutes from a clock time and read the time it lands on, the day it falls back to and the minutes from midnight that follow. Formula shown.', 'h1' => 'Subtract Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '17:30'],
                [
                    'name' => 'hours',
                    'label' => 'Hours to subtract',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes to subtract',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'result', 'label' => 'Time after subtracting', 'type' => 'time'],
                [
                    'name' => 'day_shift',
                    'label' => 'Days relative to the start day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'minutes_from_midnight',
                    'label' => 'Minutes from midnight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['result' => 'mod(start - hours * 3600000 - minutes * 60000 + 86400000, 86400000)', 'day_shift' => 'floor((start - hours * 3600000 - minutes * 60000) / 86400000)', 'minutes_from_midnight' => 'mod(start - hours * 3600000 - minutes * 60000 + 86400000, 86400000) / 60000'],
    'article' => [
        'intro' => 'A clock time minus a spell. Going back through midnight is handled by the wrap, so a morning meeting worked backwards from noon stays a morning time.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Subtracting is where clock arithmetic stops being obvious. Half past five minus one forty-five is obvious enough. Eight in the morning minus nine and a half is not, because the answer belongs to the day before and the clock reading alone says 22:30, which reads like the evening of the same day.</p><p>The page returns the reading, the day it belongs to, and the count of minutes from midnight so the three cannot be read out of step with each other.</p><p>The answer is <strong>time after subtracting and days relative to the start day and minutes from midnight</strong>, worked out from start time and hours to subtract and minutes to subtract. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>result</strong></td><td><code>mod(Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000 + 86400000, 86400000)</code></td></tr><tr><td><strong>day_shift</strong></td><td><code>floor((Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000) ÷ 86400000)</code></td></tr><tr><td><strong>minutes_from_midnight</strong></td><td><code>mod(Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000 + 86400000, 86400000) ÷ 60000</code></td></tr></tbody></table><p>One day of milliseconds is added before the wrap so that a negative result comes back as a time inside the dial rather than as a number before zero. The day line uses the unadjusted difference, which is why it can read −1 while the clock reads a perfectly ordinary time.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports time after subtracting and days relative to the start day and minutes from midnight.</p><ul><li><strong>Start time</strong>.</li><li><strong>Hours to subtract</strong> — h.</li><li><strong>Minutes to subtract</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time after subtracting</strong>.</li><li><strong>Days relative to the start day</strong> — days.</li><li><strong>Minutes from midnight</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 17:30, hours to subtract = 1 h, minutes to subtract = 45 min into the form and the panel reads:</p><ul><li><strong>Time after subtracting</strong> = <code>mod(Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000 + 86400000, 86400000)</code> = <strong>15:45</strong></li><li><strong>Days relative to the start day</strong> = <code>floor((Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000) ÷ 86400000)</code> = <strong>0 days</strong></li><li><strong>Minutes from midnight</strong> = <code>mod(Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000 + 86400000, 86400000) ÷ 60000</code> = <strong>945 min</strong></li></ul><p>Working backwards from a deadline is the common use: the meeting is at ten, the travel is an hour and ten, so leave at a quarter to nine.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Half past five minus one forty-five is 15:45, 945 minutes from midnight on the same day. Eight in the morning minus nine and a half hours is 22:30 on the previous day.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time after subtracting</th><th>Days relative to the start day</th><th>Minutes from midnight</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>+0 d</td><td>—</td><td>+6.35 %</td></tr><tr><td><strong>Hours to subtract</strong> +10 %</td><td>-0 d</td><td>—</td><td>−0.63 %</td></tr><tr><td><strong>Minutes to subtract</strong> +10 %</td><td>-0 d</td><td>—</td><td>−0.48 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Start time</strong>. <strong>Minutes to subtract</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 17:30</li><li><strong>Hours to subtract</strong> opens at 1 h</li><li><strong>Minutes to subtract</strong> opens at 45 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 08:00, hours to subtract = 9, minutes to subtract = 30: <strong>Time after subtracting</strong> = 22:30, <strong>Days relative to the start day</strong> = -1 days, <strong>Minutes from midnight</strong> = 1 350 min. Nine and a half hours before eight in the morning is 22:30 the previous evening: the negative day line is the part that carries the date.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading a wrapped time as the same day.</strong> 22:30 after subtracting nine and a half hours from 08:00 is the evening before, not the evening after.</li><li><strong>Subtracting the minutes in the wrong direction.</strong> The two boxes are both subtracted; there is no box for minutes to add back.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No seconds.</strong> The page works in whole minutes, which is the resolution a travel plan or a rota is written in.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and hours to subtract and minutes to subtract. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time after subtracting and days relative to the start day and minutes from midnight should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Finding a departure time from an arrival time.</li></li><li><li>Working back from the end of a shift to its start.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/adding-hours">Adding hours</a> <a href="/everyday-life/adding-hours-and-minutes">Adding hours and minutes</a> <a href="/everyday-life/time-difference">Time difference</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>15:45</td><td>01:45</td><td>-1 d</td></tr><tr><td><strong>Hours to subtract</strong> ×10</td><td>15:45</td><td>06:45</td><td>-0 d</td></tr><tr><td><strong>Minutes to subtract</strong> ×10</td><td>15:45</td><td>09:00</td><td>-0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Subtract Time calculator work out?', 'a' => <<<'TXT'
            It returns time after subtracting and days relative to the start day and minutes from midnight from start time and hours to subtract and minutes to subtract. The relationship is mod(Start time - Hours to subtract × 3600000 - Minutes to subtract × 60000 + 86400000, 86400000).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, Hours to subtract (h), Minutes to subtract (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hours to subtract in h; minutes to subtract in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does the day line say −1?', 'a' => <<<'TXT'
            Because the answer fell on the day before the start date. The clock reading has wrapped back into the dial and the day line is what keeps the date attached to it.
            TXT],
            ['q' => 'Can I subtract a spell longer than a day?', 'a' => 'Yes. The day line counts how many days back the answer sits, so thirty-six hours before nine in the morning reads as −2 days and a clock time.'],
            ['q' => 'What if I want to add instead?', 'a' => 'Use the adding page. The two are separate on purpose: a page that both adds and subtracts needs a sign the visitor has to remember.'],
        ],
        'related' => [
            ['path' => '/everyday-life/adding-hours', 'name' => 'Adding hours'],
            ['path' => '/everyday-life/adding-hours-and-minutes', 'name' => 'Adding hours and minutes'],
            ['path' => '/everyday-life/time-difference', 'name' => 'Time difference'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
