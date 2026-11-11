<?php

/**
 * Age Calculator
 * /everyday-life/age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Age Calculator',
    'meta' => ['title' => 'Age Calculator — Exact Age in Years and Days', 'description' => 'Enter a date of birth and a date to measure to and the page returns the age in whole years, the days since the last birthday and the next birthday date.', 'h1' => 'Age Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'on', 'label' => 'Age on this date', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'age',
                    'label' => 'Age in whole years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'days_since',
                    'label' => 'Days since the last birthday',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'next_birthday_days',
                    'label' => 'Days until the next birthday',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                ['name' => 'next_birthday', 'label' => 'Next birthday', 'type' => 'date'],
                [
                    'name' => 'total_days',
                    'label' => 'Days lived',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => [
        'age' => <<<'TXT'
        getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0))
        TXT,
        'next_birthday' => <<<'TXT'
        dateAtYearsOld(birth, getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)) + 1)
        TXT,
        'next_birthday_days' => <<<'TXT'
        dateAtYearsOld(birth, getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)) + 1) - on
        TXT,
        'total_days' => 'on - birth',
        'days_since' => <<<'TXT'
        on - dateAtYearsOld(birth, getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Age is the number of birthdays a person has had, which is not the same as days divided by 365. The page counts the birthdays properly, then reports the days since the last one and the date of the next.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Age is not days divided by 365. It is the number of birthdays that have happened, which is why a person born on 29 February is a year older on 1 March in an ordinary year, and why two people born a day apart can differ by a year.</p><p>The page counts the birthdays from the two calendar dates, then measures the distance to the next one. That distance is the number that matters for planning a party or a renewal.</p><p>The answer is <strong>age in whole years and days since the last birthday and days until the next birthday and next birthday and days lived</strong>, worked out from date of birth and age on this date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>age</strong></td><td><code>getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0))</code></td></tr><tr><td><strong>next_birthday</strong></td><td><code>dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)) + 1)</code></td></tr><tr><td><strong>next_birthday_days</strong></td><td><code>dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)) + 1) - Age on this date</code></td></tr><tr><td><strong>total_days</strong></td><td><code>Age on this date - Date of birth</code></td></tr><tr><td><strong>days_since</strong></td><td><code>Age on this date - dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)))</code></td></tr></tbody></table><p>The age line compares months first and days second, so a birthday later in the same month counts as not yet happened. The next-birthday line reuses the same count and adds one year.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports age in whole years and days since the last birthday and days until the next birthday and next birthday and days lived.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Age on this date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Age in whole years</strong> — years.</li><li><strong>Days since the last birthday</strong> — days.</li><li><strong>Days until the next birthday</strong> — days.</li><li><strong>Next birthday</strong>.</li><li><strong>Days lived</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, age on this date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Age in whole years</strong> = <code>getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0))</code> = <strong>36 years</strong></li><li><strong>Days since the last birthday</strong> = <code>Age on this date - dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)))</code> = <strong>159 days</strong></li><li><strong>Days until the next birthday</strong> = <code>dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)) + 1) - Age on this date</code> = <strong>206 days</strong></li><li><strong>Next birthday</strong> = <code>dateAtYearsOld(Date of birth, getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)) + 1)</code> = <strong>17 May 2027</strong></li><li><strong>Days lived</strong> = <code>Age on this date - Date of birth</code> = <strong>13 308 days</strong></li></ul><p>Move the second date a day back to 16 May and the age drops to thirty-five, because the birthday has not happened yet in that calendar year.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 749) - getYear(7 441) - if_else(getMonth(20 749) < getMonth(7 441), 1, if_else(getMonth(20 749) == getMonth(7 441), if_else(getDate(20 749) < getDate(7 441), 1, 0), 0))</code>, which comes to <strong>36 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Born on 17 May 1990, measured on 23 October 2026: thirty-six years old, 159 days past the last birthday, 206 days until the next one on 17 May 2027, and 13 308 days lived.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Age in whole years</th><th>Days since the last birthday</th><th>Days until the next birthday</th><th>Next birthday</th><th>Days lived</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>+0 %</td><td>−0.63 %</td><td>+0.49 %</td><td>+1 d</td><td>−0.01 %</td></tr><tr><td><strong>Age on this date</strong> +1 day</td><td>+0 %</td><td>+0.63 %</td><td>−0.49 %</td><td>+0 d</td><td>+0.01 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Age on this date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 17 May 1990, age on this date = 16 May 2026: <strong>Age in whole years</strong> = 35 years, <strong>Days since the last birthday</strong> = 364 days, <strong>Days until the next birthday</strong> = 1 days, <strong>Next birthday</strong> = 17 May 2026, <strong>Days lived</strong> = 13 148 days. One day before the birthday: still thirty-five.</li><li>Set date of birth = 29 February 2000, age on this date = 1 March 2026: <strong>Age in whole years</strong> = 26 years, <strong>Days since the last birthday</strong> = 1 days, <strong>Days until the next birthday</strong> = 364 days, <strong>Next birthday</strong> = 28 February 2027, <strong>Days lived</strong> = 9 497 days. A leap-day birth, counted at the start of March.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Years instead of birthdays.</strong> Subtracting birth years gives an age that is wrong for anyone whose birthday has not happened yet.</li><li><strong>Leap-day births.</strong> In an ordinary year the anniversary is treated as 1 March, which is the usual legal convention but not the only one.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Dates, not moments.</strong> A time of birth would change the count only on the birthday itself.</li></li><li><li><strong>No time zone.</strong> A birth recorded just before midnight in another zone can shift by a day.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and age on this date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Age in whole years and days since the last birthday and days until the next birthday and next birthday and days lived should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Filling an age into a form.</li></li><li><li>Planning the next birthday.</li></li><li><li>Working out an age from a family record.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age-in-days">Age in days</a> <a href="/everyday-life/birth-year">Birth year</a> <a href="/everyday-life/age-difference">Age difference</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Age on this date</strong> +10 days</td><td>36</td><td>36</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Age calculator work out?', 'a' => <<<'TXT'
            It returns age in whole years and days since the last birthday and days until the next birthday and next birthday and days lived from date of birth and age on this date. The relationship is getYear(Age on this date) - getYear(Date of birth) - if_else(getMonth(Age on this date) < getMonth(Date of birth), 1, if_else(getMonth(Age on this date) == getMonth(Date of birth), if_else(getDate(Age on this date) < getDate(Date of birth), 1, 0), 0)).
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
            ['q' => 'Does it count the birthday itself?', 'a' => 'Yes. On 17 May the age increases and the days-until figure becomes 365 or 366.'],
            ['q' => 'Why is the age different from the decimal years?', 'a' => 'Because an age counts birthdays and a decimal count divides days by an average year. The age is the one a form expects.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-days', 'name' => 'Age in days'],
            ['path' => '/everyday-life/birth-year', 'name' => 'Birth year'],
            ['path' => '/everyday-life/age-difference', 'name' => 'Age difference'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
