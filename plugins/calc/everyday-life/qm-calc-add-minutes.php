<?php

/**
 * Add Minutes to a Time Calculator
 * /everyday-life/add-minutes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Add Minutes to a Time Calculator',
    'meta' => ['title' => 'Add Minutes to a Time — Resulting Clock Time', 'description' => 'Take a clock time, add a number of minutes, and read the time it lands on, the count of minutes from midnight and whether the answer crossed into the next day..', 'h1' => 'Add Minutes to a Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '09:00'],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes to add',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '90',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'result', 'label' => 'Time after adding', 'type' => 'time'],
                [
                    'name' => 'minutes_from_midnight',
                    'label' => 'Minutes from midnight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'day_shift',
                    'label' => 'Days past midnight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['result' => 'mod(start + minutes * 60000, 86400000)', 'minutes_from_midnight' => '(start + minutes * 60000) / 60000', 'day_shift' => 'floor((start + minutes * 60000) / 86400000)'],
    'article' => [
        'intro' => 'A start time and a number of minutes, added on the 24-hour dial. The page rolls past midnight rather than returning a time that does not exist.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Ninety minutes after nine o'clock is half past ten, not ten thirty in some decimal sense. The dial has twenty-four positions and the minutes wrap at the end of the day, so the arithmetic has to wrap too.</p><p>The page gives the landed time, the running count of minutes from midnight, and how many whole days the addition passed. That last number is the one an overnight job needs.</p><p>The answer is <strong>time after adding and minutes from midnight and days past midnight</strong>, worked out from start time and minutes to add. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>result</strong></td><td><code>mod(Start time + Minutes to add × 60000, 86400000)</code></td></tr><tr><td><strong>minutes_from_midnight</strong></td><td><code>(Start time + Minutes to add × 60000) ÷ 60000</code></td></tr><tr><td><strong>day_shift</strong></td><td><code>floor((Start time + Minutes to add × 60000) ÷ 86400000)</code></td></tr></tbody></table><p>Minutes become milliseconds on the way in, the sum is taken modulo one day so it lands back inside the dial, and the floor division counts how many whole days were crossed. The two are separate answers because one wraps and the other does not.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports time after adding and minutes from midnight and days past midnight.</p><ul><li><strong>Start time</strong>.</li><li><strong>Minutes to add</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time after adding</strong>.</li><li><strong>Minutes from midnight</strong> — min.</li><li><strong>Days past midnight</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 09:00, minutes to add = 90 min into the form and the panel reads:</p><ul><li><strong>Time after adding</strong> = <code>mod(Start time + Minutes to add × 60000, 86400000)</code> = <strong>10:30</strong></li><li><strong>Minutes from midnight</strong> = <code>(Start time + Minutes to add × 60000) ÷ 60000</code> = <strong>630 min</strong></li><li><strong>Days past midnight</strong> = <code>floor((Start time + Minutes to add × 60000) ÷ 86400000)</code> = <strong>0 days</strong></li></ul><p>Adding an oven time or a delay to a wall clock is the everyday use. The minutes-from-midnight line is what a machine log stores instead of a clock reading.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Nine o'clock plus ninety minutes is 10:30, which is 630 minutes from midnight and no full day crossed. Ten minutes to midnight plus twenty-five minutes lands at 00:15 on the following day.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time after adding</th><th>Minutes from midnight</th><th>Days past midnight</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>+0 d</td><td>+9.52 %</td><td>—</td></tr><tr><td><strong>Minutes to add</strong> +10 %</td><td>+0 d</td><td>+1.43 %</td><td>—</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Start time</strong>. <strong>Minutes to add</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 09:00</li><li><strong>Minutes to add</strong> opens at 90 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 23:50, minutes to add = 25: <strong>Time after adding</strong> = 00:15, <strong>Minutes from midnight</strong> = 1 455 min, <strong>Days past midnight</strong> = 1 days. Twenty-five minutes past the last minute of the day rolls into 00:15 and counts one day past midnight.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting the day rollover.</strong> 23:50 plus 25 minutes is 00:15 on the next day, and a rota that writes only the clock time loses a date.</li><li><strong>Adding minutes as decimal hours.</strong> 1.5 in the minutes box is one minute and thirty seconds, not ninety minutes.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No seconds box.</strong> A clock time here is read to the minute; a stopwatch answer belongs on the duration page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and minutes to add. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time after adding and minutes from midnight and days past midnight should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out when a cake comes out of the oven.</li></li><li><li>Shifting a schedule by a fixed delay.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/adding-hours">Adding hours</a> <a href="/everyday-life/adding-hours-and-minutes">Adding hours and minutes</a> <a href="/everyday-life/time-duration">Time duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>10:30</td><td>20:30</td><td>+0 d</td></tr><tr><td><strong>Minutes to add</strong> ×10</td><td>10:30</td><td>00:00</td><td>-0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Add Minutes to a Time calculator work out?', 'a' => <<<'TXT'
            It returns time after adding and minutes from midnight and days past midnight from start time and minutes to add. The relationship is mod(Start time + Minutes to add × 60000, 86400000).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, Minutes to add (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: minutes to add in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What happens past midnight?', 'a' => 'The clock time wraps to the small hours and the days-past-midnight line says 1. Nothing is clipped at 23:59.'],
            ['q' => 'Can I add a negative number of minutes?', 'a' => 'Yes. The box takes a minus sign, and the wrap takes the answer back into the previous day rather than turning it into a negative clock reading.'],
            ['q' => 'Why is there a minutes-from-midnight answer?', 'a' => 'Because that count is what a schedule, a script or a spreadsheet actually stores. 630 is easier to do further arithmetic with than 10:30.'],
        ],
        'related' => [
            ['path' => '/everyday-life/adding-hours', 'name' => 'Adding hours'],
            ['path' => '/everyday-life/adding-hours-and-minutes', 'name' => 'Adding hours and minutes'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
