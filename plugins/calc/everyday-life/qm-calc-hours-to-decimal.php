<?php

/**
 * Hours to Decimal Calculator
 * /everyday-life/hours-to-decimal
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hours to Decimal Calculator',
    'meta' => ['title' => 'Hours to Decimal — Time in Decimal Hours — Free Tool', 'description' => 'Turn hours, minutes and seconds into decimal hours, decimal minutes and a total in seconds, which is the form timesheets and invoices multiply by. Formula.', 'h1' => 'Hours to Decimal Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'h',
                    'label' => 'Hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'help' => 'Whole hours.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '45',
                    'help' => 'Minutes beyond the whole hours.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 's',
                    'label' => 'Seconds',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '30',
                    'help' => 'Seconds beyond the minutes.',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'minutes',
                    'label' => 'Total minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Total seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'pay',
                    'label' => 'Pay at 18.50 an hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['decimal' => 'h + m / 60 + s / 3600', 'minutes' => 'h * 60 + m + s / 60', 'seconds' => 'h * 3600 + m * 60 + s', 'pay' => '(h + m / 60 + s / 3600) * 18.5'],
    'article' => [
        'intro' => <<<'TXT'
        Decimal time is clock time with the base sixty taken out. The page converts hours, minutes and seconds into one number, and returns the same span in minutes and seconds so it can be checked.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A timesheet wants one number, and a clock gives three. Converting 2 h 45 min to 2.75 is the step that decides whether a week's pay is right, and it is the step most often done by adding the wrong part.</p><p>The pay line is the conversion multiplied by a rate, which is exactly what payroll software does with the decimal figure.</p><p>The answer is <strong>decimal hours and total minutes and total seconds and pay at 18.50 an hour</strong>, worked out from hours and minutes and seconds. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>decimal</strong></td><td><code>Hours + Minutes ÷ 60 + Seconds ÷ 3600</code></td></tr><tr><td><strong>minutes</strong></td><td><code>Hours × 60 + Minutes + Seconds ÷ 60</code></td></tr><tr><td><strong>seconds</strong></td><td><code>Hours × 3600 + Minutes × 60 + Seconds</code></td></tr><tr><td><strong>pay</strong></td><td><code>(Hours + Minutes ÷ 60 + Seconds ÷ 3600) × 18.5</code></td></tr></tbody></table><p>Minutes are divided by sixty and seconds by three thousand six hundred, because both are fractions of an hour. The total-seconds line multiplies the hours by 3 600 and adds the rest.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports decimal hours and total minutes and total seconds and pay at 18.50 an hour.</p><ul><li><strong>Hours</strong> — h. Whole hours.</li><li><strong>Minutes</strong> — min. Minutes beyond the whole hours.</li><li><strong>Seconds</strong> — s. Seconds beyond the minutes.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Decimal hours</strong> — h.</li><li><strong>Total minutes</strong> — min.</li><li><strong>Total seconds</strong> — s.</li><li><strong>Pay at 18.50 an hour</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hours = 2 h, minutes = 45 min, seconds = 30 s into the form and the panel reads:</p><ul><li><strong>Decimal hours</strong> = <code>Hours + Minutes ÷ 60 + Seconds ÷ 3600</code> = <strong>2.758 h</strong></li><li><strong>Total minutes</strong> = <code>Hours × 60 + Minutes + Seconds ÷ 60</code> = <strong>165.5 min</strong></li><li><strong>Total seconds</strong> = <code>Hours × 3600 + Minutes × 60 + Seconds</code> = <strong>9 930 s</strong></li><li><strong>Pay at 18.50 an hour</strong> = <code>(Hours + Minutes ÷ 60 + Seconds ÷ 3600) × 18.5</code> = <strong>51.029</strong></li></ul><p>Read the decimal to four places before rounding: 2.758 rounds to 2.76, and a fortnight of small roundings is a visible difference on a payslip.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>2 h 45 min 30 s is 2.7583 decimal hours, or 165.5 minutes, or 9 930 seconds. At 18.50 an hour that is 51.03.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Decimal hours</th><th>Total minutes</th><th>Total seconds</th><th>Pay at 18.50 an hour</th></tr></thead><tbody><tr><td><strong>Hours</strong> +10 %</td><td>+7.25 %</td><td>+7.25 %</td><td>+7.25 %</td><td>+7.25 %</td></tr><tr><td><strong>Minutes</strong> +10 %</td><td>+2.72 %</td><td>+2.72 %</td><td>+2.72 %</td><td>+2.72 %</td></tr><tr><td><strong>Seconds</strong> +10 %</td><td>+0.03 %</td><td>+0.03 %</td><td>+0.03 %</td><td>+0.03 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hours</strong>. <strong>Seconds</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hours</strong> opens at 2 h — Whole hours.</li><li><strong>Minutes</strong> opens at 45 min — Minutes beyond the whole hours.</li><li><strong>Seconds</strong> opens at 30 s — Seconds beyond the minutes.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hours</th><th>Decimal hours</th><th>Total minutes</th><th>Total seconds</th><th>Pay at 18.50 an hour</th></tr></thead><tbody><tr><td>1 h</td><td>1.758</td><td>105.5</td><td>6 330</td><td>32.529</td></tr><tr><td>2 h</td><td>2.758</td><td>165.5</td><td>9 930</td><td>51.029</td></tr><tr><td>4 h</td><td>4.758</td><td>285.5</td><td>17 130</td><td>88.029</td></tr><tr><td>10 h</td><td>10.758</td><td>645.5</td><td>38 730</td><td>199.029</td></tr><tr><td>20 h</td><td>20.758</td><td>1 245.5</td><td>74 730</td><td>384.029</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hours = 0, minutes = 90, seconds = 0: <strong>Decimal hours</strong> = 1.5 h, <strong>Total minutes</strong> = 90 min, <strong>Total seconds</strong> = 5 400 s, <strong>Pay at 18.50 an hour</strong> = 27.75. Ninety minutes is one and a half decimal hours.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Writing 2.45 for 2 h 45 min.</strong> The decimal equivalent is 2.75, because 45 minutes is three quarters of an hour.</li><li><strong>Rounding each day before adding.</strong> Add the decimal hours first and round the total, or the error compounds.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No unpaid breaks.</strong> Subtract them from the minutes before you type, or use the duration page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hours and minutes and seconds. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Decimal hours and total minutes and total seconds and pay at 18.50 an hour should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Turning a clock reading into a timesheet figure.</li></li><li><li>Checking a payroll line.</li></li><li><li>Converting a film or meeting length into decimal hours.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-duration">Time duration</a> <a href="/everyday-life/hours-minutes">Hours and minutes</a> <a href="/everyday-life/time-to-decimal">Time to decimal</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hours</strong> ×10</td><td>2.758</td><td>20.758</td><td>×7.526</td></tr><tr><td><strong>Minutes</strong> ×10</td><td>2.758</td><td>9.508</td><td>×3.447</td></tr><tr><td><strong>Seconds</strong> ×10</td><td>2.758</td><td>2.833</td><td>×1.027</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hours to Decimal calculator work out?', 'a' => <<<'TXT'
            It returns decimal hours and total minutes and total seconds and pay at 18.50 an hour from hours and minutes and seconds. The relationship is Hours + Minutes ÷ 60 + Seconds ÷ 3600.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Hours (h), Minutes (min), Seconds (s). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hours in h; minutes in min; seconds in s. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why not just write 2.45?', 'a' => 'Because 45 minutes is 0.75 of an hour. Writing 2.45 understates the time by eighteen minutes.'],
            ['q' => 'Which figure should go on an invoice?', 'a' => 'Decimal hours, to two places. The minutes line is for checking, not for billing.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
            ['path' => '/everyday-life/hours-minutes', 'name' => 'Hours and minutes'],
            ['path' => '/everyday-life/time-to-decimal', 'name' => 'Time to decimal'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
