<?php

/**
 * Time Duration Calculator
 * /everyday-life/time-duration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time Duration Calculator',
    'meta' => ['title' => 'Time Duration Calculator — Hours Between Times', 'description' => 'Put in a start time and an end time and the page returns the duration in hours, in minutes and in decimal hours, with an option for a shift that runs past.', 'h1' => 'Time Duration Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '09:00'],
                ['name' => 'end', 'label' => 'End time', 'type' => 'time', 'default' => '17:30'],
                [
                    'name' => 'overnight',
                    'label' => 'Does the shift run past midnight?',
                    'type' => 'select',
                    'options' => ['No, same day' => 0, 'Yes, past midnight' => 1],
                    'control' => 'SELECT',
                    'default' => 'No, same day',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Duration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Duration in minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'decimal',
                    'label' => 'Decimal hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'breaks',
                    'label' => 'After a 30-minute break',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['hours' => '(end - start + overnight * 86400000) / 3600000', 'minutes' => '(end - start + overnight * 86400000) / 60000', 'decimal' => '(end - start + overnight * 86400000) / 3600000', 'breaks' => '(end - start + overnight * 86400000) / 3600000 - 0.5'],
    'article' => [
        'intro' => 'A duration is the end time minus the start time. The page returns it in hours, in minutes and in decimal hours, which is the form a timesheet wants.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Clock time is not decimal, which is where most of the mistakes on a timesheet come from. Half past five is 17.5 hours in decimal and 17:30 on a clock, and a shift from nine to half past five is eight and a half hours, not eight point five zero minutes.</p><p>The page returns hours, minutes and decimal hours from the same subtraction, so a timesheet and a rota can be checked against each other.</p><p>The answer is <strong>duration and duration in minutes and decimal hours and after a 30-minute break</strong>, worked out from start time and end time and does the shift run past midnight?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000</code></td></tr><tr><td><strong>minutes</strong></td><td><code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 60000</code></td></tr><tr><td><strong>decimal</strong></td><td><code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000</code></td></tr><tr><td><strong>breaks</strong></td><td><code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000 - 0.5</code></td></tr></tbody></table><p>The two clock times arrive as milliseconds, so the difference is divided by 3 600 000 to reach hours and by 60 000 to reach minutes. The past-midnight answer adds a whole day's worth of milliseconds first.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports duration and duration in minutes and decimal hours and after a 30-minute break.</p><ul><li><strong>Start time</strong>.</li><li><strong>End time</strong>.</li><li><strong>Does the shift run past midnight?</strong>. A choice: No, same day, Yes, past midnight.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Duration</strong> — h.</li><li><strong>Duration in minutes</strong> — min.</li><li><strong>Decimal hours</strong> — h.</li><li><strong>After a 30-minute break</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 09:00, end time = 17:30, does the shift run past midnight? = 0 into the form and the panel reads:</p><ul><li><strong>Duration</strong> = <code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000</code> = <strong>8.5 h</strong></li><li><strong>Duration in minutes</strong> = <code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 60000</code> = <strong>510 min</strong></li><li><strong>Decimal hours</strong> = <code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000</code> = <strong>8.5 h</strong></li><li><strong>After a 30-minute break</strong> = <code>(End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000 - 0.5</code> = <strong>8 h</strong></li></ul><p>A shift from 22:00 to 06:00 needs the past-midnight answer. Without it the subtraction is negative, and negative hours are always a sign that the day boundary was crossed.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(6.3 × 10<sup>7< ÷ sup> - 3.24 × 10<sup>7< ÷ sup> + 0 × 86400000) ÷ 3600000</code>, which comes to <strong>8.5 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>09:00 to 17:30 is 8.5 hours, or 510 minutes, or 8.5 in decimal. Take off a half-hour break and it is 8.0, which is the number a payroll system will want.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Duration</th><th>Duration in minutes</th><th>Decimal hours</th><th>After a 30-minute break</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>−1.362 × 10<sup>-7</sup> %</td><td>−1.362 × 10<sup>-7</sup> %</td><td>−1.362 × 10<sup>-7</sup> %</td><td>−1.447 × 10<sup>-7</sup> %</td></tr><tr><td><strong>End time</strong> +1 hour</td><td>+1.362 × 10<sup>-7</sup> %</td><td>+1.362 × 10<sup>-7</sup> %</td><td>+1.362 × 10<sup>-7</sup> %</td><td>+1.447 × 10<sup>-7</sup> %</td></tr><tr><td><strong>Does the shift run past midnight?</strong> +10 %</td><td>+28.24 %</td><td>+28.24 %</td><td>+28.24 %</td><td>+30 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Does the shift run past midnight?</strong>. <strong>End time</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 00:00</li><li><strong>End time</strong> opens at 00:00</li><li><strong>Does the shift run past midnight?</strong> opens at 0</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 22:00, end time = 06:00, does the shift run past midnight? = 1: <strong>Duration</strong> = 24 h, <strong>Duration in minutes</strong> = 1 440 min, <strong>Decimal hours</strong> = 24 h, <strong>After a 30-minute break</strong> = 23.5 h. A night shift: eight hours once the day boundary is allowed for.</li><li>Set start time = 09:00, end time = 17:30, does the shift run past midnight? = 0: <strong>Duration</strong> = 9.838 × 10<sup>-8</sup> h, <strong>Duration in minutes</strong> = 5.903 × 10<sup>-6</sup> min, <strong>Decimal hours</strong> = 9.838 × 10<sup>-8</sup> h, <strong>After a 30-minute break</strong> = -0.5 h. The default day shift, and eight hours after a break.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading 17:30 as 17.30.</strong> Decimal hours are not clock minutes: 30 minutes is 0.5 of an hour, not 0.3.</li><li><strong>Forgetting the unpaid break.</strong> The fourth line does that subtraction once; two breaks need the arithmetic done twice.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No time zones.</strong> Both times are read on the same clock.</li></li><li><li><strong>One break only.</strong> The break line assumes thirty minutes.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and end time and does the shift run past midnight?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Duration and duration in minutes and decimal hours and after a 30-minute break should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Filling a timesheet.</li></li><li><li>Working out overtime.</li></li><li><li>Checking a rota against contracted hours.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hours-to-decimal">Hours to decimal</a> <a href="/everyday-life/add-time">Add time</a> <a href="/everyday-life/8-hour-shift">8-hour shift</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>8.5</td><td>8.5</td><td>unchanged</td></tr><tr><td><strong>End time</strong> +10 hours</td><td>8.5</td><td>8.5</td><td>unchanged</td></tr><tr><td><strong>Does the shift run past midnight?</strong> ×10</td><td>8.5</td><td>32.5</td><td>×3.824</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time Duration calculator work out?', 'a' => <<<'TXT'
            It returns duration and duration in minutes and decimal hours and after a 30-minute break from start time and end time and does the shift run past midnight?. The relationship is (End time - Start time + Does the shift run past midnight? × 86400000) ÷ 3600000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, End time, Does the shift run past midnight?. Everything else is computed.'],
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
            ['q' => 'Why is the duration in decimal hours as well as hours and minutes?', 'a' => 'Because payroll multiplies decimal hours by a rate. 8.5 is easy to multiply; 8 h 30 min is not.'],
            ['q' => 'What if the end time is earlier than the start?', 'a' => 'Answer yes to the past-midnight question. Otherwise the page reports a negative duration, which is honest rather than wrong.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
            ['path' => '/everyday-life/add-time', 'name' => 'Add time'],
            ['path' => '/everyday-life/8-hour-shift', 'name' => '8-hour shift'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
