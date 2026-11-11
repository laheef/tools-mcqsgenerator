<?php

/**
 * Age at a Date Calculator
 * /everyday-life/age-to-birthday
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Age at a Date Calculator',
    'meta' => ['title' => 'How Old Will I Be — Age on Any Date — Free Tool', 'description' => 'How old you will be on a chosen date, and how old you were on a past one, with the birthday count and the days to go, worked out on the calendar to the day.', 'h1' => 'Age at a Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'on', 'label' => 'Age on this date', 'type' => 'date', 'default' => '2026-12-25'],
                [
                    'name' => 'age',
                    'label' => 'Age on that date',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'turning',
                    'label' => 'Birthday being turned that year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'days_to_birthday',
                    'label' => 'Days until the next birthday from that date',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['age' => <<<'TXT'
    getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0))
    TXT, 'turning' => 'getYear(on) - getYear(birth)', 'days_to_birthday' => <<<'TXT'
    dateAtYearsOld(birth, getYear(on) - getYear(birth) + if_else(getMonth(on) > getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) >= getDate(birth), 1, 0), 0))) - on
    TXT],
    'article' => [
        'intro' => 'The age on a date rather than today. A future birthday, a past anniversary, a form that asks how old someone was at an event.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>"How old was I when" is a question about a date, not about today, and the answer differs from the age now by however many birthdays have passed since. Doing it from memory works until the date sits near a birthday.</p><p>The page answers for any date, past or future. The three lines separate the three things people confuse: the age on that day, the birthday that turns that year, and the wait to the next one.</p><p>The answer is <strong>age on that date and birthday being turned that year and days until the next birthday from that date</strong>, worked out from date of birth and age on this date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>age</strong></td><td><code>getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0))</code></td></tr><tr><td><strong>turning</strong></td><td><code>getYear(Age on this date) - getYear(Date of birth)</code></td></tr><tr><td><strong>days_to_birthday</strong></td><td><code>dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) + if_else(getMonth(Age on this date) > getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) >= getDate(Date of birth), 1, 0), 0))) - Age on this date</code></td></tr></tbody></table><p>The age compares the month first and the day only when the months match, which is the birthday rule. The days-to-the-next line dates the next birthday from the reference date and subtracts it.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports age on that date and birthday being turned that year and days until the next birthday from that date.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Age on this date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Age on that date</strong> — years.</li><li><strong>Birthday being turned that year</strong> — years.</li><li><strong>Days until the next birthday from that date</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, age on this date = 25 December 2026 into the form and the panel reads:</p><ul><li><strong>Age on that date</strong> = <code>getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0))</code> = <strong>36 years</strong></li><li><strong>Birthday being turned that year</strong> = <code>getYear(Age on this date) - getYear(Date of birth)</code> = <strong>36 years</strong></li><li><strong>Days until the next birthday from that date</strong> = <code>dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) + if_else(getMonth(Age on this date) > getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) >= getDate(Date of birth), 1, 0), 0))) - Age on this date</code> = <strong>143 days</strong></li></ul><p>Put the reference date one day before a birthday: the age drops by one and the wait becomes a single day, which is the check that the comparison is by day as well as by month.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 812) - getYear(7 441) - if_else(getMonth(20 812) < getMonth(7 441), 1, if_else(getMonth(20 812) == getMonth(7 441), if_else(getDate(20 812) < getDate(7 441), 1, 0), 0))</code>, which comes to <strong>36 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Born 17 May 1990, on 25 December 2026 the age is 36, the birthday turned in 2026 was the thirty-sixth, and the next one is 143 days away.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Age on that date</th><th>Birthday being turned that year</th><th>Days until the next birthday from that date</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>+0.7 %</td></tr><tr><td><strong>Age on this date</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>−0.7 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Age on this date</strong> opens at 25 December 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 29 February 2000, age on this date = 27 February 2026: <strong>Age on that date</strong> = 25 years, <strong>Birthday being turned that year</strong> = 26 years, <strong>Days until the next birthday from that date</strong> = 1 days. The day before the clamped birthday in a non-leap year: the age is 25 and the wait is one day, because the birthday falls on the 28th.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Subtracting the years only.</strong> The age on a date before the birthday in that year is one less than the difference of the years.</li><li><strong>Reading the turning line as the age.</strong> The birthday being turned in a year and the age on a date in that year differ by one if the birthday has not arrived.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One date.</strong> A list of event dates is one pass each.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and age on this date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Age on that date and birthday being turned that year and days until the next birthday from that date should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Filling in an age at a date on a form.</li></li><li><li>Checking an age at the time of a photograph or an event.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/birthday-countdown">Birthday countdown</a> <a href="/everyday-life/how-old-was-i">How old was I</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Age on this date</strong> +10 days</td><td>36</td><td>36</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Age at a Date calculator work out?', 'a' => <<<'TXT'
            It returns age on that date and birthday being turned that year and days until the next birthday from that date from date of birth and age on this date. The relationship is getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Age on this date. Everything else is computed.'],
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
            ['q' => 'What if the date is in the future?', 'a' => 'The answer is the age that person will be then, which is a real number and not a guess.'],
            ['q' => 'Does the day of the birthday count as the older age?', 'a' => 'Yes. On the birthday itself the new age applies from midnight.'],
            ['q' => 'Why show the turning line?', 'a' => 'Because "the thirty-sixth birthday was in 2026" and "I was 36 on that date" are different statements, and forms ask for both.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/birthday-countdown', 'name' => 'Birthday countdown'],
            ['path' => '/everyday-life/how-old-was-i', 'name' => 'How old was I'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
