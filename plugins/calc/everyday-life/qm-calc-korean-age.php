<?php

/**
 * Korean Age Calculator
 * /everyday-life/korean-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Korean Age Calculator',
    'meta' => ['title' => 'Korean Age Calculator — Traditional, Calendar and', 'description' => 'Korean age, the year-based count and the international age side by side, for the three numbers a Korean form can ask for and the rule that changed in 2023.', 'h1' => 'Korean Age Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'today', 'label' => 'Today', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'korean_age',
                    'label' => 'Korean age (traditional)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'year_age',
                    'label' => 'Age by year only',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'international_age',
                    'label' => 'International age',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['korean_age' => 'getYear(today) - getYear(birth) + 1', 'year_age' => 'getYear(today) - getYear(birth)', 'international_age' => <<<'TXT'
    getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0))
    TXT],
    'article' => [
        'intro' => <<<'TXT'
        Three ages at once. Korean age counts the year of birth as year one and adds a year at every new year; the legal age counts birthdays; the year age is the difference of the years.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Korea had three ages in common use at once, and they disagreed by up to two years. Korean age gives a newborn one year at birth and adds another every first of January, so a baby born on 31 December is two the next morning. The year age simply subtracts the birth year. The international age counts birthdays.</p><p>Since June 2023 the legal age on official documents is the international one, but Korean age is still used socially and the year age still appears in some rules. The page shows all three so a form can be answered without guessing which one it wants.</p><p>The answer is <strong>korean age and age by year only and international age</strong>, worked out from date of birth and today. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>korean_age</strong></td><td><code>getYear(Today) - getYear(Date of birth) + 1</code></td></tr><tr><td><strong>year_age</strong></td><td><code>getYear(Today) - getYear(Date of birth)</code></td></tr><tr><td><strong>international_age</strong></td><td><code>getYear(Today) - getYear(Date of birth) - if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code></td></tr></tbody></table><p>Korean age is the difference of the calendar years plus one. The year age is that difference without the one. The international age compares the month and the day, which is the birthday rule.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports korean age and age by year only and international age.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Today</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Korean age (traditional)</strong> — years.</li><li><strong>Age by year only</strong> — years.</li><li><strong>International age</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, today = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Korean age (traditional)</strong> = <code>getYear(Today) - getYear(Date of birth) + 1</code> = <strong>37 years</strong></li><li><strong>Age by year only</strong> = <code>getYear(Today) - getYear(Date of birth)</code> = <strong>36 years</strong></li><li><strong>International age</strong> = <code>getYear(Today) - getYear(Date of birth) - if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code> = <strong>36 years</strong></li></ul><p>A birth date late in December shows the largest gap: the Korean age jumps on 1 January, not on the birthday.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 749) - getYear(7 441) + 1</code>, which comes to <strong>37 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Born 17 May 1990 and read on 23 October 2026: Korean age 37, year age 36, international age 36. Before 17 May 2026 the three would read 37, 36 and 35.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Korean age (traditional)</th><th>Age by year only</th><th>International age</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Today</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Today</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 31 December 2025, today = 1 January 2026: <strong>Korean age (traditional)</strong> = 2 years, <strong>Age by year only</strong> = 1 years, <strong>International age</strong> = 0 years. A baby one day old reads Korean age 2, year age 1 and international age 0, which is the whole difference in three numbers.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using Korean age on a legal form.</strong> Since 2023 the statutory age is the international one; the older count has no legal standing.</li><li><strong>Assuming Korean age is always two years more.</strong> It is two before the birthday and one after it, which is why the difference moves through the year.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>The modern rule.</strong> Some traditional contexts still add the year at the lunar new year rather than 1 January.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and today. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Korean age and age by year only and international age should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Answering a Korean acquaintance who asks the age socially.</li></li><li><li>Checking which of the three an older form is asking for.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/lunar-age">Lunar age</a> <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/chronological-age">Chronological age</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>37</td><td>37</td><td>unchanged</td></tr><tr><td><strong>Today</strong> +10 days</td><td>37</td><td>37</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Korean Age calculator work out?', 'a' => 'It returns korean age and age by year only and international age from date of birth and today. The relationship is getYear(Today) - getYear(Date of birth) + 1.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Today. Everything else is computed.'],
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
            ['q' => 'Is Korean age still used?', 'a' => 'Socially, yes. On documents and in law Korea moved to the international age in June 2023.'],
            ['q' => 'Why is a newborn one year old?', 'a' => 'Because the year of birth counts as the first year of life in the traditional count, and everyone gains a year at the new year.'],
            ['q' => 'What is the year age for?', 'a' => 'Some administrative rules and school-year questions use the difference of the calendar years, which ignores the birthday.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lunar-age', 'name' => 'Lunar age'],
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/chronological-age', 'name' => 'Chronological age'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
