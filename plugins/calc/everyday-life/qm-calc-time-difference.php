<?php

/**
 * Time Difference Calculator
 * /everyday-life/time-difference
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time Difference Calculator',
    'meta' => ['title' => 'Time Difference Calculator — Seconds Between Two', 'description' => 'The gap between two clock times in seconds, minutes and hours, with a switch for an end that falls after midnight. Exact to the second, with the formula shown.', 'h1' => 'Time Difference Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'First time', 'type' => 'time', 'default' => '09:00'],
                ['name' => 'end', 'label' => 'Second time', 'type' => 'time', 'default' => '17:30'],
                [
                    'name' => 'overnight',
                    'label' => 'Does the second time fall on the next day?',
                    'type' => 'select',
                    'options' => ['No, same day' => 0, 'Yes, past midnight' => 1],
                    'control' => 'SELECT',
                    'default' => 'No, same day',
                ],
                [
                    'name' => 'diff_seconds',
                    'label' => 'Difference in seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'diff_minutes',
                    'label' => 'Difference in minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'diff_hours',
                    'label' => 'Difference in hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['diff_seconds' => '(end - start + overnight * 86400000) / 1000', 'diff_minutes' => '(end - start + overnight * 86400000) / 60000', 'diff_hours' => '(end - start + overnight * 86400000) / 3600000'],
    'article' => [
        'intro' => 'Two clock readings and the distance between them, in three units at once. The seconds line is exact, which is what a log or a stopwatch check needs.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Two clock readings are easy to subtract until the second one is smaller than the first. Then the subtraction gives a negative number, and a negative duration is not something a log can store or a shift can pay.</p><p>The overnight switch resolves it. Tick it and the page adds a full day before subtracting, which is what actually happened: the second reading belongs to the next morning. The three answers are the same gap counted in seconds, minutes and hours.</p><p>The answer is <strong>difference in seconds and difference in minutes and difference in hours</strong>, worked out from first time and second time and does the second time fall on the next day?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>diff_seconds</strong></td><td><code>(Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 1000</code></td></tr><tr><td><strong>diff_minutes</strong></td><td><code>(Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 60000</code></td></tr><tr><td><strong>diff_hours</strong></td><td><code>(Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 3600000</code></td></tr></tbody></table><p>Both readings arrive as milliseconds, so the difference is already in that unit. A ticked overnight box adds 86 400 000 before the division, and the three lines divide by 1 000, 60 000 and 3 600 000.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports difference in seconds and difference in minutes and difference in hours.</p><ul><li><strong>First time</strong>.</li><li><strong>Second time</strong>.</li><li><strong>Does the second time fall on the next day?</strong>. A choice: No, same day, Yes, past midnight.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Difference in seconds</strong> — s.</li><li><strong>Difference in minutes</strong> — min.</li><li><strong>Difference in hours</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put first time = 09:00, second time = 17:30, does the second time fall on the next day? = 0 into the form and the panel reads:</p><ul><li><strong>Difference in seconds</strong> = <code>(Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 1000</code> = <strong>30 600 s</strong></li><li><strong>Difference in minutes</strong> = <code>(Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 60000</code> = <strong>510 min</strong></li><li><strong>Difference in hours</strong> = <code>(Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 3600000</code> = <strong>8.5 h</strong></li></ul><p>A log timestamped to the second is the case the seconds line exists for; a rota only needs the hours line.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>09:00 to 17:30 is 30 600 seconds, or 510 minutes, or 8.5 hours. 22:00 to 06:00 with the overnight box ticked is 28 800 seconds, the same as eight hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Difference in seconds</th><th>Difference in minutes</th><th>Difference in hours</th></tr></thead><tbody><tr><td><strong>First time</strong> +1 hour</td><td>−11.76 %</td><td>−11.76 %</td><td>−11.76 %</td></tr><tr><td><strong>Second time</strong> +1 hour</td><td>+11.76 %</td><td>+11.76 %</td><td>+11.76 %</td></tr><tr><td><strong>Does the second time fall on the next day?</strong> +10 %</td><td>+28.24 %</td><td>+28.24 %</td><td>+28.24 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Does the second time fall on the next day?</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>First time</strong> opens at 09:00</li><li><strong>Second time</strong> opens at 17:30</li><li><strong>Does the second time fall on the next day?</strong> opens at 0</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set first time = 22:00, second time = 06:00, does the second time fall on the next day? = 1: <strong>Difference in seconds</strong> = 28 800 s, <strong>Difference in minutes</strong> = 480 min, <strong>Difference in hours</strong> = 8 h. Eight hours across midnight, with the switch doing the work the clock reading cannot do on its own.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Leaving the switch alone.</strong> Without it, 22:00 to 06:00 reads as a negative gap, which is true arithmetic and useless on a timesheet.</li><li><strong>Reading 8.5 hours as 8 h 50 min.</strong> The decimal is eight and a half hours, which is 8 h 30.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One day at most.</strong> The switch adds a single day, so a gap of two days belongs to the date-based page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need first time and second time and does the second time fall on the next day?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Difference in seconds and difference in minutes and difference in hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking two timestamps in a log.</li></li><li><li>Timing a night shift that crosses midnight.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-duration">Time duration</a> <a href="/everyday-life/hours-between-two-times">Hours between two times</a> <a href="/everyday-life/clock-duration">Clock duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>First time</strong> +10 hours</td><td>30 600</td><td>-5 400</td><td>×-0.176</td></tr><tr><td><strong>Second time</strong> +10 hours</td><td>30 600</td><td>66 600</td><td>×2.176</td></tr><tr><td><strong>Does the second time fall on the next day?</strong> ×10</td><td>30 600</td><td>117 000</td><td>×3.824</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time Difference calculator work out?', 'a' => <<<'TXT'
            It returns difference in seconds and difference in minutes and difference in hours from first time and second time and does the second time fall on the next day?. The relationship is (Second time - First time + Does the second time fall on the next day? × 86400000) ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'First time, Second time, Does the second time fall on the next day?. Everything else is computed.'],
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
            ['q' => 'What if the second time is earlier than the first?', 'a' => 'Tick the overnight box if it fell on the next day. If it really is an earlier time on the same day, the page returns a negative gap, which is the honest answer.'],
            ['q' => 'Why give seconds as well as hours?', 'a' => 'Because logs and stopwatches record seconds and a rounded hour hides the difference between 8.49 and 8.51.'],
            ['q' => 'Does it handle 24-hour and 12-hour input?', 'a' => 'The picker is a 24-hour dial. Half past five in the afternoon is 17:30, and a quarter past midnight is 00:15.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
            ['path' => '/everyday-life/hours-between-two-times', 'name' => 'Hours between two times'],
            ['path' => '/everyday-life/clock-duration', 'name' => 'Clock duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
