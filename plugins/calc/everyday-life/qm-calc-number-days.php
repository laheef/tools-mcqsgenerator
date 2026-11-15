<?php

/**
 * Number of Days Calculator
 * /everyday-life/number-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Number of Days Calculator',
    'meta' => ['title' => 'Number of Days — Elapsed and Inclusive Count', 'description' => 'Count elapsed days between two dates and compare them with an inclusive count that includes both endpoints. Weeks and approximate months provide useful scale.', 'h1' => 'Number of Days Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start date', 'type' => 'date', 'default' => '2026-01-01'],
                ['name' => 'end', 'label' => 'End date', 'type' => 'date', 'default' => '2026-12-31'],
                [
                    'name' => 'include_end',
                    'label' => 'Include the end date?',
                    'type' => 'select',
                    'options' => ['Yes' => 1, 'No' => 0],
                    'control' => 'SELECT',
                    'default' => 'Yes',
                ],
                [
                    'name' => 'days',
                    'label' => 'Counted days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'elapsed',
                    'label' => 'Elapsed difference',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Counted weeks',
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
            ],
        ],
    ],
    'formula' => ['elapsed' => 'end - start', 'days' => 'end - start + include_end', 'weeks' => '(end - start + include_end) / 7', 'months' => '(end - start + include_end) / 30.436875'],
    'article' => [
        'intro' => <<<'TXT'
        The number of days between dates depends on whether the question asks for elapsed time or for the number of dates in a list. Both answers are shown, with a switch for the inclusive convention.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            The same two dates can produce 364 or 365 depending on what is being counted. Subtraction gives elapsed days; including both the first and last date adds one to count the date labels. This page places those figures together so a booking, prescription or filing period does not hide its endpoint rule.<p>The answer is <strong>counted days and elapsed difference and counted weeks and approximate months</strong>, worked out from start date and end date and include the end date?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>elapsed</strong></td><td><code>End date - Start date</code></td></tr><tr><td><strong>days</strong></td><td><code>End date - Start date + Include the end date?</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(End date - Start date + Include the end date?) ÷ 7</code></td></tr><tr><td><strong>months</strong></td><td><code>(End date - Start date + Include the end date?) ÷ 30.436875</code></td></tr></tbody></table><p>Elapsed days equal end minus start. The include-end switch adds one when selected; weeks and average months convert that chosen count.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports counted days and elapsed difference and counted weeks and approximate months.</p><ul><li><strong>Start date</strong>.</li><li><strong>End date</strong>.</li><li><strong>Include the end date?</strong>. A choice: Yes, No.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Counted days</strong> — days.</li><li><strong>Elapsed difference</strong> — days.</li><li><strong>Counted weeks</strong> — weeks.</li><li><strong>Approximate months</strong> — months.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start date = 1 January 2026, end date = 31 December 2026, include the end date? = 1 into the form and the panel reads:</p><ul><li><strong>Counted days</strong> = <code>End date - Start date + Include the end date?</code> = <strong>365 days</strong></li><li><strong>Elapsed difference</strong> = <code>End date - Start date</code> = <strong>364 days</strong></li><li><strong>Counted weeks</strong> = <code>(End date - Start date + Include the end date?) ÷ 7</code> = <strong>52.143 weeks</strong></li><li><strong>Approximate months</strong> = <code>(End date - Start date + Include the end date?) ÷ 30.436875</code> = <strong>11.992 months</strong></li></ul><p>For overnight stays, the elapsed difference is usually the number of nights. For a date-by-date checklist, inclusive counting is often more useful. Neither answer is inherently wrong; the intended convention decides. The approximate-month figure uses the chosen day count and the Gregorian average month, so it is a scale estimate rather than a count of anniversaries. Weekends and public holidays remain in the total. If a legal or medical instruction specifies how to count the first dose or final day, follow that instruction instead of relying on a generic default.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 818 - 20 454 + 1</code>, which comes to <strong>365 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>1 January to 31 December 2026 is 364 elapsed days. With the end date included, the count is 365; that is 52.1429 weeks or about 11.9921 average months. The option changes the counted span, not the underlying subtraction.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Counted days</th><th>Elapsed difference</th><th>Counted weeks</th><th>Approximate months</th></tr></thead><tbody><tr><td><strong>Start date</strong> +1 day</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td><td>−0.27 %</td></tr><tr><td><strong>End date</strong> +1 day</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td><td>+0.27 %</td></tr><tr><td><strong>Include the end date?</strong> +10 %</td><td>+0.03 %</td><td>+0 %</td><td>+0.03 %</td><td>+0.03 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Start date</strong>. <strong>Include the end date?</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start date</strong> opens at 1 January 2026</li><li><strong>End date</strong> opens at 31 December 2026</li><li><strong>Include the end date?</strong> opens at 1</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            For overnight stays, the elapsed difference is usually the number of nights. For a date-by-date checklist, inclusive counting is often more useful. Neither answer is inherently wrong; the intended convention decides. The approximate-month figure uses the chosen day count and the Gregorian average month, so it is a scale estimate rather than a count of anniversaries. Weekends and public holidays remain in the total. If a legal or medical instruction specifies how to count the first dose or final day, follow that instruction instead of relying on a generic default.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start date and end date and include the end date?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Counted days and elapsed difference and counted weeks and approximate months should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/date-countdown">Date countdown</a> <a href="/everyday-life/working-days">Working days</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start date</strong> +10 days</td><td>365</td><td>355</td><td>×0.973</td></tr><tr><td><strong>End date</strong> +10 days</td><td>365</td><td>375</td><td>×1.027</td></tr><tr><td><strong>Include the end date?</strong> ×10</td><td>365</td><td>374</td><td>×1.025</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Number of Days calculator work out?', 'a' => <<<'TXT'
            It returns counted days and elapsed difference and counted weeks and approximate months from start date and end date and include the end date?. The relationship is End date - Start date.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start date, End date, Include the end date?. Everything else is computed.'],
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
            ['q' => 'What does the switch change?', 'a' => 'It adds one day when you want the end date counted as a date in the span.'],
            ['q' => 'Which answer is right for hotel nights?', 'a' => 'Usually the elapsed difference, because checkout day is not another overnight stay.'],
            ['q' => 'Are months exact?', 'a' => 'No. The month value uses the average length of 30.436875 days.'],
            ['q' => 'Are weekends removed?', 'a' => 'No. Every calendar day is counted.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
