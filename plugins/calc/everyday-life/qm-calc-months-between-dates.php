<?php

/**
 * Months Between Dates Calculator
 * /everyday-life/months-between-dates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Months Between Dates Calculator',
    'meta' => ['title' => 'Months Between Dates — Whole Months and Days', 'description' => 'Find complete calendar months between two dates, leftover days after the last anniversary, and an approximate decimal-month total. Month-end dates are clamped.', 'h1' => 'Months Between Dates Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date1', 'label' => 'From', 'type' => 'date', 'default' => '2025-11-30'],
                ['name' => 'date2', 'label' => 'To', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'whole',
                    'label' => 'Complete months',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'months',
                ],
                [
                    'name' => 'extra_days',
                    'label' => 'Days after last month anniversary',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'decimal',
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
            ],
        ],
    ],
    'formula' => ['whole' => <<<'TXT'
    (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1) - if_else(dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)) > date2, 1, 0)
    TXT, 'extra_days' => <<<'TXT'
    date2 - dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1) - if_else(dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)) > date2, 1, 0))
    TXT, 'decimal' => <<<'TXT'
    (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1) - if_else(dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)) > date2, 1, 0) + (date2 - dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1) - if_else(dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)) > date2, 1, 0))) / 30.436875
    TXT, 'years' => <<<'TXT'
    ((getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1) - if_else(dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)) > date2, 1, 0) + (date2 - dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1) - if_else(dateAtMonthsOld(date1, (getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)) > date2, 1, 0))) / 30.436875) / 12
    TXT],
    'article' => [
        'intro' => <<<'TXT'
        A decimal month count is useful for rough comparisons, but anniversaries need calendar arithmetic. This page gives both: complete months plus leftover days, and an approximate decimal total.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            There is no single number of days in a month. A contract that says ten months usually points to calendar anniversaries, while a scientific comparison may prefer an average month. This page shows each interpretation separately. It advances by whole month anniversaries, counts the remaining days, and also converts that span to an average-month decimal.<p>The answer is <strong>complete months and days after last month anniversary and approximate months and approximate years</strong>, worked out from from and to. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>whole</strong></td><td><code>(getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0)</code></td></tr><tr><td><strong>extra_days</strong></td><td><code>To - dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0))</code></td></tr><tr><td><strong>decimal</strong></td><td><code>(getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0) + (To - dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0))) ÷ 30.436875</code></td></tr><tr><td><strong>years</strong></td><td><code>((getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0) + (To - dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0))) ÷ 30.436875) ÷ 12</code></td></tr></tbody></table><p>The year-month difference is reduced by one if the corresponding anniversary falls after the end date. The leftover days are measured from that last anniversary. Decimal months add those days divided by 30.436875.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports complete months and days after last month anniversary and approximate months and approximate years.</p><ul><li><strong>From</strong>.</li><li><strong>To</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Complete months</strong> — months.</li><li><strong>Days after last month anniversary</strong> — days.</li><li><strong>Approximate months</strong> — months.</li><li><strong>Approximate years</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put from = 30 November 2025, to = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Complete months</strong> = <code>(getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0)</code> = <strong>10 months</strong></li><li><strong>Days after last month anniversary</strong> = <code>To - dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0))</code> = <strong>23 days</strong></li><li><strong>Approximate months</strong> = <code>(getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0) + (To - dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0))) ÷ 30.436875</code> = <strong>10.756 months</strong></li><li><strong>Approximate years</strong> = <code>((getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0) + (To - dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0))) ÷ 30.436875) ÷ 12</code> = <strong>0.896 years</strong></li></ul><p>The anniversary helper clamps month ends: a 31 January start reaches 28 February in an ordinary year and 29 February in a leap year. That is a convention, not a universal legal rule. Some agreements define a month as a fixed number of days; others use the same numbered day or the final day of a month. The calculator's labels keep the exact day count and average conversion distinct so neither can be mistaken for the other. The formula assumes the end date is on or after the start date. Reverse the inputs for a forward span rather than interpreting negative month remnants.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(getYear(20 749) - getYear(20 422)) × 12 + getMonth(20 749) - getMonth(20 422) - if_else(dateAtMonthsOld(20 422, (getYear(20 749) - getYear(20 422)) × 12 + getMonth(20 749) - getMonth(20 422)) > 20 749, 1, 0)</code>, which comes to <strong>10 months</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From 30 November 2025 to 23 October 2026, ten whole month anniversaries have passed, followed by 23 days. Using 30.436875 average days per month, that is 10.7556 months or 0.8963 years. From 31 January to 28 February, one calendar month has passed.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Complete months</th><th>Days after last month anniversary</th><th>Approximate months</th><th>Approximate years</th></tr></thead><tbody><tr><td><strong>From</strong> +1 day</td><td>+0 %</td><td>−4.35 %</td><td>−0.31 %</td><td>−0.31 %</td></tr><tr><td><strong>To</strong> +1 day</td><td>+0 %</td><td>+4.35 %</td><td>+0.31 %</td><td>+0.31 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>From</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>From</strong> opens at 30 November 2025</li><li><strong>To</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            The anniversary helper clamps month ends: a 31 January start reaches 28 February in an ordinary year and 29 February in a leap year. That is a convention, not a universal legal rule. Some agreements define a month as a fixed number of days; others use the same numbered day or the final day of a month. The calculator's labels keep the exact day count and average conversion distinct so neither can be mistaken for the other. The formula assumes the end date is on or after the start date. Reverse the inputs for a forward span rather than interpreting negative month remnants.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need from and to. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Complete months and days after last month anniversary and approximate months and approximate years should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/calendar">Calendar calculator</a> <a href="/everyday-life/date-to-date">Date to date</a> <a href="/everyday-life/days-between-dates">Days between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>From</strong> +10 days</td><td>10</td><td>10</td><td>unchanged</td></tr><tr><td><strong>To</strong> +10 days</td><td>10</td><td>11</td><td>×1.1</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Months Between Dates calculator work out?', 'a' => <<<'TXT'
            It returns complete months and days after last month anniversary and approximate months and approximate years from from and to. The relationship is (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From) - if_else(dateAtMonthsOld(From, (getYear(To) - getYear(From)) × 12 + getMonth(To) - getMonth(From)) > To, 1, 0).
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
            ['q' => 'Why are there two month answers?', 'a' => 'Complete calendar months plus days answer an anniversary question; decimal months use an average-length conversion.'],
            ['q' => 'How long is the average month?', 'a' => 'The decimal calculation uses 30.436875 days.'],
            ['q' => 'What happens from 31 January to February?', 'a' => 'The anniversary clamps to the last valid day of February.'],
            ['q' => 'Does it count backward ranges?', 'a' => 'The intended use is a forward range; put the earlier date in From.'],
        ],
        'related' => [
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar calculator'],
            ['path' => '/everyday-life/date-to-date', 'name' => 'Date to date'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
