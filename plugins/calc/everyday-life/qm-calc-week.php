<?php

/**
 * Week Calculator
 * /everyday-life/week
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Week Calculator',
    'meta' => ['title' => 'Week Calculator — Weekday and Week Dates — Free Tool', 'description' => 'Give the page a date and it returns the weekday, the Monday and Sunday that bracket it, and its position in the year, so a week can be planned rather than.', 'h1' => 'Week Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Date', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday (1 is Monday, 7 is Sunday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'day_of_year',
                    'label' => 'Day of the year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                ['name' => 'monday', 'label' => 'Monday of that week', 'type' => 'date'],
                ['name' => 'sunday', 'label' => 'Sunday of that week', 'type' => 'date'],
            ],
        ],
    ],
    'formula' => ['weekday' => 'mod(date + 3, 7) + 1', 'day_of_year' => 'getDayOfYear(date) + 1', 'monday' => 'date - mod(date + 3, 7)', 'sunday' => 'date - mod(date + 3, 7) + 6'],
    'article' => [
        'intro' => <<<'TXT'
        A week is seven days with a fixed beginning and end. The page names the weekday, returns the Monday and Sunday that bracket the chosen date and places the date inside the year.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Weeks are the unit payroll, schools and delivery schedules run on, and they are the one calendar unit that refuses to line up with months. A year holds 52 weeks and a day, or 52 and two in a leap year.</p><p>Because the boundaries are fixed, a week can be quoted as two dates: this is the form that survives being written down and read a month later.</p><p>Deliveries are the other place it comes up. A supplier promising “week commencing Monday” is giving two dates, not a slogan: the Monday and the Sunday that bracket the delivery are what the warehouse and the customer both read, and a promise written that way leaves the two of them nothing to argue about.</p><p>The answer is <strong>weekday and day of the year and monday of that week and sunday of that week</strong>, worked out from date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>weekday</strong></td><td><code>mod(Date + 3, 7) + 1</code></td></tr><tr><td><strong>day_of_year</strong></td><td><code>getDayOfYear(Date) + 1</code></td></tr><tr><td><strong>monday</strong></td><td><code>Date - mod(Date + 3, 7)</code></td></tr><tr><td><strong>sunday</strong></td><td><code>Date - mod(Date + 3, 7) + 6</code></td></tr></tbody></table><p>`mod(date + 3, 7)` turns a day number into a weekday with Monday as zero, because 1 January 1970 was a Thursday. Adding one gives the 1-to-7 numbering people expect.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports weekday and day of the year and monday of that week and sunday of that week.</p><ul><li><strong>Date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Weekday (1 is Monday, 7 is Sunday)</strong>.</li><li><strong>Day of the year</strong> — days.</li><li><strong>Monday of that week</strong>.</li><li><strong>Sunday of that week</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Weekday (1 is Monday, 7 is Sunday)</strong> = <code>mod(Date + 3, 7) + 1</code> = <strong>5</strong></li><li><strong>Day of the year</strong> = <code>getDayOfYear(Date) + 1</code> = <strong>296 days</strong></li><li><strong>Monday of that week</strong> = <code>Date - mod(Date + 3, 7)</code> = <strong>19 October 2026</strong></li><li><strong>Sunday of that week</strong> = <code>Date - mod(Date + 3, 7) + 6</code> = <strong>25 October 2026</strong></li></ul><p>The Monday line is the one to copy into a diary. A week number alone is a label; a week with its Monday is a plan.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>mod(20 749 + 3, 7) + 1</code>, which comes to <strong>5</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>23 October 2026 is a Friday, day 296 of the year, in the week that runs from Monday 19 October to Sunday 25 October. Writing the pair is what makes the answer usable.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Weekday (1 is Monday, 7 is Sunday)</th><th>Day of the year</th><th>Monday of that week</th><th>Sunday of that week</th></tr></thead><tbody><tr><td><strong>Date</strong> +1 day</td><td>+20 %</td><td>+0.34 %</td><td>+0 d</td><td>+0 d</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date = 1 January 2026: <strong>Weekday (1 is Monday, 7 is Sunday)</strong> = 4, <strong>Day of the year</strong> = 1 days, <strong>Monday of that week</strong> = 29 December 2025, <strong>Sunday of that week</strong> = 4 January 2026. New Year's Day 2026 is a Thursday, so its week begins on 29 December 2025.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Assuming Sunday starts the week.</strong> This page uses Monday, which is the ISO convention and the working week in most of Europe.</li><li><strong>Quoting a week number without a year.</strong> Week 1 of one year and week 1 of the next are a year apart.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No ISO week numbering.</strong> The page gives the weekday and the two boundary dates, not a week number that can drift across years.</li></li><li><li><strong>No holiday awareness.</strong> A public holiday is a normal weekday here.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Weekday and day of the year and monday of that week and sunday of that week should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Filing a timesheet by week.</li></li><li><li>Booking a hotel by the week rather than by nights.</li></li><li><li>Planning a course across a term.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/day-counter">Day counter</a> <a href="/everyday-life/calendar">Calendar</a> <a href="/everyday-life/working-days">Working days</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date</strong> +10 days</td><td>5</td><td>1</td><td>×0.2</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Week calculator work out?', 'a' => 'It returns weekday and day of the year and monday of that week and sunday of that week from date. The relationship is mod(Date + 3, 7) + 1.'],
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
            ['q' => 'Why does the week start on Monday?', 'a' => 'Because that is the ISO convention and the one payroll in most of Europe uses. The Monday and Sunday lines always agree with the weekday number.'],
            ['q' => 'Can I get the week number?', 'a' => 'Not from this page: week numbering depends on rules that move the first week of the year, and the two dates are the unambiguous answer.'],
        ],
        'related' => [
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar'],
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
