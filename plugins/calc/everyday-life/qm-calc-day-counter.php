<?php

/**
 * Day Counter Calculator
 * /everyday-life/day-counter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Day Counter Calculator',
    'meta' => ['title' => 'Day Counter — Day of the Year and Days Left', 'description' => 'Put in a date and read its position in the year, the days left after it and how far through the year it falls, in days and as a percentage. Formula shown.', 'h1' => 'Day Counter Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'day', 'label' => 'Date', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'day_of_year',
                    'label' => 'Day of the year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'left',
                    'label' => 'Days left in the year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'year_length',
                    'label' => 'Days in this year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'percent',
                    'label' => 'Through the year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['day_of_year' => 'getDayOfYear(day) + 1', 'year_length' => 'dateAtYearsOld(day - getDayOfYear(day), 1) - (day - getDayOfYear(day))', 'left' => 'dateAtYearsOld(day - getDayOfYear(day), 1) - (day - getDayOfYear(day)) - getDayOfYear(day) - 1', 'percent' => '(getDayOfYear(day) + 1) / (dateAtYearsOld(day - getDayOfYear(day), 1) - (day - getDayOfYear(day))) * 100'],
    'article' => [
        'intro' => 'Every date has a position in its year. The page counts the days from 1 January, the days remaining to 31 December, and the share of the year that has gone.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>This is a page for placing one date against a whole year. Day 296 of 365 feels different from 69 days left, and both describe the same afternoon.</p><p>The year length line is the useful one in February: it says whether the year you are counting through has 365 days or 366, which decides every count that follows.</p><p>The answer is <strong>day of the year and days left in the year and days in this year and through the year</strong>, worked out from date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>day_of_year</strong></td><td><code>getDayOfYear(Date) + 1</code></td></tr><tr><td><strong>year_length</strong></td><td><code>dateAtYearsOld(Date - getDayOfYear(Date), 1) - (Date - getDayOfYear(Date))</code></td></tr><tr><td><strong>left</strong></td><td><code>dateAtYearsOld(Date - getDayOfYear(Date), 1) - (Date - getDayOfYear(Date)) - getDayOfYear(Date) - 1</code></td></tr><tr><td><strong>percent</strong></td><td><code>(getDayOfYear(Date) + 1) ÷ (dateAtYearsOld(Date - getDayOfYear(Date), 1) - (Date - getDayOfYear(Date))) × 100</code></td></tr></tbody></table><p>`getDayOfYear` returns a zero-based count, so one is added for the day itself. The year's length is measured by asking when the same 1 January becomes the following year's 1 January.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports day of the year and days left in the year and days in this year and through the year.</p><ul><li><strong>Date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Day of the year</strong> — days.</li><li><strong>Days left in the year</strong> — days.</li><li><strong>Days in this year</strong> — days.</li><li><strong>Through the year</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Day of the year</strong> = <code>getDayOfYear(Date) + 1</code> = <strong>296 days</strong></li><li><strong>Days left in the year</strong> = <code>dateAtYearsOld(Date - getDayOfYear(Date), 1) - (Date - getDayOfYear(Date)) - getDayOfYear(Date) - 1</code> = <strong>69 days</strong></li><li><strong>Days in this year</strong> = <code>dateAtYearsOld(Date - getDayOfYear(Date), 1) - (Date - getDayOfYear(Date))</code> = <strong>365 days</strong></li><li><strong>Through the year</strong> = <code>(getDayOfYear(Date) + 1) ÷ (dateAtYearsOld(Date - getDayOfYear(Date), 1) - (Date - getDayOfYear(Date))) × 100</code> = <strong>81.096 %</strong></li></ul><p>The percentage is the line to quote: four fifths of the year behind you is easier to picture than day 296.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getDayOfYear(20 749) + 1</code>, which comes to <strong>296 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>23 October 2026 is day 296 of 365, with 69 days left and 81.1 % of the year gone. Week 43 of the year is the last full week of October.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Day of the year</th><th>Days left in the year</th><th>Days in this year</th><th>Through the year</th></tr></thead><tbody><tr><td><strong>Date</strong> +1 day</td><td>+0.34 %</td><td>−1.45 %</td><td>+0 %</td><td>+0.34 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date = 1 January 2026: <strong>Day of the year</strong> = 1 days, <strong>Days left in the year</strong> = 364 days, <strong>Days in this year</strong> = 365 days, <strong>Through the year</strong> = 0.274 %. The first day of the year: one of 365, with 364 left.</li><li>Set date = 31 December 2024: <strong>Day of the year</strong> = 366 days, <strong>Days left in the year</strong> = 0 days, <strong>Days in this year</strong> = 366 days, <strong>Through the year</strong> = 100 %. A leap year, so day 366 of 366 and nothing left.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Day of year is not days left.</strong> They add to 365 or 366, never to 100.</li><li><strong>A leap year changes both figures.</strong> Check the year-length line before quoting a count.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar year only.</strong> A fiscal year starting in April is a different count.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Day of the year and days left in the year and days in this year and through the year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a training plan against the calendar.</li></li><li><li>Seeing how much of a budget year is left.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/week">Week number</a> <a href="/everyday-life/add-days">Add days</a> <a href="/everyday-life/date">Date calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date</strong> +10 days</td><td>296</td><td>306</td><td>×1.034</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Day Counter calculator work out?', 'a' => 'It returns day of the year and days left in the year and days in this year and through the year from date. The relationship is getDayOfYear(Date) + 1.'],
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
            ['q' => 'Does the count include the date itself?', 'a' => 'Yes. 1 January is day one, not day zero, and the days-left figure does not count the chosen day twice.'],
            ['q' => 'How is the percentage worked out?', 'a' => 'Day of the year divided by the length of that year. On 31 December it reads 100 %.'],
        ],
        'related' => [
            ['path' => '/everyday-life/week', 'name' => 'Week number'],
            ['path' => '/everyday-life/add-days', 'name' => 'Add days'],
            ['path' => '/everyday-life/date', 'name' => 'Date calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
