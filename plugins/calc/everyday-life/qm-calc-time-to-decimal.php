<?php

/**
 * Time to Decimal Calculator
 * /everyday-life/time-to-decimal
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time to Decimal Calculator',
    'meta' => ['title' => 'Time to Decimal — Seven Hours Forty-Eight as 7.80', 'description' => 'Seven hours forty-eight minutes and thirty seconds is 7.8083 decimal hours: the figure a payroll sheet wants, with the minute and second shares alongside.', 'h1' => 'Time to Decimal Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours',
                    'label' => 'Hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '7',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '48',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Seconds',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'decimal_hours',
                    'label' => 'Decimal hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'decimal_minutes',
                    'label' => 'Decimal minutes',
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
                [
                    'name' => 'seconds_share',
                    'label' => 'Seconds share of the hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['decimal_hours' => 'hours + minutes / 60 + seconds / 3600', 'decimal_minutes' => 'hours * 60 + minutes + seconds / 60', 'total_seconds' => 'hours * 3600 + minutes * 60 + seconds', 'seconds_share' => '(minutes / 60 + seconds / 3600) * 100'],
    'article' => [
        'intro' => 'A duration given as hours, minutes and seconds written as decimal hours, decimal minutes and total seconds.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Decimal time is the language of payroll and invoicing, and clock time is the language of everybody else. Seven hours forty-eight is 7.80 on a timesheet, and writing 7.48 is a third of an hour short.</p><p>Each part converts on its own denominator: minutes over sixty, seconds over three thousand six hundred. Forty-eight minutes is 0.80 and thirty seconds is 0.0083, so the total is 7.8083 hours.</p><p>The answer is <strong>decimal hours and decimal minutes and total seconds and seconds share of the hour</strong>, worked out from hours and minutes and seconds. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>decimal_hours</strong></td><td><code>Hours + Minutes ÷ 60 + Seconds ÷ 3600</code></td></tr><tr><td><strong>decimal_minutes</strong></td><td><code>Hours × 60 + Minutes + Seconds ÷ 60</code></td></tr><tr><td><strong>total_seconds</strong></td><td><code>Hours × 3600 + Minutes × 60 + Seconds</code></td></tr><tr><td><strong>seconds_share</strong></td><td><code>(Minutes ÷ 60 + Seconds ÷ 3600) × 100</code></td></tr></tbody></table><p>Hours plus minutes over sixty plus seconds over 3 600 gives decimal hours. Times sixty gives decimal minutes and times 3 600 gives the total in seconds.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports decimal hours and decimal minutes and total seconds and seconds share of the hour.</p><ul><li><strong>Hours</strong> — h.</li><li><strong>Minutes</strong> — min.</li><li><strong>Seconds</strong> — s.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Decimal hours</strong> — h.</li><li><strong>Decimal minutes</strong> — min.</li><li><strong>Total seconds</strong> — s.</li><li><strong>Seconds share of the hour</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hours = 7 h, minutes = 48 min, seconds = 30 s into the form and the panel reads:</p><ul><li><strong>Decimal hours</strong> = <code>Hours + Minutes ÷ 60 + Seconds ÷ 3600</code> = <strong>7.808 h</strong></li><li><strong>Decimal minutes</strong> = <code>Hours × 60 + Minutes + Seconds ÷ 60</code> = <strong>468.5 min</strong></li><li><strong>Total seconds</strong> = <code>Hours × 3600 + Minutes × 60 + Seconds</code> = <strong>28 110 s</strong></li><li><strong>Seconds share of the hour</strong> = <code>(Minutes ÷ 60 + Seconds ÷ 3600) × 100</code> = <strong>80.833 %</strong></li></ul><p>Drop the half minute and the figure is 7.80 — the round number a timesheet usually shows, and the one payroll will accept.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>7 hours 48 minutes 30 seconds is 7.8083 decimal hours, 468.5 decimal minutes and 28 110 seconds.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Decimal hours</th><th>Decimal minutes</th><th>Total seconds</th><th>Seconds share of the hour</th></tr></thead><tbody><tr><td><strong>Hours</strong> +10 %</td><td>+8.96 %</td><td>+8.96 %</td><td>+8.96 %</td><td>+0 %</td></tr><tr><td><strong>Minutes</strong> +10 %</td><td>+1.02 %</td><td>+1.02 %</td><td>+1.02 %</td><td>+9.9 %</td></tr><tr><td><strong>Seconds</strong> +10 %</td><td>+0.01 %</td><td>+0.01 %</td><td>+0.01 %</td><td>+0.1 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Minutes</strong>. <strong>Seconds</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hours</strong> opens at 7 h</li><li><strong>Minutes</strong> opens at 48 min</li><li><strong>Seconds</strong> opens at 30 s</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hours</th><th>Decimal hours</th><th>Decimal minutes</th><th>Total seconds</th><th>Seconds share of the hour</th></tr></thead><tbody><tr><td>3.5 h</td><td>4.308</td><td>258.5</td><td>15 510</td><td>80.833</td></tr><tr><td>7 h</td><td>7.808</td><td>468.5</td><td>28 110</td><td>80.833</td></tr><tr><td>14 h</td><td>14.808</td><td>888.5</td><td>53 310</td><td>80.833</td></tr><tr><td>35 h</td><td>35.808</td><td>2 148.5</td><td>128 910</td><td>80.833</td></tr><tr><td>70 h</td><td>70.808</td><td>4 248.5</td><td>254 910</td><td>80.833</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hours = 7, minutes = 48, seconds = 0: <strong>Decimal hours</strong> = 7.8 h, <strong>Decimal minutes</strong> = 468 min, <strong>Total seconds</strong> = 28 080 s, <strong>Seconds share of the hour</strong> = 80 %. Without the seconds the same shift is 7.80 decimal hours exactly — the figure that appears on most timesheets.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Writing the minutes after the point.</strong> 7:48 is 7.80, not 7.48. The point is a decimal point, and the digits after it are not minutes.</li><li><strong>Rounding each part before adding.</strong> Forty-eight minutes rounds to 0.80 and thirty seconds to 0.01, and the total is then out by a minute. Round once, at the end.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Less than a day.</strong> The conversion is a duration and not a clock time. Twenty-five hours stays 25, it does not wrap to one.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hours and minutes and seconds. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Decimal hours and decimal minutes and total seconds and seconds share of the hour should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Filling in a timesheet from a hand-written note.</li></li><li><li>Converting a stopwatch reading for an invoice.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hours-minutes">Hours and minutes</a> <a href="/everyday-life/decimal-time-conversion">Decimal time conversion</a> <a href="/everyday-life/time-card">Time card</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hours</strong> ×10</td><td>7.808</td><td>70.808</td><td>×9.068</td></tr><tr><td><strong>Minutes</strong> ×10</td><td>7.808</td><td>15.008</td><td>×1.922</td></tr><tr><td><strong>Seconds</strong> ×10</td><td>7.808</td><td>7.883</td><td>×1.01</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time to Decimal calculator work out?', 'a' => <<<'TXT'
            It returns decimal hours and decimal minutes and total seconds and seconds share of the hour from hours and minutes and seconds. The relationship is Hours + Minutes ÷ 60 + Seconds ÷ 3600.
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
            ['q' => 'What is 7 hours 48 minutes in decimals?', 'a' => '7.80. Forty-eight minutes is four-fifths of an hour, so the fraction is exact.'],
            ['q' => 'Why is 30 minutes 0.5 and not 0.30?', 'a' => 'Because the decimal counts hundredths of an hour and the minute counts sixtieths. Thirty over sixty is a half.'],
            ['q' => 'How do I convert back?', 'a' => 'The whole number is the hours; multiply the fraction by sixty for minutes and the remainder by sixty again for seconds.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-minutes', 'name' => 'Hours and minutes'],
            ['path' => '/everyday-life/decimal-time-conversion', 'name' => 'Decimal time conversion'],
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
