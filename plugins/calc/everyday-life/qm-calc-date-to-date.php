<?php

/**
 * Date to Date Calculator
 * /everyday-life/date-to-date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Date to Date Calculator',
    'meta' => ['title' => 'Date to Date — Days, Weeks and Months — Free Tool', 'description' => 'Compare two calendar dates as elapsed days and weeks, plus approximate months and years. The day count is exact; the average-month conversions are labelled as.', 'h1' => 'Date to Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date1', 'label' => 'From', 'type' => 'date', 'default' => '2026-01-01'],
                ['name' => 'date2', 'label' => 'To', 'type' => 'date', 'default' => '2026-12-31'],
                [
                    'name' => 'days',
                    'label' => 'Elapsed days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'months',
                    'label' => 'Approximate months',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'months',
                ],
                [
                    'name' => 'years',
                    'label' => 'Approximate years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'inclusive',
                    'label' => 'Dates including both ends',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'dates',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Equivalent hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hours',
                ],
            ],
        ],
    ],
    'formula' => [
        'days' => 'date2 - date1',
        'weeks' => '(date2 - date1) / 7',
        'months' => '(date2 - date1) / 30.436875',
        'years' => '(date2 - date1) / 365.2425',
        'inclusive' => 'date2 - date1 + 1',
        'hours' => '(date2 - date1) * 24',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Two dates can be compared exactly in days, then expressed in weeks, average months and average years. The distinction matters because months do not have a fixed length.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A date range has two legitimate counts. Elapsed days measure the distance from the first date to the second; inclusive dates count every calendar square touched. A stay from Monday to Friday is four nights but five named dates. This page keeps both numbers beside each other, then gives approximate larger units without pretending a month has a universal length.<p>The answer is <strong>elapsed days and weeks and approximate months and approximate years and dates including both ends and equivalent hours</strong>, worked out from from and to. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>To - From</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(To - From) ÷ 7</code></td></tr><tr><td><strong>months</strong></td><td><code>(To - From) ÷ 30.436875</code></td></tr><tr><td><strong>years</strong></td><td><code>(To - From) ÷ 365.2425</code></td></tr><tr><td><strong>inclusive</strong></td><td><code>To - From + 1</code></td></tr><tr><td><strong>hours</strong></td><td><code>(To - From) × 24</code></td></tr></tbody></table><p>The first two dates are subtracted. The exact difference is divided by seven, 30.436875 average days per Gregorian month, or 365.2425 average days per Gregorian year. Inclusive dates add one to the day difference.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports elapsed days and weeks and approximate months and approximate years and dates including both ends and equivalent hours.</p><ul><li><strong>From</strong>.</li><li><strong>To</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Elapsed days</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Approximate months</strong> — months.</li><li><strong>Approximate years</strong> — years.</li><li><strong>Dates including both ends</strong> — dates.</li><li><strong>Equivalent hours</strong> — hours.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put from = 1 January 2026, to = 31 December 2026 into the form and the panel reads:</p><ul><li><strong>Elapsed days</strong> = <code>To - From</code> = <strong>364 days</strong></li><li><strong>Weeks</strong> = <code>(To - From) ÷ 7</code> = <strong>52 weeks</strong></li><li><strong>Approximate months</strong> = <code>(To - From) ÷ 30.436875</code> = <strong>11.959 months</strong></li><li><strong>Approximate years</strong> = <code>(To - From) ÷ 365.2425</code> = <strong>0.997 years</strong></li><li><strong>Dates including both ends</strong> = <code>To - From + 1</code> = <strong>365 dates</strong></li><li><strong>Equivalent hours</strong> = <code>(To - From) × 24</code> = <strong>8 736 hours</strong></li></ul><p>Use the exact day line for booking nights, age intervals or a notice period measured in days. Treat the month and year lines as a conversion for scale, not as anniversary arithmetic. Ten calendar months can contain different numbers of days depending on where they start. To ask how many complete calendar months have passed, use a month-anniversary method instead. The hours line is a mathematical equivalence of 24 hours per date; local clock transitions can make the elapsed wall-clock hours differ by one where daylight-saving rules apply. Always keep the endpoint convention with the number when sharing it.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 818 - 20 454</code>, which comes to <strong>364 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The 2026 calendar year from 1 January to 31 December spans 364 elapsed days and 365 inclusive dates. That is 52 weeks, 11.9589 average months and 0.9966 average years. A range across leap day is counted by the actual calendar-day difference.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Elapsed days</th><th>Weeks</th><th>Approximate months</th><th>Approximate years</th><th>Dates including both ends</th><th>Equivalent hours</th></tr></thead><tbody><tr><td><strong>From</strong> +1 day</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td></tr><tr><td><strong>To</strong> +1 day</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>From</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>From</strong> opens at 1 January 2026</li><li><strong>To</strong> opens at 31 December 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            Use the exact day line for booking nights, age intervals or a notice period measured in days. Treat the month and year lines as a conversion for scale, not as anniversary arithmetic. Ten calendar months can contain different numbers of days depending on where they start. To ask how many complete calendar months have passed, use a month-anniversary method instead. The hours line is a mathematical equivalence of 24 hours per date; local clock transitions can make the elapsed wall-clock hours differ by one where daylight-saving rules apply. Always keep the endpoint convention with the number when sharing it.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need from and to. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Elapsed days and weeks and approximate months and approximate years and dates including both ends and equivalent hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/months-between-dates">Months between dates</a> <a href="/everyday-life/number-days">Number of days</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>From</strong> +10 days</td><td>364</td><td>354</td><td>×0.973</td></tr><tr><td><strong>To</strong> +10 days</td><td>364</td><td>374</td><td>×1.027</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Date to Date calculator work out?', 'a' => <<<'TXT'
            It returns elapsed days and weeks and approximate months and approximate years and dates including both ends and equivalent hours from from and to. The relationship is To - From.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'From, To. Everything else is computed.'],
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
            ['q' => 'Why are months approximate?', 'a' => 'A month can contain 28, 29, 30 or 31 days, so this page divides by an average month length.'],
            ['q' => 'What does inclusive mean?', 'a' => 'It counts both the first and last date as calendar dates, adding one to the elapsed difference.'],
            ['q' => 'Does leap day count?', 'a' => 'Yes. The day subtraction follows the actual Gregorian dates, including 29 February.'],
            ['q' => 'Are years always 365 days here?', 'a' => 'The approximate-year conversion uses 365.2425 days, the Gregorian average.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/months-between-dates', 'name' => 'Months between dates'],
            ['path' => '/everyday-life/number-days', 'name' => 'Number of days'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
