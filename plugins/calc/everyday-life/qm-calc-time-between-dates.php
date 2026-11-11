<?php

/**
 * Time Between Dates Calculator
 * /everyday-life/time-between-dates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time Between Dates Calculator',
    'meta' => ['title' => 'Time Between Dates — Days, Hours and Minutes', 'description' => 'Two dates and two clock times subtracted into whole days, total hours and total minutes, for a delivery window, a deadline or any span that starts and ends.', 'h1' => 'Time Between Dates Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date1', 'label' => 'Start date', 'type' => 'date', 'default' => '2026-01-15'],
                ['name' => 'time1', 'label' => 'Start time', 'type' => 'time', 'default' => '09:00'],
                ['name' => 'date2', 'label' => 'End date', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'time2', 'label' => 'End time', 'type' => 'time', 'default' => '17:30'],
                [
                    'name' => 'whole_days',
                    'label' => 'Whole days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
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
    'formula' => ['whole_days' => 'floor((date2 - date1 + time2 - time1) / 86400000)', 'total_hours' => '(date2 - date1 + time2 - time1) / 3600000', 'total_minutes' => '(date2 - date1 + time2 - time1) / 60000'],
    'article' => [
        'intro' => <<<'TXT'
        A start date and time and an end date and time, with the gap reported three ways. The whole days come first because that is how a long span gets described out loud.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A contract that runs from nine in the morning on one date to half past five on another is a number of days plus eight and a half hours, and doing that in your head is where the off-by-one lives. Count the start day, count the end day, argue about whether either counts.</p><p>The page subtracts the dates and the times together and reports the same span in days, hours and minutes, so a window written in days can be checked against a schedule written in hours.</p><p>The answer is <strong>whole days and total hours and total minutes</strong>, worked out from start date and start time and end date and end time. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>whole_days</strong></td><td><code>floor((End date - Start date + End time - Start time) ÷ 86400000)</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>(End date - Start date + End time - Start time) ÷ 3600000</code></td></tr><tr><td><strong>total_minutes</strong></td><td><code>(End date - Start date + End time - Start time) ÷ 60000</code></td></tr></tbody></table><p>A date and a clock time both arrive as milliseconds, so the two pairs subtract directly. The whole-day line takes the floor of that span over 86 400 000 and the other two lines divide it by an hour and a minute.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports whole days and total hours and total minutes.</p><ul><li><strong>Start date</strong>.</li><li><strong>Start time</strong>.</li><li><strong>End date</strong>.</li><li><strong>End time</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Whole days</strong> — days.</li><li><strong>Total hours</strong> — h.</li><li><strong>Total minutes</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start date = 15 January 2026, start time = 09:00, end date = 23 October 2026, end time = 17:30 into the form and the panel reads:</p><ul><li><strong>Whole days</strong> = <code>floor((End date - Start date + End time - Start time) ÷ 86400000)</code> = <strong>281 days</strong></li><li><strong>Total hours</strong> = <code>(End date - Start date + End time - Start time) ÷ 3600000</code> = <strong>6 752.5 h</strong></li><li><strong>Total minutes</strong> = <code>(End date - Start date + End time - Start time) ÷ 60000</code> = <strong>405 150 min</strong></li></ul><p>The decimal in the hours line is the leftover part of a day, not a rounding error: 6 752.5 hours is 6 752 hours and 30 minutes.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>15 January at 09:00 to 23 October at 17:30 is 281 whole days, which is 6 752.5 hours or 405 150 minutes. The half day is the eight and a half hours between the two clock times.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Whole days</th><th>Total hours</th><th>Total minutes</th></tr></thead><tbody><tr><td><strong>Start date</strong> +1 day</td><td>−0.36 %</td><td>−0.36 %</td><td>−0.36 %</td></tr><tr><td><strong>Start time</strong> +1 hour</td><td>+0 %</td><td>−0.01 %</td><td>−0.01 %</td></tr><tr><td><strong>End date</strong> +1 day</td><td>+0.36 %</td><td>+0.36 %</td><td>+0.36 %</td></tr><tr><td><strong>End time</strong> +1 hour</td><td>+0 %</td><td>+0.01 %</td><td>+0.01 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Start date</strong>. <strong>End time</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start date</strong> opens at 15 January 2026</li><li><strong>Start time</strong> opens at 09:00</li><li><strong>End date</strong> opens at 23 October 2026</li><li><strong>End time</strong> opens at 17:30</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start date = 1 January 2020, start time = 00:00, end date = 2 January 2020, end time = 06:00: <strong>Whole days</strong> = 1 days, <strong>Total hours</strong> = 30 h, <strong>Total minutes</strong> = 1 800 min. One day and six hours is 30 hours total: the day line reads 1 and the hours line keeps the extra six.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ignoring the clock times.</strong> Two dates alone give a whole number of days; the times are what turn it into a span with a half day in it.</li><li><strong>Counting both end dates.</strong> The span is a subtraction, so the second date is a boundary rather than an extra day.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No working-day count.</strong> Every calendar day counts, weekends included; the working-days page is the other question.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start date and start time and end date and end time. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Whole days and total hours and total minutes should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>A deadline that runs to a time of day.</li></li><li><li>Converting a contract term into billable hours.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/time-duration">Time duration</a> <a href="/everyday-life/day-counter">Day counter</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start date</strong> +10 days</td><td>281</td><td>271</td><td>×0.964</td></tr><tr><td><strong>Start time</strong> +10 hours</td><td>281</td><td>280</td><td>×0.996</td></tr><tr><td><strong>End date</strong> +10 days</td><td>281</td><td>291</td><td>×1.036</td></tr><tr><td><strong>End time</strong> +10 hours</td><td>281</td><td>281</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time Between Dates calculator work out?', 'a' => <<<'TXT'
            It returns whole days and total hours and total minutes from start date and start time and end date and end time. The relationship is floor((End date - Start date + End time - Start time) ÷ 86400000).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start date, Start time, End date, End time. Everything else is computed.'],
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
            ['q' => 'Why give both days and hours?', 'a' => 'Because a long span is described in days and a short one in hours, and the same subtraction produces both. Neither is more correct than the other.'],
            ['q' => 'Are the clock times optional?', 'a' => 'No. Leave one blank and nothing is computed, rather than the page quietly assuming midnight.'],
            ['q' => 'Does it handle a span that ends before it starts?', 'a' => 'Yes. A negative span comes back as a negative number of hours, which is the honest answer and a sign the dates were swapped.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
