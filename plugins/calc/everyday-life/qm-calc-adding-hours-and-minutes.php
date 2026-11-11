<?php

/**
 * Adding Hours and Minutes Calculator
 * /everyday-life/adding-hours-and-minutes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Adding Hours and Minutes Calculator',
    'meta' => ['title' => 'Adding Hours and Minutes — Resulting Clock Time', 'description' => 'Add hours and minutes to a clock time and read the time it lands on, how many minutes went by and whether the answer crossed midnight. Both boxes, one answer..', 'h1' => 'Adding Hours and Minutes Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '08:15'],
                [
                    'name' => 'hours',
                    'label' => 'Hours to add',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '7',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes to add',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'result', 'label' => 'Time after adding', 'type' => 'time'],
                [
                    'name' => 'day_shift',
                    'label' => 'Days past midnight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'elapsed_minutes',
                    'label' => 'Minutes added in total',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['result' => 'mod(start + hours * 3600000 + minutes * 60000, 86400000)', 'day_shift' => 'floor((start + hours * 3600000 + minutes * 60000) / 86400000)', 'elapsed_minutes' => 'hours * 60 + minutes'],
    'article' => [
        'intro' => 'A clock time plus a spell written the way people say it: seven hours and fifty minutes. The page returns the landed reading and the elapsed minutes behind it.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Most durations in the real world arrive as two numbers: seven hours and fifty minutes, two hours and twenty. Adding them to a start time in your head means carrying the minutes past sixty and remembering the hour you carried.</p><p>Put both numbers in and the page does the carrying. The elapsed line is the same spell in a single unit, which is useful when the minutes part is not a round number and the clock reading alone does not tell you how far it moved.</p><p>The answer is <strong>time after adding and days past midnight and minutes added in total</strong>, worked out from start time and hours to add and minutes to add. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>result</strong></td><td><code>mod(Start time + Hours to add × 3600000 + Minutes to add × 60000, 86400000)</code></td></tr><tr><td><strong>day_shift</strong></td><td><code>floor((Start time + Hours to add × 3600000 + Minutes to add × 60000) ÷ 86400000)</code></td></tr><tr><td><strong>elapsed_minutes</strong></td><td><code>Hours to add × 60 + Minutes to add</code></td></tr></tbody></table><p>Hours and minutes become milliseconds separately and are added to the start time before the wrap. The elapsed line multiplies the hours by sixty and adds the minutes, so it is the size of the move rather than the place it landed.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports time after adding and days past midnight and minutes added in total.</p><ul><li><strong>Start time</strong>.</li><li><strong>Hours to add</strong> — h.</li><li><strong>Minutes to add</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time after adding</strong>.</li><li><strong>Days past midnight</strong> — days.</li><li><strong>Minutes added in total</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 08:15, hours to add = 7 h, minutes to add = 50 min into the form and the panel reads:</p><ul><li><strong>Time after adding</strong> = <code>mod(Start time + Hours to add × 3600000 + Minutes to add × 60000, 86400000)</code> = <strong>16:05</strong></li><li><strong>Days past midnight</strong> = <code>floor((Start time + Hours to add × 3600000 + Minutes to add × 60000) ÷ 86400000)</code> = <strong>0 days</strong></li><li><strong>Minutes added in total</strong> = <code>Hours to add × 60 + Minutes to add</code> = <strong>470 min</strong></li></ul><p>A meeting that overruns its booked slot is the usual case: the start time is on the invite and the overrun is a spell, not an end time.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A quarter past eight plus seven hours fifty minutes is 16:05, 470 minutes later and no day crossed. Half past nine at night plus three forty-five is 01:15 the following morning.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time after adding</th><th>Days past midnight</th><th>Minutes added in total</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>+0 d</td><td>—</td><td>+0 %</td></tr><tr><td><strong>Hours to add</strong> +10 %</td><td>+0 d</td><td>—</td><td>+8.94 %</td></tr><tr><td><strong>Minutes to add</strong> +10 %</td><td>+0 d</td><td>—</td><td>+1.06 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hours to add</strong>. <strong>Minutes to add</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 08:15</li><li><strong>Hours to add</strong> opens at 7 h</li><li><strong>Minutes to add</strong> opens at 50 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 21:30, hours to add = 3, minutes to add = 45: <strong>Time after adding</strong> = 01:15, <strong>Days past midnight</strong> = 1 days, <strong>Minutes added in total</strong> = 225 min. Three forty-five after half past nine at night crosses midnight by an hour and a quarter: the day line reads 1.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Putting the minutes in the hours box.</strong> Seven hours fifty minutes is 7 and 50, not 7.5 and 0; 7.5 would be half past the seventh hour.</li><li><strong>Losing the day when the minutes carry.</strong> The clock wraps quietly and the day line is the only place the date shows.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No seconds box.</strong> The page works to the minute, which is the resolution a rota or a booking is written in.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and hours to add and minutes to add. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time after adding and days past midnight and minutes added in total should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>A meeting that overran its slot.</li></li><li><li>Planning the end of a journey from its start and its driving time.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/adding-hours">Adding hours</a> <a href="/everyday-life/add-minutes">Add minutes</a> <a href="/everyday-life/time-adder">Time adder</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>16:05</td><td>02:05</td><td>-1 d</td></tr><tr><td><strong>Hours to add</strong> ×10</td><td>16:05</td><td>07:05</td><td>-0 d</td></tr><tr><td><strong>Minutes to add</strong> ×10</td><td>16:05</td><td>23:35</td><td>+0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Adding Hours and Minutes calculator work out?', 'a' => <<<'TXT'
            It returns time after adding and days past midnight and minutes added in total from start time and hours to add and minutes to add. The relationship is mod(Start time + Hours to add × 3600000 + Minutes to add × 60000, 86400000).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, Hours to add (h), Minutes to add (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hours to add in h; minutes to add in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why are there separate hours and minutes boxes?', 'a' => 'Because that is how the spell is written down. Keeping them apart means 7 h 50 min goes in exactly as it appears on the rota, with no conversion first.'],
            ['q' => 'What does the elapsed line add?', 'a' => 'It is the size of the move in minutes. 7 h 50 min is 470 minutes, which is easier to compare with a 480-minute shift than the clock reading is.'],
            ['q' => 'Can the minutes box hold more than 60?', 'a' => 'Yes. Ninety minutes is accepted and carries into the hours, so a page cannot be spoiled by a box holding a slightly wrong unit.'],
        ],
        'related' => [
            ['path' => '/everyday-life/adding-hours', 'name' => 'Adding hours'],
            ['path' => '/everyday-life/add-minutes', 'name' => 'Add minutes'],
            ['path' => '/everyday-life/time-adder', 'name' => 'Time adder'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
