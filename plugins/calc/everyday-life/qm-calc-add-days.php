<?php

/**
 * Add Days Calculator
 * /everyday-life/add-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Add Days Calculator',
    'meta' => ['title' => 'Add Days to a Date — Day Calculator — Free Tool', 'description' => 'Add or subtract days from any date and read the date that comes back, the weekday it lands on and the number of weeks the move covers. The formula is shown.', 'h1' => 'Add Days Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'start',
                    'label' => 'Start date',
                    'type' => 'date',
                    'default' => '2026-10-23',
                    'help' => 'The date you are counting from.',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days to add',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '90',
                    'help' => 'Use a negative number to count backwards.',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'result', 'label' => 'Resulting date', 'type' => 'date'],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday (0 is Sunday, 5 is Friday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks covered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
            ],
        ],
    ],
    'formula' => ['result' => 'start + days', 'weekday' => 'mod(start + days + 4, 7)', 'weeks' => 'days / 7'],
    'article' => [
        'intro' => <<<'TXT'
        A date plus a number of days is another date. The page adds the days, returns the calendar date and names the weekday, which is the part people usually want and rarely work out correctly in their heads.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Adding days to a date is easy across a month boundary and worse across a leap year. The page works in day numbers, which have no months to confuse them: 23 October plus ninety days is simply ninety more than the number that stands for 23 October.</p><p>The weekday is the same trick. 1 January 1970 was a Thursday, so a day number turns into a weekday with one remainder and no calendar table at all.</p><p>The answer is <strong>resulting date and weekday and weeks covered</strong>, worked out from start date and days to add. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>result</strong></td><td><code>Start date + Days to add</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(Start date + Days to add + 4, 7)</code></td></tr><tr><td><strong>weeks</strong></td><td><code>Days to add ÷ 7</code></td></tr></tbody></table><p>`mod(x, 7)` is the remainder after dividing by seven. Adding four first shifts the zero from Thursday to Sunday, so the weekday line reads 0 for Sunday, 1 for Monday and 6 for Saturday.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports resulting date and weekday and weeks covered.</p><ul><li><strong>Start date</strong>. The date you are counting from.</li><li><strong>Days to add</strong> — days. Use a negative number to count backwards.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Resulting date</strong>.</li><li><strong>Weekday (0 is Sunday, 5 is Friday)</strong>.</li><li><strong>Weeks covered</strong> — weeks.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start date = 23 October 2026, days to add = 90 days into the form and the panel reads:</p><ul><li><strong>Resulting date</strong> = <code>Start date + Days to add</code> = <strong>21 January 2027</strong></li><li><strong>Weekday (0 is Sunday, 5 is Friday)</strong> = <code>mod(Start date + Days to add + 4, 7)</code> = <strong>4</strong></li><li><strong>Weeks covered</strong> = <code>Days to add ÷ 7</code> = <strong>12.857 weeks</strong></li></ul><p>Day numbers make negative additions honest too: minus thirty days gives the date a month earlier, with no special case for January.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 + 90</code>, which comes to <strong>21 January 2027</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>23 October 2026 plus nineteen days is 11 November. Ninety days is twelve weeks and six days, which is why the result does not fall on a Friday like the start did: it lands a weekday short.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Resulting date</th><th>Weekday (0 is Sunday, 5 is Friday)</th><th>Weeks covered</th></tr></thead><tbody><tr><td><strong>Start date</strong> +1 day</td><td>+1 d</td><td>+25 %</td><td>+0 %</td></tr><tr><td><strong>Days to add</strong> +10 %</td><td>+9 d</td><td>+50 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Days to add</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start date</strong> opens at 23 October 2026 — The date you are counting from.</li><li><strong>Days to add</strong> opens at 90 days — Use a negative number to count backwards.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start date = 23 October 2026, days to add = -30: <strong>Resulting date</strong> = 23 September 2026, <strong>Weekday (0 is Sunday, 5 is Friday)</strong> = 3, <strong>Weeks covered</strong> = -4.286 weeks. Backwards thirty days stops in September.</li><li>Set start date = 20 December 2026, days to add = 14: <strong>Resulting date</strong> = 3 January 2027, <strong>Weekday (0 is Sunday, 5 is Friday)</strong> = 0, <strong>Weeks covered</strong> = 2 weeks. Across the year end, where a hand count usually slips.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting the start date.</strong> Adding one gives the next day, not the same day twice. A seven-day deadline that includes today is six, not seven.</li><li><strong>Whole days only.</strong> The box takes a number of days, so a half day rounds down to no change.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No working-day rule.</strong> Weekends and public holidays are added like any other day.</li></li><li><li><strong>No time of day.</strong> The result is a date, not a moment.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start date and days to add. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Resulting date and weekday and weeks covered should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out a deadline from a notice period.</li></li><li><li>Checking which weekday a holiday will fall on.</li></li><li><li>Planning backwards with a negative number.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/day-counter">Day counter</a> <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/date">Date calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start date</strong> +10 days</td><td>21 January 2027</td><td>31 January 2027</td><td>+10 d</td></tr><tr><td><strong>Days to add</strong> ×10</td><td>21 January 2027</td><td>10 April 2029</td><td>+810 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Add Days calculator work out?', 'a' => 'It returns resulting date and weekday and weeks covered from start date and days to add. The relationship is Start date + Days to add.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start date, Days to add (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: days to add in days. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the weekday a number rather than a name?', 'a' => 'Because the page returns numbers, and numbers sort. 0 is Sunday, 1 is Monday and 6 is Saturday.'],
            ['q' => 'Does it handle leap years?', 'a' => 'Yes. Leap days live inside the day numbers, so a span across 29 February is a day longer with no special case.'],
        ],
        'related' => [
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/date', 'name' => 'Date calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
