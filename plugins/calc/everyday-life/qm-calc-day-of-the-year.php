<?php

/**
 * Day of the Year Calculator
 * /everyday-life/day-of-the-year
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Day of the Year Calculator',
    'meta' => ['title' => 'Day of the Year — Ordinal Date and Year Left', 'description' => 'See the day number, share of the year elapsed, days remaining and approximate week number for any date as well. Leap years use 366 days rather than 365.', 'h1' => 'Day of the Year Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Date', 'type' => 'date', 'default' => '2027-02-28'],
                [
                    'name' => 'ordinal',
                    'label' => 'Day of the year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'day',
                ],
                [
                    'name' => 'percent',
                    'label' => 'Year elapsed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'left',
                    'label' => 'Days left after this date',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'week',
                    'label' => 'Week number, approximate',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'week',
                ],
            ],
        ],
    ],
    'formula' => ['ordinal' => 'getDayOfYear(date) + 1', 'percent' => <<<'TXT'
    (getDayOfYear(date) + 1) / if_else(mod(getYear(date), 400) == 0, 366, if_else(mod(getYear(date), 100) == 0, 365, if_else(mod(getYear(date), 4) == 0, 366, 365))) * 100
    TXT, 'left' => 'if_else(mod(getYear(date), 400) == 0, 366, if_else(mod(getYear(date), 100) == 0, 365, if_else(mod(getYear(date), 4) == 0, 366, 365))) - getDayOfYear(date) - 1', 'week' => 'floor(getDayOfYear(date) / 7) + 1'],
    'article' => [
        'intro' => 'The ordinal date answers where a calendar day sits in its year. This page also shows the fraction of the year elapsed and the number of days still ahead.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            Ordinal dates are used in manufacturing logs, astronomy notes, project plans and systems that compare records by year. The counting rule is simple but the leap-year rule is not: a leap year has 366 days, and the day number after February shifts. The year share and remaining-day values need that same length to avoid a quiet one-day error.<p>The answer is <strong>day of the year and year elapsed and days left after this date and week number, approximate</strong>, worked out from date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>ordinal</strong></td><td><code>getDayOfYear(Date) + 1</code></td></tr><tr><td><strong>percent</strong></td><td><code>(getDayOfYear(Date) + 1) ÷ if_else(mod(getYear(Date), 400) == 0, 366, if_else(mod(getYear(Date), 100) == 0, 365, if_else(mod(getYear(Date), 4) == 0, 366, 365))) × 100</code></td></tr><tr><td><strong>left</strong></td><td><code>if_else(mod(getYear(Date), 400) == 0, 366, if_else(mod(getYear(Date), 100) == 0, 365, if_else(mod(getYear(Date), 4) == 0, 366, 365))) - getDayOfYear(Date) - 1</code></td></tr><tr><td><strong>week</strong></td><td><code>floor(getDayOfYear(Date) ÷ 7) + 1</code></td></tr></tbody></table><p>The calendar helper returns a zero-based ordinal, so one is added for display. The Gregorian leap rule is divisible by four except century years, unless divisible by 400. Remaining days exclude the date itself; the approximate week is groups of seven from 1 January.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports day of the year and year elapsed and days left after this date and week number, approximate.</p><ul><li><strong>Date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Day of the year</strong> — day.</li><li><strong>Year elapsed</strong> — %.</li><li><strong>Days left after this date</strong> — days.</li><li><strong>Week number, approximate</strong> — week.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date = 28 February 2027 into the form and the panel reads:</p><ul><li><strong>Day of the year</strong> = <code>getDayOfYear(Date) + 1</code> = <strong>59 day</strong></li><li><strong>Year elapsed</strong> = <code>(getDayOfYear(Date) + 1) ÷ if_else(mod(getYear(Date), 400) == 0, 366, if_else(mod(getYear(Date), 100) == 0, 365, if_else(mod(getYear(Date), 4) == 0, 366, 365))) × 100</code> = <strong>16.164 %</strong></li><li><strong>Days left after this date</strong> = <code>if_else(mod(getYear(Date), 400) == 0, 366, if_else(mod(getYear(Date), 100) == 0, 365, if_else(mod(getYear(Date), 4) == 0, 366, 365))) - getDayOfYear(Date) - 1</code> = <strong>306 days</strong></li><li><strong>Week number, approximate</strong> = <code>floor(getDayOfYear(Date) ÷ 7) + 1</code> = <strong>9 week</strong></li></ul><p>This page's week number is an approximate ordinal week, not ISO week numbering. ISO weeks begin on Monday and can place the first days of January in the prior year's week 52 or 53. Here, week 1 begins on 1 January and each new group starts every seven days. The remaining-day count is also exclusive of the selected date: on 31 December it is zero. That definition is handy when asking how many future days remain, but an inclusive schedule may choose a different count. Keep the convention with copied figures, especially in a spreadsheet where one-based and zero-based fields often sit side by side.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getDayOfYear(20 877) + 1</code>, which comes to <strong>59 day</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>28 February 2027 is day 59 of a 365-day year: 16.1644 percent has elapsed, 306 days follow it, and the simple seven-day week count is 9. In leap year 2024, 1 March is day 61 because 29 February has already passed.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Day of the year</th><th>Year elapsed</th><th>Days left after this date</th><th>Week number, approximate</th></tr></thead><tbody><tr><td><strong>Date</strong> +1 day</td><td>+1.69 %</td><td>+1.69 %</td><td>−0.33 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date</strong> opens at 28 February 2027</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            This page's week number is an approximate ordinal week, not ISO week numbering. ISO weeks begin on Monday and can place the first days of January in the prior year's week 52 or 53. Here, week 1 begins on 1 January and each new group starts every seven days. The remaining-day count is also exclusive of the selected date: on 31 December it is zero. That definition is handy when asking how many future days remain, but an inclusive schedule may choose a different count. Keep the convention with copied figures, especially in a spreadsheet where one-based and zero-based fields often sit side by side.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Day of the year and year elapsed and days left after this date and week number, approximate should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/date">Date calculator</a> <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/calendar">Calendar calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date</strong> +10 days</td><td>59</td><td>69</td><td>×1.169</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Day of the Year calculator work out?', 'a' => 'It returns day of the year and year elapsed and days left after this date and week number, approximate from date. The relationship is getDayOfYear(Date) + 1.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date. Everything else is computed.'],
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
            ['q' => 'Does this count leap day?', 'a' => 'Yes. 29 February is day 60 in a leap year, shifting later dates by one.'],
            ['q' => 'Is the week number ISO?', 'a' => 'No. It is the ordinal day divided into groups of seven from 1 January.'],
            ['q' => 'Are remaining days inclusive?', 'a' => 'No. The selected date is excluded; 31 December has zero days after it.'],
            ['q' => 'Why does a system show another day number?', 'a' => 'It may use zero-based ordinals or ISO weeks, both of which differ from the labels here.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date', 'name' => 'Date calculator'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
