<?php

/**
 * Time in Between Calculator
 * /everyday-life/time-in-between
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time in Between Calculator',
    'meta' => ['title' => 'Time in Between — The Midpoint of Two Clock Times', 'description' => 'The time exactly halfway between two clock times, with the length of each half in hours and minutes, for splitting a shift or meeting in the middle. Formula.', 'h1' => 'Time in Between Calculator', 'updated' => '2026-10-23'],
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
                ['name' => 'middle', 'label' => 'Time halfway between', 'type' => 'time'],
                [
                    'name' => 'gap_hours',
                    'label' => 'Length of each half',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'gap_minutes',
                    'label' => 'Length of each half',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['middle' => 'mod(start + mod(end - start + overnight * 86400000, 86400000) / 2, 86400000)', 'gap_hours' => 'mod(end - start + overnight * 86400000, 86400000) / 7200000', 'gap_minutes' => 'mod(end - start + overnight * 86400000, 86400000) / 120000'],
    'article' => [
        'intro' => 'The midpoint of two readings on the dial, and the distance from each end to it. Halfway between nine and half past five is a quarter past one.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Meeting in the middle of a gap sounds like a division until the gap crosses midnight, and then it is a division and a wrap. Two people four and a half hours apart meet two and a quarter hours from each end, and the clock time that comes out is not the average of the two numbers on its face.</p><p>The page returns the midpoint as a clock reading and the length of each half, so a split shift or a handover can be timed without a spreadsheet.</p><p>The answer is <strong>time halfway between and length of each half and length of each half</strong>, worked out from first time and second time and does the second time fall on the next day?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>middle</strong></td><td><code>mod(First time + mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 2, 86400000)</code></td></tr><tr><td><strong>gap_hours</strong></td><td><code>mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 7200000</code></td></tr><tr><td><strong>gap_minutes</strong></td><td><code>mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 120000</code></td></tr></tbody></table><p>The gap is taken modulo one day, halved, and added to the start before the result is wrapped back onto the dial. Halving before adding is what keeps the midpoint inside the day the gap belongs to.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports time halfway between and length of each half and length of each half.</p><ul><li><strong>First time</strong>.</li><li><strong>Second time</strong>.</li><li><strong>Does the second time fall on the next day?</strong>. A choice: No, same day, Yes, past midnight.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time halfway between</strong>.</li><li><strong>Length of each half</strong> — h.</li><li><strong>Length of each half</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put first time = 09:00, second time = 17:30, does the second time fall on the next day? = 0 into the form and the panel reads:</p><ul><li><strong>Time halfway between</strong> = <code>mod(First time + mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 2, 86400000)</code> = <strong>13:15</strong></li><li><strong>Length of each half</strong> = <code>mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 7200000</code> = <strong>4.25 h</strong></li><li><strong>Length of each half</strong> = <code>mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 120000</code> = <strong>255 min</strong></li></ul><p>The half-length line is the one to check: add it to the start and you are at the midpoint, add it again and you are at the end.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Halfway between 09:00 and 17:30 is 13:15, which is four and a quarter hours from each end. Halfway between 22:00 and 06:00 is 02:00, four hours from each.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time halfway between</th><th>Length of each half</th><th>Length of each half</th></tr></thead><tbody><tr><td><strong>First time</strong> +1 hour</td><td>+0 d</td><td>−11.76 %</td><td>−11.76 %</td></tr><tr><td><strong>Second time</strong> +1 hour</td><td>+0 d</td><td>+11.76 %</td><td>+11.76 %</td></tr><tr><td><strong>Does the second time fall on the next day?</strong> +10 %</td><td>+0 d</td><td>+28.24 %</td><td>+28.24 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Does the second time fall on the next day?</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>First time</strong> opens at 09:00</li><li><strong>Second time</strong> opens at 17:30</li><li><strong>Does the second time fall on the next day?</strong> opens at 0</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set first time = 22:00, second time = 06:00, does the second time fall on the next day? = 1: <strong>Time halfway between</strong> = 02:00, <strong>Length of each half</strong> = 4 h, <strong>Length of each half</strong> = 240 min. The midpoint of a night that runs ten to six is two in the morning, four hours from either end.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Averaging the two readings.</strong> Nine and seventeen and a half is not thirteen unless the half has been added properly to the start.</li><li><strong>Ignoring the midnight crossing.</strong> Halfway between ten at night and six in the morning is two, and the switch is what says so.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Two ends only.</strong> A handover between three people is two runs of this page, one gap at a time.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need first time and second time and does the second time fall on the next day?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time halfway between and length of each half and length of each half should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Splitting a long shift between two people.</li></li><li><li>Timing a handover halfway through a night watch.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-difference">Time difference</a> <a href="/everyday-life/time-duration">Time duration</a> <a href="/everyday-life/minutes-between-two-times">Minutes between two times</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>First time</strong> +10 hours</td><td>13:15</td><td>18:15</td><td>+0 d</td></tr><tr><td><strong>Second time</strong> +10 hours</td><td>13:15</td><td>18:15</td><td>+0 d</td></tr><tr><td><strong>Does the second time fall on the next day?</strong> ×10</td><td>13:15</td><td>13:15</td><td>+0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time in Between calculator work out?', 'a' => <<<'TXT'
            It returns time halfway between and length of each half and length of each half from first time and second time and does the second time fall on the next day?. The relationship is mod(First time + mod(Second time - First time + Does the second time fall on the next day? × 86400000, 86400000) ÷ 2, 86400000).
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
            ['q' => 'Why is the answer a clock time rather than a number?', 'a' => 'Because the question is where the middle falls on the dial, not how long it is. The two length lines answer the second question.'],
            ['q' => 'What if the gap is an odd number of minutes?', 'a' => 'The midpoint lands on a half minute and the clock line rounds to the minute the picker can show. The length lines keep the exact figure.'],
            ['q' => 'Does it work across midnight?', 'a' => 'Yes, with the overnight switch ticked. Without it, ten to six reads as a negative gap and the midpoint has no meaning.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-difference', 'name' => 'Time difference'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
            ['path' => '/everyday-life/minutes-between-two-times', 'name' => 'Minutes between two times'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
