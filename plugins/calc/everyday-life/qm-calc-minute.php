<?php

/**
 * Minute Calculator
 * /everyday-life/minute
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Minute Calculator',
    'meta' => ['title' => 'Minute Calculator — Minutes into Hours and Days', 'description' => 'Ninety minutes is one and a half hours, 5 400 seconds and 0.0625 of a day, with the same length of time written out in each of those three units in turn.', 'h1' => 'Minute Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '90',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'day_share',
                    'label' => 'Share of a day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['hours' => 'minutes / 60', 'seconds' => 'minutes * 60', 'days' => 'minutes / 1440', 'day_share' => 'minutes / 1440 * 100'],
    'article' => [
        'intro' => 'Any number of minutes converted to hours, seconds, days and a decimal day, with the hour and minute form written out.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A minute is a unit that hides how long it is. Ninety minutes sounds like a meeting and is an hour and a half; a thousand minutes sounds like a short task and is sixteen hours and forty, which is two working days.</p><p>The conversion is one division and one multiplication: divide by sixty for hours, multiply by sixty for seconds, divide by 1 440 for days because a day is twenty-four hours of sixty minutes.</p><p>The answer is <strong>hours and seconds and days and share of a day</strong>, worked out from minutes. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>Minutes ÷ 60</code></td></tr><tr><td><strong>seconds</strong></td><td><code>Minutes × 60</code></td></tr><tr><td><strong>days</strong></td><td><code>Minutes ÷ 1440</code></td></tr><tr><td><strong>day_share</strong></td><td><code>Minutes ÷ 1440 × 100</code></td></tr></tbody></table><p>Minutes over sixty gives hours, times sixty gives seconds, over 1 440 gives days, and the share of a day is that times a hundred.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports hours and seconds and days and share of a day.</p><ul><li><strong>Minutes</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours</strong> — h.</li><li><strong>Seconds</strong> — s.</li><li><strong>Days</strong> — days.</li><li><strong>Share of a day</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put minutes = 90 min into the form and the panel reads:</p><ul><li><strong>Hours</strong> = <code>Minutes ÷ 60</code> = <strong>1.5 h</strong></li><li><strong>Seconds</strong> = <code>Minutes × 60</code> = <strong>5 400 s</strong></li><li><strong>Days</strong> = <code>Minutes ÷ 1440</code> = <strong>0.062 days</strong></li><li><strong>Share of a day</strong> = <code>Minutes ÷ 1440 × 100</code> = <strong>6.25 %</strong></li></ul><p>A thousand minutes is 16.67 hours and 0.694 of a day, which is the difference between an afternoon and two working days.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>90 ÷ 60</code>, which comes to <strong>1.5 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Ninety minutes is 1.5 hours, 5 400 seconds and 0.0625 of a day — 6.25 per cent of the twenty-four.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours</th><th>Seconds</th><th>Days</th><th>Share of a day</th></tr></thead><tbody><tr><td><strong>Minutes</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Minutes</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Minutes</strong> opens at 90 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Minutes</th><th>Hours</th><th>Seconds</th><th>Days</th><th>Share of a day</th></tr></thead><tbody><tr><td>45 min</td><td>0.75</td><td>2 700</td><td>0.031</td><td>3.125</td></tr><tr><td>90 min</td><td>1.5</td><td>5 400</td><td>0.062</td><td>6.25</td></tr><tr><td>180 min</td><td>3</td><td>10 800</td><td>0.125</td><td>12.5</td></tr><tr><td>450 min</td><td>7.5</td><td>27 000</td><td>0.312</td><td>31.25</td></tr><tr><td>900 min</td><td>15</td><td>54 000</td><td>0.625</td><td>62.5</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set minutes = 1 000: <strong>Hours</strong> = 16.667 h, <strong>Seconds</strong> = 60 000 s, <strong>Days</strong> = 0.694 days, <strong>Share of a day</strong> = 69.444 %. A thousand minutes is 16.67 hours — two working days and forty minutes, which is rarely what a plan means by a thousand minutes.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading 100 minutes as 1.40 hours.</strong> It is 1.67. Minutes and hundredths of an hour are different units, and the difference over a month of shifts is money.</li><li><strong>Forgetting that a day is 1 440 minutes.</strong> Multiplying by twenty-four gives hours, not days, and the decimal then looks reasonable and is not.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Whole minutes.</strong> Seconds are accepted through the seconds result, not as an input. A duration of 90.5 minutes needs the half minute written as 30 seconds separately.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need minutes. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours and seconds and days and share of a day should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Turning a length in minutes into hours for a schedule.</li></li><li><li>Checking whether a task fits in the working day.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hours-minutes">Hours and minutes</a> <a href="/everyday-life/time-to-decimal">Time to decimal</a> <a href="/everyday-life/deadline">Deadline</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Minutes</strong> ×10</td><td>1.5</td><td>15</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Minute calculator work out?', 'a' => 'It returns hours and seconds and days and share of a day from minutes. The relationship is Minutes ÷ 60.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Minutes (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: minutes in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many minutes are in a day?', 'a' => '1 440. Twenty-four hours of sixty minutes, which is also the divisor this page uses.'],
            ['q' => 'What is 90 minutes in hours?', 'a' => 'One and a half. Divide by sixty: 90 over 60 is 1.5, and in hours and minutes that is 1:30.'],
            ['q' => 'How do I convert minutes to hours and minutes?', 'a' => 'The whole hours are the minutes divided by sixty, rounded down, and the remainder is the minutes. 135 is 2:15.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-minutes', 'name' => 'Hours and minutes'],
            ['path' => '/everyday-life/time-to-decimal', 'name' => 'Time to decimal'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
