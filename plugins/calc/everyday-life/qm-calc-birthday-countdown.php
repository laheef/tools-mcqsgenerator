<?php

/**
 * Birthday Countdown Calculator
 * /everyday-life/birthday-countdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Birthday Countdown Calculator',
    'meta' => ['title' => 'Birthday Countdown — Days Until the Next Birthday', 'description' => 'Days until the next birthday, the date it falls on, the weekday and the age that birthday turns, worked out from a date of birth and any reference date.', 'h1' => 'Birthday Countdown Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'today', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'next_birthday', 'label' => 'Next birthday', 'type' => 'date'],
                [
                    'name' => 'days_until',
                    'label' => 'Days until it',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday (1 is Monday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'turning',
                    'label' => 'Age on that birthday',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['turning' => <<<'TXT'
    getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1
    TXT, 'next_birthday' => <<<'TXT'
    dateAtYearsOld(birth, getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1)
    TXT, 'days_until' => <<<'TXT'
    dateAtYearsOld(birth, getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1) - today
    TXT, 'weekday' => <<<'TXT'
    mod(dateAtYearsOld(birth, getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1) + 3, 7) + 1
    TXT],
    'article' => [
        'intro' => 'The next birthday, how far away it is, which day of the week it lands on and how old the person will be. The weekday is the part a party needs.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Counting to a birthday is easy in the month and hard in the last week. The month is right; the day drifts because the birthday has to be moved to this year before it can be subtracted, and a birthday in a leap year has to survive the move.</p><p>This page moves it properly. It takes the birth date and a reference date, works out how old the person is today, then dates the next birthday and counts the days to it. The weekday and the age on that day come out of the same step, so a party invitation can be written from one press.</p><p>The answer is <strong>next birthday and days until it and weekday and age on that birthday</strong>, worked out from date of birth and count from. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>turning</strong></td><td><code>getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1</code></td></tr><tr><td><strong>next_birthday</strong></td><td><code>dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1)</code></td></tr><tr><td><strong>days_until</strong></td><td><code>dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1) - Count from</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1) + 3, 7) + 1</code></td></tr></tbody></table><p>The age turns on whether this year's birthday has happened yet, which is a comparison of month and then of day. The next birthday is the birth date moved forward to that age plus one, and the day count is the distance from the reference date to it.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports next birthday and days until it and weekday and age on that birthday.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Count from</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Next birthday</strong>.</li><li><strong>Days until it</strong> — days.</li><li><strong>Weekday (1 is Monday)</strong>.</li><li><strong>Age on that birthday</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, count from = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Next birthday</strong> = <code>dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1)</code> = <strong>17 May 2027</strong></li><li><strong>Days until it</strong> = <code>dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1) - Count from</code> = <strong>206 days</strong></li><li><strong>Weekday (1 is Monday)</strong> = <code>mod(dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1) + 3, 7) + 1</code> = <strong>1</strong></li><li><strong>Age on that birthday</strong> = <code>getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1</code> = <strong>37 years</strong></li></ul><p>A birthday that fell yesterday sends the count almost a full year forward. That is correct and is the fastest way to check the page.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>dateAtYearsOld(7 441, getYear(20 749) - getYear(7 441) - if_else(getMonth(20 749) < getMonth(7 441), 1, if_else(getMonth(20 749) == getMonth(7 441), if_else(getDate(20 749) < getDate(7 441), 1, 0), 0)) + 1)</code>, which comes to <strong>17 May 2027</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Born on 17 May 1990 and counting from 23 October 2026, the next birthday is 17 May 2027, a Monday: 206 days away and the thirty-seventh. The last one, in May 2026, already happened, which is why the count jumped a year.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Next birthday</th><th>Days until it</th><th>Weekday (1 is Monday)</th><th>Age on that birthday</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>+1 d</td><td>+0.49 %</td><td>+100 %</td><td>+0 %</td></tr><tr><td><strong>Count from</strong> +1 day</td><td>+0 d</td><td>−0.49 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. <strong>Count from</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Count from</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 29 February 2000, count from = 23 October 2026: <strong>Next birthday</strong> = 28 February 2027, <strong>Days until it</strong> = 128 days, <strong>Weekday (1 is Monday)</strong> = 7, <strong>Age on that birthday</strong> = 27 years. A leap-day birth is dated to 28 February in a non-leap year: the day is clamped rather than skipped.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting to this year's birthday after it has passed.</strong> It is already gone; the next one is next year and the page says so.</li><li><strong>Assuming the same weekday every year.</strong> A birthday moves by one weekday each year and by two after a leap day.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One date at a time.</strong> A list of birthdays needs one pass per person.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and count from. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Next birthday and days until it and weekday and age on that birthday should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Dating a party and checking which day it falls on.</li></li><li><li>Working out whether a birthday has already passed this year.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/half-birthday">Half birthday</a> <a href="/everyday-life/anniversary">Anniversary</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>17 May 2027</td><td>27 May 2027</td><td>+10 d</td></tr><tr><td><strong>Count from</strong> +10 days</td><td>17 May 2027</td><td>17 May 2027</td><td>+0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Birthday Countdown calculator work out?', 'a' => <<<'TXT'
            It returns next birthday and days until it and weekday and age on that birthday from date of birth and count from. The relationship is getYear(Count from) - getYear(Date of birth) - if_else(getMonth(Count from) < getMonth(Date of birth), 1, if_else(getMonth(Count from) == getMonth(Date of birth), if_else(getDate(Count from) < getDate(Date of birth), 1, 0), 0)) + 1.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Count from. Everything else is computed.'],
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
            ['q' => 'What happens for a 29 February birthday?', 'a' => <<<'TXT'
            In a non-leap year the birthday is dated to 28 February, which is the clamp the calendar applies. Some people celebrate on 1 March; the date here is the last day of February.
            TXT],
            ['q' => 'Does it give the age today as well?', 'a' => 'No, it gives the age on the next birthday. Subtract one to get the age today, unless the birthday is today.'],
            ['q' => 'Why is the weekday shown?', 'a' => 'Because a party is booked on a day of the week, not on a calendar date.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/half-birthday', 'name' => 'Half birthday'],
            ['path' => '/everyday-life/anniversary', 'name' => 'Anniversary'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
