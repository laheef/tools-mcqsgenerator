<?php

/**
 * Time Adder
 * /everyday-life/time-adder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time Adder',
    'meta' => ['title' => 'Time Adder — Add Four Spells of Hours and Minutes', 'description' => 'Four rows of hours and minutes added into one total, reported in decimal hours, in minutes and in seconds, for a rota, a log or a week of short jobs. Formula.', 'h1' => 'Time Adder', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'h1',
                    'label' => 'Row 1, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm1',
                    'label' => 'Row 1, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h2',
                    'label' => 'Row 2, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm2',
                    'label' => 'Row 2, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h3',
                    'label' => 'Row 3, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm3',
                    'label' => 'Row 3, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h4',
                    'label' => 'Row 4, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm4',
                    'label' => 'Row 4, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
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
    'formula' => ['total_seconds' => '(h1 * 60 + m1 + h2 * 60 + m2 + h3 * 60 + m3 + h4 * 60 + m4) * 60', 'total_minutes' => 'h1 * 60 + m1 + h2 * 60 + m2 + h3 * 60 + m3 + h4 * 60 + m4', 'total_hours' => '(h1 * 60 + m1 + h2 * 60 + m2 + h3 * 60 + m3 + h4 * 60 + m4) / 60'],
    'article' => [
        'intro' => 'A column of four durations summed. The total is the same figure in three units, so a timesheet, a spreadsheet and a stopwatch can all be checked against it.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A timesheet is a column of spells, and the column is where the errors live. Four rows, four carries at sixty, and by the third one most people are adding sixty-five to a total they wrote down as sixty. The mistakes are small and they repeat every week.</p><p>This page is that column. Four rows of hours and minutes go in, one total comes out, and the same total is shown in hours, minutes and seconds so it can be copied into whichever sheet is waiting for it.</p><p>The answer is <strong>total hours and total minutes and total seconds</strong>, worked out from row 1, hours and row 1, minutes and row 2, hours and row 2, minutes and row 3, hours and row 3, minutes and row 4, hours and row 4, minutes. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_seconds</strong></td><td><code>(Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes) × 60</code></td></tr><tr><td><strong>total_minutes</strong></td><td><code>Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>(Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes) ÷ 60</code></td></tr></tbody></table><p>Each row is worth its hours times sixty plus its minutes, and the four are added in that unit before anything is divided. Adding in minutes first is what stops a rounded hour from leaking into the total.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill. It reports total hours and total minutes and total seconds.</p><ul><li><strong>Row 1, hours</strong> — h.</li><li><strong>Row 1, minutes</strong> — min.</li><li><strong>Row 2, hours</strong> — h.</li><li><strong>Row 2, minutes</strong> — min.</li><li><strong>Row 3, hours</strong> — h.</li><li><strong>Row 3, minutes</strong> — min.</li><li><strong>Row 4, hours</strong> — h.</li><li><strong>Row 4, minutes</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Total hours</strong> — h.</li><li><strong>Total minutes</strong> — min.</li><li><strong>Total seconds</strong> — s.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put row 1, hours = 1 h, row 1, minutes = 30 min, row 2, hours = 2 h, row 2, minutes = 15 min, row 3, hours = 0 h, row 3, minutes = 45 min, row 4, hours = 3 h, row 4, minutes = 0 min into the form and the panel reads:</p><ul><li><strong>Total hours</strong> = <code>(Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes) ÷ 60</code> = <strong>7.5 h</strong></li><li><strong>Total minutes</strong> = <code>Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes</code> = <strong>450 min</strong></li><li><strong>Total seconds</strong> = <code>(Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes) × 60</code> = <strong>27 000 s</strong></li></ul><p>Leave the unused rows at zero rather than deleting them; the label keeps the sheet aligned with the one the hours came from.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(1 × 60 + 30 + 2 × 60 + 15 + 0 × 60 + 45 + 3 × 60 + 0) ÷ 60</code>, which comes to <strong>7.5 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>1 h 30, 2 h 15, 0 h 45 and 3 h 00 come to 7.5 hours, which is 450 minutes or 27 000 seconds. A row of zeros is a row you have not used, and it costs the total nothing.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Total hours</th><th>Total minutes</th><th>Total seconds</th></tr></thead><tbody><tr><td><strong>Row 1, hours</strong> +10 %</td><td>+1.33 %</td><td>+1.33 %</td><td>+1.33 %</td></tr><tr><td><strong>Row 1, minutes</strong> +10 %</td><td>+0.67 %</td><td>+0.67 %</td><td>+0.67 %</td></tr><tr><td><strong>Row 2, hours</strong> +10 %</td><td>+2.67 %</td><td>+2.67 %</td><td>+2.67 %</td></tr><tr><td><strong>Row 2, minutes</strong> +10 %</td><td>+0.33 %</td><td>+0.33 %</td><td>+0.33 %</td></tr><tr><td><strong>Row 3, hours</strong> +10 %</td><td>+1.33 %</td><td>+1.33 %</td><td>+1.33 %</td></tr><tr><td><strong>Row 3, minutes</strong> +10 %</td><td>+1 %</td><td>+1 %</td><td>+1 %</td></tr><tr><td><strong>Row 4, hours</strong> +10 %</td><td>+4 %</td><td>+4 %</td><td>+4 %</td></tr><tr><td><strong>Row 4, minutes</strong> +10 %</td><td>+0.02 %</td><td>+0.02 %</td><td>+0.02 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Row 4, hours</strong>. <strong>Row 4, minutes</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Row 1, hours</strong> opens at 1 h</li><li><strong>Row 1, minutes</strong> opens at 30 min</li><li><strong>Row 2, hours</strong> opens at 2 h</li><li><strong>Row 2, minutes</strong> opens at 15 min</li><li><strong>Row 3, hours</strong> opens at 0 h</li><li><strong>Row 3, minutes</strong> opens at 45 min</li><li><strong>Row 4, hours</strong> opens at 3 h</li><li><strong>Row 4, minutes</strong> opens at 0 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Row 1, hours</th><th>Total hours</th><th>Total minutes</th><th>Total seconds</th></tr></thead><tbody><tr><td>0.5 h</td><td>7</td><td>420</td><td>25 200</td></tr><tr><td>1 h</td><td>7.5</td><td>450</td><td>27 000</td></tr><tr><td>2 h</td><td>8.5</td><td>510</td><td>30 600</td></tr><tr><td>5 h</td><td>11.5</td><td>690</td><td>41 400</td></tr><tr><td>10 h</td><td>16.5</td><td>990</td><td>59 400</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set row 1, hours = 2, row 1, minutes = 0, row 2, hours = 2, row 2, minutes = 0, row 3, hours = 2, row 3, minutes = 0, row 4, hours = 2, row 4, minutes = 0: <strong>Total hours</strong> = 8 h, <strong>Total minutes</strong> = 480 min, <strong>Total seconds</strong> = 28 800 s. Four rows of two hours come to eight, which is the check that the page is adding hours rather than minutes.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adding hours and minutes as two separate columns.</strong> The minutes column overflows at sixty, and the hours column never learns about the overflow.</li><li><strong>Rounding each row first.</strong> Three rows rounded to a quarter hour can leave the total a quarter hour away from the truth.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Four rows.</strong> A fortnight of shifts needs the total split across several passes or a spreadsheet; this page is for a day or a week.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need row 1, hours and row 1, minutes and row 2, hours and row 2, minutes and row 3, hours and row 3, minutes and row 4, hours and row 4, minutes. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Total hours and total minutes and total seconds should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Adding a day of short jobs into one billable figure.</li></li><li><li>Checking a rota column against a payroll figure.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/add-time">Add time</a> <a href="/everyday-life/hours-to-decimal">Hours to decimal</a> <a href="/everyday-life/time-duration">Time duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Row 1, hours</strong> ×10</td><td>7.5</td><td>16.5</td><td>×2.2</td></tr><tr><td><strong>Row 1, minutes</strong> ×10</td><td>7.5</td><td>12</td><td>×1.6</td></tr><tr><td><strong>Row 2, hours</strong> ×10</td><td>7.5</td><td>25.5</td><td>×3.4</td></tr><tr><td><strong>Row 2, minutes</strong> ×10</td><td>7.5</td><td>9.75</td><td>×1.3</td></tr><tr><td><strong>Row 3, hours</strong> ×10</td><td>7.5</td><td>8.5</td><td>×1.133</td></tr><tr><td><strong>Row 3, minutes</strong> ×10</td><td>7.5</td><td>14.25</td><td>×1.9</td></tr><tr><td><strong>Row 4, hours</strong> ×10</td><td>7.5</td><td>34.5</td><td>×4.6</td></tr><tr><td><strong>Row 4, minutes</strong> ×10</td><td>7.5</td><td>7.517</td><td>×1.002</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time Adder calculator work out?', 'a' => <<<'TXT'
            It returns total hours and total minutes and total seconds from row 1, hours and row 1, minutes and row 2, hours and row 2, minutes and row 3, hours and row 3, minutes and row 4, hours and row 4, minutes. The relationship is (Row 1, hours × 60 + Row 1, minutes + Row 2, hours × 60 + Row 2, minutes + Row 3, hours × 60 + Row 3, minutes + Row 4, hours × 60 + Row 4, minutes) × 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Row 1, hours (h), Row 1, minutes (min), Row 2, hours (h), Row 2, minutes (min), Row 3, hours (h), Row 3, minutes (min), Row 4, hours (h), Row 4, minutes (min). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: row 1, hours in h; row 1, minutes in min; row 2, hours in h; row 2, minutes in min; row 3, hours in h; row 3, minutes in min; row 4, hours in h; row 4, minutes in min. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why four rows?', 'a' => 'Because four fits a morning, an afternoon and two extras without scrolling, and the column on a timesheet is usually four or five lines.'],
            ['q' => 'Should the minutes be written as decimals?', 'a' => 'No. The minutes box holds whole minutes, so forty-five minutes goes in as 45. The decimal version of the total is one of the answers.'],
            ['q' => 'What does the seconds line add for a rota?', 'a' => 'Nothing. It is there for the case where the rows come from a stopwatch, and it costs nothing to show.'],
        ],
        'related' => [
            ['path' => '/everyday-life/add-time', 'name' => 'Add time'],
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
