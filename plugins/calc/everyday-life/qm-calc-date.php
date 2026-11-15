<?php

/**
 * Date Calculator
 * /everyday-life/date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Date Calculator',
    'meta' => ['title' => 'Date Calculator — Day, Month and Weekday — Free Tool', 'description' => 'Read a calendar date as its year, month, day, weekday and position in the year. Enter one date; the calendar fields come back as separate results, ready to.', 'h1' => 'Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Calendar date', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'year',
                    'label' => 'Year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'month',
                    'label' => 'Month number',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '1–12',
                ],
                [
                    'name' => 'day',
                    'label' => 'Day of month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday (Sunday is 0)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'day_year',
                    'label' => 'Day of year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '1–366',
                ],
            ],
        ],
    ],
    'formula' => [
        'year' => 'getYear(date)',
        'month' => 'getMonth(date) + 1',
        'day' => 'getDate(date)',
        'weekday' => 'getDayOfWeek(date)',
        'day_year' => 'getDayOfYear(date) + 1',
    ],
    'article' => [
        'intro' => 'A date is more than a string on a form. This page reads one calendar day and returns its parts, including the weekday and its ordinal place in the year.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            The date picker stores a day, not a time of day. Splitting it with calendar functions avoids a common trap: the weekday is not safely inferred from the day number in the month. February 28 can be a Sunday in one year and a Wednesday in another. The result also gives the ordinal day, which is useful in logs and schedules that run by year.<p>The answer is <strong>year and month number and day of month and weekday and day of year</strong>, worked out from calendar date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>year</strong></td><td><code>getYear(Calendar date)</code></td></tr><tr><td><strong>month</strong></td><td><code>getMonth(Calendar date) + 1</code></td></tr><tr><td><strong>day</strong></td><td><code>getDate(Calendar date)</code></td></tr><tr><td><strong>weekday</strong></td><td><code>getDayOfWeek(Calendar date)</code></td></tr><tr><td><strong>day_year</strong></td><td><code>getDayOfYear(Calendar date) + 1</code></td></tr></tbody></table><p>The calendar functions read the year, zero-based month, day, weekday and zero-based day-of-year from the input. The page adds one to the month and ordinal day because people number both from one.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports year and month number and day of month and weekday and day of year.</p><ul><li><strong>Calendar date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Year</strong>.</li><li><strong>Month number</strong> — 1–12.</li><li><strong>Day of month</strong>.</li><li><strong>Weekday (Sunday is 0)</strong>.</li><li><strong>Day of year</strong> — 1–366.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put calendar date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Year</strong> = <code>getYear(Calendar date)</code> = <strong>2 026</strong></li><li><strong>Month number</strong> = <code>getMonth(Calendar date) + 1</code> = <strong>10 1–12</strong></li><li><strong>Day of month</strong> = <code>getDate(Calendar date)</code> = <strong>23</strong></li><li><strong>Weekday (Sunday is 0)</strong> = <code>getDayOfWeek(Calendar date)</code> = <strong>5</strong></li><li><strong>Day of year</strong> = <code>getDayOfYear(Calendar date) + 1</code> = <strong>296 1–366</strong></li></ul><p>A date-only field has no timezone attached. If a timestamp near midnight is first converted in another timezone, it may become the previous or following calendar day; this page cannot recover that lost context. For a printed form, use the date as shown in the governing calendar. For a timestamp, convert to the intended local zone first, then use its date. The weekday result follows the Gregorian calendar represented by the browser and server. It does not infer a historical calendar system or a locale-specific week numbering rule. Day-of-year begins at 1 January, so 1 January is day one even in a leap year, and the later dates shift by one after 29 February.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 749)</code>, which comes to <strong>2 026</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>For 23 October 2026, the fields are year 2026, month 10, day 23, Friday (5 when Sunday is zero), and day 296 of the year. The next check uses 28 February 2027, a Sunday and the fifty-ninth day.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Year</th><th>Month number</th><th>Day of month</th><th>Weekday (Sunday is 0)</th><th>Day of year</th></tr></thead><tbody><tr><td><strong>Calendar date</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>+4.35 %</td><td>+20 %</td><td>+0.34 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Calendar date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Calendar date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            A date-only field has no timezone attached. If a timestamp near midnight is first converted in another timezone, it may become the previous or following calendar day; this page cannot recover that lost context. For a printed form, use the date as shown in the governing calendar. For a timestamp, convert to the intended local zone first, then use its date. The weekday result follows the Gregorian calendar represented by the browser and server. It does not infer a historical calendar system or a locale-specific week numbering rule. Day-of-year begins at 1 January, so 1 January is day one even in a leap year, and the later dates shift by one after 29 February.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need calendar date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Year and month number and day of month and weekday and day of year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/day-of-the-year">Day of the year</a> <a href="/everyday-life/calendar">Calendar calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Calendar date</strong> +10 days</td><td>2 026</td><td>2 026</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Date calculator work out?', 'a' => 'It returns year and month number and day of month and weekday and day of year from calendar date. The relationship is getYear(Calendar date).'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Calendar date. Everything else is computed.'],
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
            ['q' => 'Does Sunday equal zero?', 'a' => 'Yes. The weekday result uses Sunday 0, Monday 1, through Saturday 6.'],
            ['q' => 'Is day of year zero-based?', 'a' => 'No. It is reported from 1 through 365 or 366; 1 January is day 1.'],
            ['q' => 'Does leap year change the result?', 'a' => 'It changes the ordinal day after 28 February and permits 29 February.'],
            ['q' => 'Does this include a time zone?', 'a' => 'No. The input is a calendar date, without a time or zone.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/day-of-the-year', 'name' => 'Day of the year'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
