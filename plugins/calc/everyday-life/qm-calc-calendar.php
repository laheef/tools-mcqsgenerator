<?php

/**
 * Calendar Calculator
 * /everyday-life/calendar
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Calendar Calculator',
    'meta' => ['title' => 'Calendar Calculator — Add or Subtract Date Units', 'description' => 'Move a start date forward or backward by calendar years, months, weeks and days. The result includes the new date, exact day difference and weekday for each.', 'h1' => 'Calendar Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start date', 'type' => 'date', 'default' => '2026-01-01'],
                [
                    'name' => 'direction',
                    'label' => 'Move',
                    'type' => 'select',
                    'options' => ['Add' => 1, 'Subtract' => -1],
                    'control' => 'SELECT',
                    'default' => 'Add',
                ],
                [
                    'name' => 'years',
                    'label' => 'Years',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'months',
                    'label' => 'Months',
                    'type' => 'number',
                    'suffix' => 'months',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks',
                    'type' => 'number',
                    'suffix' => 'weeks',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '19',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'result', 'label' => 'Resulting date', 'type' => 'date'],
                [
                    'name' => 'elapsed',
                    'label' => 'Days moved',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday (Sunday is 0)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['result' => 'dateAtMonthsOld(dateAtYearsOld(start, direction * years), direction * months) + direction * (weeks * 7 + days)', 'elapsed' => 'dateAtMonthsOld(dateAtYearsOld(start, direction * years), direction * months) + direction * (weeks * 7 + days) - start', 'weekday' => 'getDayOfWeek(dateAtMonthsOld(dateAtYearsOld(start, direction * years), direction * months) + direction * (weeks * 7 + days))'],
    'article' => [
        'intro' => <<<'TXT'
        Add or subtract several date units from a start date. Years and months move as calendar anniversaries, while weeks and days are added as fixed day counts, each way.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            Calendar arithmetic is not the same as adding a fixed number of days. One month after 31 January has no 31st day in February, so the date lands on February's last day. Weeks and days, by contrast, have fixed lengths. This calculator applies each part in order and makes that order explicit.<p>The answer is <strong>resulting date and days moved and weekday</strong>, worked out from start date and move and years and months and weeks and days. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>result</strong></td><td><code>dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days)</code></td></tr><tr><td><strong>elapsed</strong></td><td><code>dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days) - Start date</code></td></tr><tr><td><strong>weekday</strong></td><td><code>getDayOfWeek(dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days))</code></td></tr></tbody></table><p>The selected direction multiplies each amount by positive one or negative one. Whole years and months use calendar anniversary helpers; weeks become seven days and the day amount is added last. A month-end anniversary clamps to the destination month's final day.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports resulting date and days moved and weekday.</p><ul><li><strong>Start date</strong>.</li><li><strong>Move</strong>. A choice: Add, Subtract.</li><li><strong>Years</strong> — years.</li><li><strong>Months</strong> — months.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Days</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Resulting date</strong>.</li><li><strong>Days moved</strong> — days.</li><li><strong>Weekday (Sunday is 0)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start date = 1 January 2026, move = 1, years = 0 years, months = 15 months, weeks = 0 weeks, days = 19 days into the form and the panel reads:</p><ul><li><strong>Resulting date</strong> = <code>dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days)</code> = <strong>20 April 2027</strong></li><li><strong>Days moved</strong> = <code>dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days) - Start date</code> = <strong>474 days</strong></li><li><strong>Weekday (Sunday is 0)</strong> = <code>getDayOfWeek(dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days))</code> = <strong>2</strong></li></ul><p>When combining years and months, the page moves years first, then months, then fixed weeks and days. This order can matter near month ends: adding a month and then a day is not always equivalent to adding a day and then a month. The calculation keeps the units separate rather than replacing every month with 30 days. If you need a contract date, check whether its wording means calendar months, a fixed number of days, or a business-day adjustment. The result does not skip weekends or holidays. Negative amounts can also be supplied, but using the direction control is clearer when the intention is to move back through the calendar.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>dateAtMonthsOld(dateAtYearsOld(20 454, 1 × 0), 1 × 15) + 1 × (0 × 7 + 19)</code>, which comes to <strong>20 April 2027</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Starting on 1 January 2026, adding 15 months reaches 1 April 2027, then adding 19 days gives 20 April 2027. The result is 474 days after the start and falls on Tuesday. One month after 31 January clamps to 28 February 2026.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Resulting date</th><th>Days moved</th><th>Weekday (Sunday is 0)</th></tr></thead><tbody><tr><td><strong>Start date</strong> +1 day</td><td>+1 d</td><td>+0 %</td><td>+50 %</td></tr><tr><td><strong>Move</strong> +10 %</td><td>+32 d</td><td>+6.73 %</td><td>+200 %</td></tr><tr><td><strong>Years</strong> +10 %</td><td>+0 d</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Months</strong> +10 %</td><td>+30 d</td><td>+6.33 %</td><td>+100 %</td></tr><tr><td><strong>Weeks</strong> +10 %</td><td>+1 d</td><td>+0.15 %</td><td>+50 %</td></tr><tr><td><strong>Days</strong> +10 %</td><td>+2 d</td><td>+0.4 %</td><td>+100 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Move</strong>. <strong>Years</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start date</strong> opens at 1 January 2026</li><li><strong>Move</strong> opens at 1</li><li><strong>Years</strong> opens at 0 years</li><li><strong>Months</strong> opens at 15 months</li><li><strong>Weeks</strong> opens at 0 weeks</li><li><strong>Days</strong> opens at 19 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing elapsed days with inclusive dates.</strong> Subtracting dates gives the distance between them. Counting both endpoints adds one, which is right for a list of dates and wrong for nights away.</li><li><strong>Assuming a month is thirty days.</strong> Month lengths vary, and an anniversary can land on the last day of a shorter month.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar dates, not local clock hours.</strong> Daylight-saving changes and time zones do not alter a date-only result.</li></li><li><li><strong>Named conventions matter.</strong> If a contract, school or workplace defines its own first and last day, use that wording rather than guessing.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The calendar detail behind this answer', 'html' => <<<'TXT'
            When combining years and months, the page moves years first, then months, then fixed weeks and days. This order can matter near month ends: adding a month and then a day is not always equivalent to adding a day and then a month. The calculation keeps the units separate rather than replacing every month with 30 days. If you need a contract date, check whether its wording means calendar months, a fixed number of days, or a business-day adjustment. The result does not skip weekends or holidays. Negative amounts can also be supplied, but using the direction control is clearer when the intention is to move back through the calendar.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start date and move and years and months and weeks and days. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Resulting date and days moved and weekday should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/months-between-dates">Months between dates</a> <a href="/everyday-life/date-countdown">Date countdown</a> <a href="/everyday-life/days-between-dates">Days between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start date</strong> +10 days</td><td>20 April 2027</td><td>30 April 2027</td><td>+10 d</td></tr><tr><td><strong>Move</strong> ×10</td><td>20 April 2027</td><td>7 January 2039</td><td>+4280 d</td></tr><tr><td><strong>Years</strong> ×10</td><td>20 April 2027</td><td>20 April 2028</td><td>+366 d</td></tr><tr><td><strong>Months</strong> ×10</td><td>20 April 2027</td><td>20 July 2038</td><td>+4109 d</td></tr><tr><td><strong>Weeks</strong> ×10</td><td>20 April 2027</td><td>27 April 2027</td><td>+7 d</td></tr><tr><td><strong>Days</strong> ×10</td><td>20 April 2027</td><td>8 October 2027</td><td>+171 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Calendar calculator work out?', 'a' => <<<'TXT'
            It returns resulting date and days moved and weekday from start date and move and years and months and weeks and days. The relationship is dateAtMonthsOld(dateAtYearsOld(Start date, Move × Years), Move × Months) + Move × (Weeks × 7 + Days).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start date, Move, Years (years), Months (months), Weeks (weeks), Days (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: years in years; months in months; weeks in weeks; days in days. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is a month treated as 30 days?', 'a' => 'No. Months move by calendar anniversary and clamp at the destination month\'s last day.'],
            ['q' => 'What happens on 31 January plus one month?', 'a' => 'It lands on the last valid February date: 28 or 29.'],
            ['q' => 'Are weekends skipped?', 'a' => 'No. Weeks and days are ordinary calendar units.'],
            ['q' => 'Can I subtract time?', 'a' => 'Yes. Choose Subtract; the same unit sequence moves backward.'],
        ],
        'related' => [
            ['path' => '/everyday-life/months-between-dates', 'name' => 'Months between dates'],
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
