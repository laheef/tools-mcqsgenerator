<?php

/**
 * 8 Hour Shift Calculator
 * /everyday-life/8-hour-shift
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '8 Hour Shift Calculator',
    'meta' => ['title' => '8 Hour Shift — When an Eight-Hour Shift Ends', 'description' => 'An eight-hour shift starting at nine ends at half past five, not five: the clock-out time once the unpaid break is added, with hours on site alongside.', 'h1' => '8 Hour Shift Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'start',
                    'label' => 'Start time',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '9',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'paid',
                    'label' => 'Paid hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'break_min',
                    'label' => 'Unpaid break',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'end',
                    'label' => 'Clock out',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'end_min',
                    'label' => 'Clock out',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'span',
                    'label' => 'Hours on site',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'paid_min',
                    'label' => 'Minutes paid',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['end' => 'start + paid + break_min / 60', 'end_min' => '(start + paid + break_min / 60) * 60', 'span' => 'paid + break_min / 60', 'paid_min' => 'paid * 60'],
    'article' => [
        'intro' => 'The time a shift ends when eight hours are paid and a break is not, and what the same shift costs in hours once the break is counted.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Eight paid hours starting at nine ends at half past five, not five, because the half-hour lunch sits inside the day and outside the pay.</p><p>That is why an eight-hour shift is nine and a half hours from the door to the door once travel is counted, and why a rota built on eight-hour blocks runs half an hour late by the end of the week.</p><p>The answer is <strong>clock out and clock out and hours on site and minutes paid</strong>, worked out from start time and paid hours and unpaid break. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>end</strong></td><td><code>Start time + Paid hours + Unpaid break ÷ 60</code></td></tr><tr><td><strong>end_min</strong></td><td><code>(Start time + Paid hours + Unpaid break ÷ 60) × 60</code></td></tr><tr><td><strong>span</strong></td><td><code>Paid hours + Unpaid break ÷ 60</code></td></tr><tr><td><strong>paid_min</strong></td><td><code>Paid hours × 60</code></td></tr></tbody></table><p>Start plus the paid hours plus the break in hours gives the clock-out time. Minutes are that times sixty, and the span is the paid hours plus the break.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports clock out and clock out and hours on site and minutes paid.</p><ul><li><strong>Start time</strong> — h.</li><li><strong>Paid hours</strong> — h.</li><li><strong>Unpaid break</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Clock out</strong> — h.</li><li><strong>Clock out</strong> — min.</li><li><strong>Hours on site</strong> — h.</li><li><strong>Minutes paid</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 9 h, paid hours = 8 h, unpaid break = 30 min into the form and the panel reads:</p><ul><li><strong>Clock out</strong> = <code>Start time + Paid hours + Unpaid break ÷ 60</code> = <strong>17.5 h</strong></li><li><strong>Clock out</strong> = <code>(Start time + Paid hours + Unpaid break ÷ 60) × 60</code> = <strong>1 050 min</strong></li><li><strong>Hours on site</strong> = <code>Paid hours + Unpaid break ÷ 60</code> = <strong>8.5 h</strong></li><li><strong>Minutes paid</strong> = <code>Paid hours × 60</code> = <strong>480 min</strong></li></ul><p>A one-hour break pushes the clock-out to six, and the same eight paid hours then take nine from arrival to departure.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>9 + 8 + 30 ÷ 60</code>, which comes to <strong>17.5 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Nine o\'clock plus eight paid hours plus a thirty-minute break is half past five: 17.5 on the clock, 8.5 hours on site and 480 minutes paid.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Clock out</th><th>Clock out</th><th>Hours on site</th><th>Minutes paid</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 %</td><td>+5.14 %</td><td>+5.14 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Paid hours</strong> +10 %</td><td>+4.57 %</td><td>+4.57 %</td><td>+9.41 %</td><td>+10 %</td></tr><tr><td><strong>Unpaid break</strong> +10 %</td><td>+0.29 %</td><td>+0.29 %</td><td>+0.59 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Paid hours</strong>. <strong>Unpaid break</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 9 h</li><li><strong>Paid hours</strong> opens at 8 h</li><li><strong>Unpaid break</strong> opens at 30 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Start time</th><th>Clock out</th><th>Clock out</th><th>Hours on site</th><th>Minutes paid</th></tr></thead><tbody><tr><td>4.5 h</td><td>13</td><td>780</td><td>8.5</td><td>480</td></tr><tr><td>9 h</td><td>17.5</td><td>1 050</td><td>8.5</td><td>480</td></tr><tr><td>18 h</td><td>26.5</td><td>1 590</td><td>8.5</td><td>480</td></tr><tr><td>45 h</td><td>53.5</td><td>3 210</td><td>8.5</td><td>480</td></tr><tr><td>90 h</td><td>98.5</td><td>5 910</td><td>8.5</td><td>480</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 9, paid hours = 8, unpaid break = 60: <strong>Clock out</strong> = 18 h, <strong>Clock out</strong> = 1 080 min, <strong>Hours on site</strong> = 9 h, <strong>Minutes paid</strong> = 480 min. An hour of break pushes clock-out to six and the time on site to nine hours for the same eight paid.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adding eight hours to nine.</strong> That is five o'clock, and it is half an hour early every single day. The break is part of the day and not part of the pay.</li><li><strong>Assuming the break is unpaid.</strong> Not every job works that way. If the break is paid, leave the field at zero and the shift ends an hour earlier.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One break.</strong> Two breaks and a lunch need to be added together before they go in the field.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and paid hours and unpaid break. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Clock out and clock out and hours on site and minutes paid should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a rota backwards from a finish time.</li></li><li><li>Checking a shift pattern before agreeing to it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-card">Time card</a> <a href="/everyday-life/working-days">Working days</a> <a href="/everyday-life/30-min">30-minute blocks</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> ×10</td><td>17.5</td><td>98.5</td><td>×5.629</td></tr><tr><td><strong>Paid hours</strong> ×10</td><td>17.5</td><td>89.5</td><td>×5.114</td></tr><tr><td><strong>Unpaid break</strong> ×10</td><td>17.5</td><td>22</td><td>×1.257</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 8 Hour Shift calculator work out?', 'a' => <<<'TXT'
            It returns clock out and clock out and hours on site and minutes paid from start time and paid hours and unpaid break. The relationship is Start time + Paid hours + Unpaid break ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time (h), Paid hours (h), Unpaid break (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: start time in h; paid hours in h; unpaid break in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does an eight-hour shift take nine and a half hours?', 'a' => 'Because the unpaid break is inside it and travel is outside it. The paid hours are eight; the day is longer in both directions.'],
            ['q' => 'What time does an 8 to 5 shift end?', 'a' => 'Five o\'clock if the break is unpaid — 8 to 5 is nine hours on the clock and eight paid once an hour comes off.'],
            ['q' => 'Does a night shift change the sum?', 'a' => 'It changes the clock reading, not the hours. A start at 22 with eight paid hours and half an hour of break ends at 6.5, which is half past six the next morning.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
