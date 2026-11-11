<?php

/**
 * Clock Duration Calculator
 * /everyday-life/clock-duration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Clock Duration Calculator',
    'meta' => ['title' => 'Clock Duration — Hours, Minutes and Seconds Between', 'description' => 'Start and end clock times read as a duration in whole hours, whole minutes and total seconds, so an odd-minute gap can be written down the way a clock shows it.', 'h1' => 'Clock Duration Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '09:13'],
                ['name' => 'end', 'label' => 'End time', 'type' => 'time', 'default' => '17:47'],
                [
                    'name' => 'overnight',
                    'label' => 'Does the end time fall on the next day?',
                    'type' => 'select',
                    'options' => ['No, same day' => 0, 'Yes, past midnight' => 1],
                    'control' => 'SELECT',
                    'default' => 'No, same day',
                ],
                [
                    'name' => 'hours_part',
                    'label' => 'Whole hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'minutes_part',
                    'label' => 'Minutes into the hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'total_seconds',
                    'label' => 'Total seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
            ],
        ],
    ],
    'formula' => ['total_seconds' => 'mod(end - start + overnight * 86400000, 86400000) / 1000', 'hours_part' => 'floor(mod(end - start + overnight * 86400000, 86400000) / 3600000)', 'minutes_part' => 'floor(mod(mod(end - start + overnight * 86400000, 86400000) / 60000, 60))'],
    'article' => [
        'intro' => 'A gap written as a clock duration: how many hours, how many minutes into the hour, and the exact count of seconds underneath both.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A duration has two habits. A person says eight hours thirty-four; a machine stores 30 840 seconds. Both are right, and a page that gives only one of them makes the other a conversion somebody does in their head at the end of a day.</p><p>The three lines here are the clock reading and its exact total. The minutes line is minutes into the hour, not the total count, so 8 h 34 min reads as 8 and 34 rather than 8 and 514.</p><p>The answer is <strong>whole hours and minutes into the hour and total seconds</strong>, worked out from start time and end time and does the end time fall on the next day?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_seconds</strong></td><td><code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 1000</code></td></tr><tr><td><strong>hours_part</strong></td><td><code>floor(mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 3600000)</code></td></tr><tr><td><strong>minutes_part</strong></td><td><code>floor(mod(mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 60000, 60))</code></td></tr></tbody></table><p>The gap is taken in milliseconds and wrapped into one day. Dividing by 3 600 000 and taking the floor gives whole hours; the remainder divided by 60 000 and taken modulo sixty gives the minutes into that hour.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports whole hours and minutes into the hour and total seconds.</p><ul><li><strong>Start time</strong>.</li><li><strong>End time</strong>.</li><li><strong>Does the end time fall on the next day?</strong>. A choice: No, same day, Yes, past midnight.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Whole hours</strong> — h.</li><li><strong>Minutes into the hour</strong> — min.</li><li><strong>Total seconds</strong> — s.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 09:13, end time = 17:47, does the end time fall on the next day? = 0 into the form and the panel reads:</p><ul><li><strong>Whole hours</strong> = <code>floor(mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 3600000)</code> = <strong>8 h</strong></li><li><strong>Minutes into the hour</strong> = <code>floor(mod(mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 60000, 60))</code> = <strong>34 min</strong></li><li><strong>Total seconds</strong> = <code>mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 1000</code> = <strong>30 840 s</strong></li></ul><p>Odd start times are the reason this page exists: a quarter past nine to a quarter past five is the easy case, and the odd minutes are where people reach for paper.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>09:13 to 17:47 is 8 h 34 min, which is 30 840 seconds. Forty minutes before midnight to twenty-five past is 45 minutes across the day line.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Whole hours</th><th>Minutes into the hour</th><th>Total seconds</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>−12.5 %</td><td>+0 %</td><td>−11.67 %</td></tr><tr><td><strong>End time</strong> +1 hour</td><td>+12.5 %</td><td>+0 %</td><td>+11.67 %</td></tr><tr><td><strong>Does the end time fall on the next day?</strong> +10 %</td><td>+25 %</td><td>+70.59 %</td><td>+28.02 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Does the end time fall on the next day?</strong>. <strong>End time</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 09:13</li><li><strong>End time</strong> opens at 17:47</li><li><strong>Does the end time fall on the next day?</strong> opens at 0</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 23:40, end time = 00:25, does the end time fall on the next day? = 1: <strong>Whole hours</strong> = 0 h, <strong>Minutes into the hour</strong> = 45 min, <strong>Total seconds</strong> = 2 700 s. Forty-five minutes across midnight comes out as 0 hours, 45 minutes and 2 700 seconds.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading the minutes line as a total.</strong> It is minutes into the last whole hour, so it never goes above fifty-nine.</li><li><strong>Forgetting the seconds line when a stopwatch is involved.</strong> The rounded duration can be a minute short of the exact one.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No date.</strong> A duration longer than a day needs the date-based page, because this one wraps at midnight.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and end time and does the end time fall on the next day?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Whole hours and minutes into the hour and total seconds should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Writing an odd-minute gap onto a log.</li></li><li><li>Checking a timed exam or a race against the clock reading.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-difference">Time difference</a> <a href="/everyday-life/minutes-between-two-times">Minutes between two times</a> <a href="/everyday-life/time-duration">Time duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>8</td><td>-2</td><td>×-0.25</td></tr><tr><td><strong>End time</strong> +10 hours</td><td>8</td><td>18</td><td>×2.25</td></tr><tr><td><strong>Does the end time fall on the next day?</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Clock Duration calculator work out?', 'a' => <<<'TXT'
            It returns whole hours and minutes into the hour and total seconds from start time and end time and does the end time fall on the next day?. The relationship is mod(End time - Start time + Does the end time fall on the next day? × 86400000, 86400000) ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, End time, Does the end time fall on the next day?. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: . The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why are there three answers for one gap?', 'a' => 'Because a clock reading, a rounded duration and an exact stopwatch count are three different things a person can need from the same subtraction.'],
            ['q' => 'What does the minutes line do with a gap of 8 h 34 min?', 'a' => 'It reports 34 — minutes into the last whole hour — rather than 514, which is the total and belongs on the other page.'],
            ['q' => 'Can the start time be later than the end time?', 'a' => <<<'TXT'
            Only with the overnight switch. Without it the subtraction is negative and the page wraps the clock reading in a way that will not match the day you had in mind.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/time-difference', 'name' => 'Time difference'],
            ['path' => '/everyday-life/minutes-between-two-times', 'name' => 'Minutes between two times'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
