<?php

/**
 * Anniversary Calculator
 * /everyday-life/anniversary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Anniversary Calculator',
    'meta' => ['title' => 'Anniversary Calculator — Which One, and How Far Off', 'description' => 'How many years since a date, which anniversary comes next, the date it falls on, the weekday and the days until it, for weddings and service records alike.', 'h1' => 'Anniversary Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'The date to count from', 'type' => 'date', 'default' => '2019-04-19'],
                ['name' => 'today', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'years',
                    'label' => 'Completed years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                ['name' => 'next', 'label' => 'Next anniversary', 'type' => 'date'],
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
                    'label' => 'Weekday of the next one (1 is Monday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['years' => <<<'TXT'
    getYear(today) - getYear(start) - if_else(getMonth(today) < getMonth(start), 1, if_else(getMonth(today) == getMonth(start), if_else(getDate(today) < getDate(start), 1, 0), 0))
    TXT, 'next' => <<<'TXT'
    dateAtYearsOld(start, getYear(today) - getYear(start) - if_else(getMonth(today) < getMonth(start), 1, if_else(getMonth(today) == getMonth(start), if_else(getDate(today) < getDate(start), 1, 0), 0)) + 1)
    TXT, 'days_until' => <<<'TXT'
    dateAtYearsOld(start, getYear(today) - getYear(start) - if_else(getMonth(today) < getMonth(start), 1, if_else(getMonth(today) == getMonth(start), if_else(getDate(today) < getDate(start), 1, 0), 0)) + 1) - today
    TXT, 'weekday' => <<<'TXT'
    mod(dateAtYearsOld(start, getYear(today) - getYear(start) - if_else(getMonth(today) < getMonth(start), 1, if_else(getMonth(today) == getMonth(start), if_else(getDate(today) < getDate(start), 1, 0), 0)) + 1) + 3, 7) + 1
    TXT],
    'article' => [
        'intro' => 'Completed years since a date, the next anniversary of it and the wait in days. Works for a wedding, a first day at work or a company\'s founding.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An anniversary is a birthday with a different label: the same rule of comparing month and day to decide whether this year's has happened, the same move of the date to the coming year, the same count of days to it.</p><p>The number that trips people is the name of the anniversary. Seven completed years means the seventh has passed and the eighth is coming, and a silver wedding is the twenty-fifth, which is twenty-four completed years plus one day away from being the twenty-fifth.</p><p>The answer is <strong>completed years and next anniversary and days until it and weekday of the next one</strong>, worked out from the date to count from and count from. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>years</strong></td><td><code>getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0))</code></td></tr><tr><td><strong>next</strong></td><td><code>dateAtYearsOld(The date to count from, getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)) + 1)</code></td></tr><tr><td><strong>days_until</strong></td><td><code>dateAtYearsOld(The date to count from, getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)) + 1) - Count from</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(dateAtYearsOld(The date to count from, getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)) + 1) + 3, 7) + 1</code></td></tr></tbody></table><p>Completed years compare the month first and the day only when the months agree, which is the rule an age uses. The next anniversary is the start date moved forward to that number plus one, and the day count is the distance to it.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports completed years and next anniversary and days until it and weekday of the next one.</p><ul><li><strong>The date to count from</strong>.</li><li><strong>Count from</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Completed years</strong> — years.</li><li><strong>Next anniversary</strong>.</li><li><strong>Days until it</strong> — days.</li><li><strong>Weekday of the next one (1 is Monday)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put the date to count from = 19 April 2019, count from = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Completed years</strong> = <code>getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0))</code> = <strong>7 years</strong></li><li><strong>Next anniversary</strong> = <code>dateAtYearsOld(The date to count from, getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)) + 1)</code> = <strong>19 April 2027</strong></li><li><strong>Days until it</strong> = <code>dateAtYearsOld(The date to count from, getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)) + 1) - Count from</code> = <strong>178 days</strong></li><li><strong>Weekday of the next one (1 is Monday)</strong> = <code>mod(dateAtYearsOld(The date to count from, getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)) + 1) + 3, 7) + 1</code> = <strong>1</strong></li></ul><p>A date that has just passed gives a number close to a full year, which is the fastest check that the page is reading the months correctly.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 749) - getYear(18 005) - if_else(getMonth(20 749) < getMonth(18 005), 1, if_else(getMonth(20 749) == getMonth(18 005), if_else(getDate(20 749) < getDate(18 005), 1, 0), 0))</code>, which comes to <strong>7 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From 19 April 2019 to 23 October 2026 is seven completed years, so the next anniversary is 19 April 2027, a Monday, 178 days away. The seventh anniversary itself fell in April 2026.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Completed years</th><th>Next anniversary</th><th>Days until it</th><th>Weekday of the next one (1 is Monday)</th></tr></thead><tbody><tr><td><strong>The date to count from</strong> +1 day</td><td>+0 %</td><td>+1 d</td><td>+0.56 %</td><td>+100 %</td></tr><tr><td><strong>Count from</strong> +1 day</td><td>+0 %</td><td>+0 d</td><td>−0.56 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>The date to count from</strong>. <strong>Count from</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>The date to count from</strong> opens at 19 April 2019</li><li><strong>Count from</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set the date to count from = 19 April 2019, count from = 19 April 2026: <strong>Completed years</strong> = 7 years, <strong>Next anniversary</strong> = 19 April 2027, <strong>Days until it</strong> = 365 days, <strong>Weekday of the next one (1 is Monday)</strong> = 1. On the day itself the count reads seven completed years and the next anniversary is a year away, which is what makes the day itself belong to the seventh.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Calling the next one by the completed count.</strong> Seven completed means the eighth is next, not the seventh.</li><li><strong>Assuming the weekday repeats.</strong> It moves by one a year, and by two after a leap day, so a Saturday anniversary can become a Monday in one step.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One date.</strong> A calendar of several anniversaries is one pass per date.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need the date to count from and count from. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Completed years and next anniversary and days until it and weekday of the next one should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Dating a silver or golden anniversary.</li></li><li><li>Checking the length of service on a reference letter.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/birthday-countdown">Birthday countdown</a> <a href="/everyday-life/years-between-dates">Years between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>The date to count from</strong> +10 days</td><td>7</td><td>7</td><td>unchanged</td></tr><tr><td><strong>Count from</strong> +10 days</td><td>7</td><td>7</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Anniversary calculator work out?', 'a' => <<<'TXT'
            It returns completed years and next anniversary and days until it and weekday of the next one from the date to count from and count from. The relationship is getYear(Count from) - getYear(The date to count from) - if_else(getMonth(Count from) < getMonth(The date to count from), 1, if_else(getMonth(Count from) == getMonth(The date to count from), if_else(getDate(Count from) < getDate(The date to count from), 1, 0), 0)).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'The date to count from, Count from. Everything else is computed.'],
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
            ['q' => 'Which anniversary comes next?', 'a' => 'The one after the completed count. Seven years completed in October means the eighth is next in April.'],
            ['q' => 'Does it use the same day of the month?', 'a' => 'Yes, clamped at the end of a short month, so a 29 February anniversary lands on the 28th in a non-leap year.'],
            ['q' => 'Can it count from any date?', 'a' => 'Any date at all: a wedding, a first day, a company\'s founding, the day a book was published.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/birthday-countdown', 'name' => 'Birthday countdown'],
            ['path' => '/everyday-life/years-between-dates', 'name' => 'Years between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
