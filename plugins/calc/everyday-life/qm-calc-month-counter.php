<?php

/**
 * Month Counter
 * /everyday-life/month-counter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Month Counter',
    'meta' => ['title' => 'Month Counter — Months Between Two Dates — Free Tool', 'description' => 'Count the months between two dates, with the days left over, for leases, notice periods and anything else written in months rather than in days. Formula shown.', 'h1' => 'Month Counter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start date', 'type' => 'date', 'default' => '2026-01-15'],
                ['name' => 'end', 'label' => 'End date', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'months',
                    'label' => 'Whole months',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'months',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days left over',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'decimal',
                    'label' => 'Months, decimal',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'months',
                ],
                [
                    'name' => 'days_total',
                    'label' => 'Days in total',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['months' => 'floor((end - start) / 30.436875)', 'days' => 'end - start - floor((end - start) / 30.436875) * 30.436875', 'decimal' => '(end - start) / 30.436875', 'days_total' => 'end - start'],
    'article' => [
        'intro' => 'Months do not divide evenly, so an honest count is whole months plus a remainder in days. The page returns both, along with the decimal count for comparison.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A tenancy from 15 January to 15 April is three months. A notice period of ninety days is not. The difference matters whenever a contract uses one and a calendar uses the other, which is most of the time.</p><p>Whole months plus the days left over is the form a person can check against a calendar, so that is the form the page returns first.</p><p>Notice is where the two answers part company in practice. Two months served on 31 January expires on 31 March, not after sixty days, and a clause that lets the two readings sit side by side is a dispute waiting for a date. Describe the period in whole months, settle the ending with the dates.</p><p>The answer is <strong>whole months and days left over and months, decimal and days in total</strong>, worked out from start date and end date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>months</strong></td><td><code>floor((End date - Start date) ÷ 30.436875)</code></td></tr><tr><td><strong>days</strong></td><td><code>End date - Start date - floor((End date - Start date) ÷ 30.436875) × 30.436875</code></td></tr><tr><td><strong>decimal</strong></td><td><code>(End date - Start date) ÷ 30.436875</code></td></tr><tr><td><strong>days_total</strong></td><td><code>End date - Start date</code></td></tr></tbody></table><p>The month used here is 30.436 875 days, the average over the Gregorian 400-year cycle. A count in average months is an estimate; the day count beside it is exact.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports whole months and days left over and months, decimal and days in total.</p><ul><li><strong>Start date</strong>.</li><li><strong>End date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Whole months</strong> — months.</li><li><strong>Days left over</strong> — days.</li><li><strong>Months, decimal</strong> — months.</li><li><strong>Days in total</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start date = 15 January 2026, end date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Whole months</strong> = <code>floor((End date - Start date) ÷ 30.436875)</code> = <strong>9 months</strong></li><li><strong>Days left over</strong> = <code>End date - Start date - floor((End date - Start date) ÷ 30.436875) × 30.436875</code> = <strong>7.068 days</strong></li><li><strong>Months, decimal</strong> = <code>(End date - Start date) ÷ 30.436875</code> = <strong>9.232 months</strong></li><li><strong>Days in total</strong> = <code>End date - Start date</code> = <strong>281 days</strong></li></ul><p>Two dates inside one month give zero whole months and the day count, which is the right answer for a short let.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>floor((20 749 - 20 468) ÷ 30.436875)</code>, which comes to <strong>9 months</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>15 January to 23 October is 281 days, which is nine whole months and about seven days over. The honest description is nine months and a week.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Whole months</th><th>Days left over</th><th>Months, decimal</th><th>Days in total</th></tr></thead><tbody><tr><td><strong>Start date</strong> +1 day</td><td>+0 %</td><td>−14.15 %</td><td>−0.36 %</td><td>−0.36 %</td></tr><tr><td><strong>End date</strong> +1 day</td><td>+0 %</td><td>+14.15 %</td><td>+0.36 %</td><td>+0.36 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Start date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start date</strong> opens at 15 January 2026</li><li><strong>End date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start date = 15 January 2026, end date = 15 April 2026: <strong>Whole months</strong> = 2 months, <strong>Days left over</strong> = 29.126 days, <strong>Months, decimal</strong> = 2.957 months, <strong>Days in total</strong> = 90 days. Three calendar months, and ninety days in the day count.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Expecting exact calendar months.</strong> February is short and August is long, and an average cannot follow either.</li><li><strong>Counting the end date twice.</strong> The span is a subtraction, so the second date is the boundary, not an extra day.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>It is an average month.</strong> A notice period written in calendar months needs a calendar, not this page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start date and end date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Whole months and days left over and months, decimal and days in total should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Describing a tenancy in months.</li></li><li><li>Checking an instalment schedule.</li></li><li><li>Working out how many payments a short lease covers.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/months-between-dates">Months between dates</a> <a href="/everyday-life/years-between-dates">Years between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start date</strong> +10 days</td><td>9</td><td>8</td><td>×0.889</td></tr><tr><td><strong>End date</strong> +10 days</td><td>9</td><td>9</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Month Counter calculator work out?', 'a' => <<<'TXT'
            It returns whole months and days left over and months, decimal and days in total from start date and end date. The relationship is floor((End date - Start date) ÷ 30.436875).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start date, End date. Everything else is computed.'],
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
            ['q' => 'Why is the month count not a round number?', 'a' => 'Because months are not a fixed length. The page separates whole months from leftover days and shows the decimal for comparison only.'],
            ['q' => 'Which count should I put in a contract?', 'a' => 'Neither: write the dates. A month count is a description, and the dates are the agreement.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/months-between-dates', 'name' => 'Months between dates'],
            ['path' => '/everyday-life/years-between-dates', 'name' => 'Years between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
