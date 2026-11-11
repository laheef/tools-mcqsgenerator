<?php

/**
 * Days Between Dates
 * /everyday-life/days-between-dates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days Between Dates',
    'meta' => ['title' => 'Days Between Dates — Day Count and Weeks — Free Tool', 'description' => 'Count the days between two calendar dates, with or without the last day counted, and read the same span in weeks and in approximate months. Formula shown.', 'h1' => 'Days Between Dates', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'date1',
                    'label' => 'From',
                    'type' => 'date',
                    'default' => '2026-01-01',
                    'help' => 'The earlier date. The count runs forward from here.',
                ],
                [
                    'name' => 'date2',
                    'label' => 'To',
                    'type' => 'date',
                    'default' => '2026-12-31',
                    'help' => 'The later date.',
                ],
                [
                    'name' => 'include_end',
                    'label' => 'Count the second date as a day?',
                    'type' => 'select',
                    'options' => ['Yes, include it' => 1, 'No, stop the day before' => 0],
                    'control' => 'SELECT',
                    'default' => '1',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days between',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'months',
                    'label' => 'Months, roughly',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'months',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'date2 - date1 + include_end', 'weeks' => '(date2 - date1 + include_end) / 7', 'months' => '(date2 - date1 + include_end) / 30.436875'],
    'article' => [
        'intro' => <<<'TXT'
        Two dates are two day numbers, and the count between them is one subtraction. The page also decides whether the second date counts as a day in the span, which is the difference between a hotel stay and a deadline.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A calendar is a count of days, not a count of months. That is why this page subtracts the two dates instead of comparing months and years, and why the week figure is exact while the month figure is an average.</p><p>The include-the-last-day switch matters more than it looks. From the first to the third of a month is two days if you subtract, and three if you count both ends. Both are correct answers to different questions.</p><p>The answer is <strong>days between and weeks and months, roughly</strong>, worked out from from and to and count the second date as a day?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>To - From + Count the second date as a day?</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(To - From + Count the second date as a day?) ÷ 7</code></td></tr><tr><td><strong>months</strong></td><td><code>(To - From + Count the second date as a day?) ÷ 30.436875</code></td></tr></tbody></table><p>30.436 875 is the average length of a calendar month over the 400-year Gregorian cycle, so the months line is an estimate and is labelled as one.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports days between and weeks and months, roughly.</p><ul><li><strong>From</strong>. The earlier date. The count runs forward from here.</li><li><strong>To</strong>. The later date.</li><li><strong>Count the second date as a day?</strong>. A choice: Yes, include it, No, stop the day before.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days between</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Months, roughly</strong> — months.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put from = 1 January 2026, to = 31 December 2026, count the second date as a day? = 1 into the form and the panel reads:</p><ul><li><strong>Days between</strong> = <code>To - From + Count the second date as a day?</code> = <strong>365 days</strong></li><li><strong>Weeks</strong> = <code>(To - From + Count the second date as a day?) ÷ 7</code> = <strong>52.143 weeks</strong></li><li><strong>Months, roughly</strong> = <code>(To - From + Count the second date as a day?) ÷ 30.436875</code> = <strong>11.992 months</strong></li></ul><p>Subtracting two day numbers gives the number of nights between them, which is why the hotel version of this question leaves the last date out.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 818 - 20 454 + 1</code>, which comes to <strong>365 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A full year from 1 January to 31 December is 365 days including both ends, or 364 without the last. The week figure, 52.14, is the reminder that a year is not fifty-two weeks exactly.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days between</th><th>Weeks</th><th>Months, roughly</th></tr></thead><tbody><tr><td><strong>From</strong> +1 day</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td></tr><tr><td><strong>To</strong> +1 day</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td></tr><tr><td><strong>Count the second date as a day?</strong> +10 %</td><td>+0.03 %</td><td>+0.03 %</td><td>+0.03 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>From</strong>. <strong>Count the second date as a day?</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>From</strong> opens at 1 January 2026 — The earlier date. The count runs forward from here.</li><li><strong>To</strong> opens at 31 December 2026 — The later date.</li><li><strong>Count the second date as a day?</strong> opens at 1</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set from = 1 January 2026, to = 31 January 2026, count the second date as a day? = 0: <strong>Days between</strong> = 30 days, <strong>Weeks</strong> = 4.286 weeks, <strong>Months, roughly</strong> = 0.986 months. Thirty days from the first to the last of January, when the last is not counted.</li><li>Set from = 1 March 2026, to = 31 March 2026, count the second date as a day? = 1: <strong>Days between</strong> = 31 days, <strong>Weeks</strong> = 4.429 weeks, <strong>Months, roughly</strong> = 1.019 months. March 2026 is 31 days including both ends.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Subtracting by hand across a new year.</strong> Day numbers handle it; months-by-hand rarely do.</li><li><strong>Counting the same day twice.</strong> Two dates a week apart are seven days or eight, depending on the switch, and both have a use.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar days only.</strong> Time zones and daylight saving do not change a day count.</li></li><li><li><strong>No working days.</strong> Weekends and holidays are counted here. The working-days page is the one that skips them.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Why an off-by-one is the normal mistake', 'html' => <<<'TXT'
            <p>Almost every argument about a date count is an argument about the two ends. A holiday from the fifth to the twelfth is seven nights and eight days. A notice period of thirty days starting today ends on the twenty-ninth of next month, not the thirtieth. Both readings are defensible; only one is the reading the contract uses.</p><p>When a count matters, write the answer as a pair: the number and whether both ends are included. Seven nights (eight days) cannot be misread. Seven days can.</p><p>Leap years are the second source of disagreement. A span that crosses 29 February is one day longer than the same dates in an ordinary year, and the day count is the only figure on this page that gets that right without an adjustment.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need from and to and count the second date as a day?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days between and weeks and months, roughly should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out a notice period.</li></li><li><li>Counting nights for a booking.</li></li><li><li>Checking a deadline against a calendar.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/working-days">Working days</a> <a href="/everyday-life/month-counter">Month counter</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>From</strong> +10 days</td><td>365</td><td>355</td><td>×0.973</td></tr><tr><td><strong>To</strong> +10 days</td><td>365</td><td>375</td><td>×1.027</td></tr><tr><td><strong>Count the second date as a day?</strong> ×10</td><td>365</td><td>374</td><td>×1.025</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days Between Dates calculator work out?', 'a' => <<<'TXT'
            It returns days between and weeks and months, roughly from from and to and count the second date as a day?. The relationship is To - From + Count the second date as a day?.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'From, To, Count the second date as a day?. Everything else is computed.'],
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
            ['q' => 'Is the first date counted?', 'a' => 'Yes. The count includes the starting date and adds the last one only if you ask for it, so the same pair of dates can give two answers a day apart.'],
            ['q' => 'Why are the months approximate?', 'a' => 'Because months are not a fixed length. The page divides by the average month length and labels the result as an estimate; the day count is exact.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
            ['path' => '/everyday-life/month-counter', 'name' => 'Month counter'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
