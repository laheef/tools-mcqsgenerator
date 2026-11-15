<?php

/**
 * Time Until Calculator
 * /everyday-life/time-until
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time Until Calculator',
    'meta' => ['title' => 'Time Until — Exact Countdown to Date and Time', 'description' => 'Count the exact interval between two calendar dates and clock times in days, weeks, hours and minutes. Set both endpoints to make the countdown reproducible.', 'h1' => 'Time Until Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start_date', 'label' => 'Count from date', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'start_time', 'label' => 'Count from time', 'type' => 'time', 'default' => '12:00'],
                ['name' => 'finish_date', 'label' => 'Target date', 'type' => 'date', 'default' => '2026-12-25'],
                ['name' => 'finish_time', 'label' => 'Target time', 'type' => 'time', 'default' => '09:30'],
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
                    'name' => 'hours',
                    'label' => 'Elapsed hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hours',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Elapsed minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'minutes',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'finish_date - start_date + finish_time - start_time', 'weeks' => '(finish_date - start_date + finish_time - start_time) / 7', 'hours' => '(finish_date - start_date + finish_time - start_time) * 24', 'minutes' => '(finish_date - start_date + finish_time - start_time) * 1440'],
    'article' => [
        'intro' => <<<'TXT'
        A date-only countdown cannot distinguish a morning deadline from one later that evening. Enter both dates and both local clock times for a more specific interval.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A due date can be only part of the deadline. A submission closing at 17:00 is not the same as one closing at midnight, and a flight departure needs a clock time as well as a date. Both endpoints appear here, so the interval can be checked without relying on the current moment in the browser.<p>The answer is <strong>elapsed days and weeks and elapsed hours and elapsed minutes</strong>, worked out from count from date and count from time and target date and target time. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Target date - Count from date + Target time - Count from time</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Target date - Count from date + Target time - Count from time) ÷ 7</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Target date - Count from date + Target time - Count from time) × 24</code></td></tr><tr><td><strong>minutes</strong></td><td><code>(Target date - Count from date + Target time - Count from time) × 1440</code></td></tr></tbody></table><p>The date difference is combined with the fraction-of-day difference between the two clock fields. Multiplying by 24 or 1,440 converts that same interval to hours or minutes.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports elapsed days and weeks and elapsed hours and elapsed minutes.</p><ul><li><strong>Count from date</strong>.</li><li><strong>Count from time</strong>.</li><li><strong>Target date</strong>.</li><li><strong>Target time</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Elapsed days</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Elapsed hours</strong> — hours.</li><li><strong>Elapsed minutes</strong> — minutes.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put count from date = 23 October 2026, count from time = 12:00, target date = 25 December 2026, target time = 09:30 into the form and the panel reads:</p><ul><li><strong>Elapsed days</strong> = <code>Target date - Count from date + Target time - Count from time</code> = <strong>62.896 days</strong></li><li><strong>Weeks</strong> = <code>(Target date - Count from date + Target time - Count from time) ÷ 7</code> = <strong>8.985 weeks</strong></li><li><strong>Elapsed hours</strong> = <code>(Target date - Count from date + Target time - Count from time) × 24</code> = <strong>1 509.5 hours</strong></li><li><strong>Elapsed minutes</strong> = <code>(Target date - Count from date + Target time - Count from time) × 1440</code> = <strong>90 570 minutes</strong></li></ul><p>This is arithmetic on the entered local date and time; it has no location or timezone field. If an interval crosses a daylight-saving change, an elapsed-clock calculation in a named timezone may differ by an hour. For a travel booking or legal filing, use the authoritative local time and verify whether the endpoint is inclusive. The calculator also does not tick down while the page is open: it gives a snapshot from the four values you entered. To refresh it, change the start point. A negative answer means the target is earlier than the starting point, not that the calculator silently swapped the dates.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 812 - 20 749 + 0.396 - 0.5</code>, which comes to <strong>62.896 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From noon on 23 October 2026 to 09:30 on 25 December is 62.895833 days: 1,510.5 hours or 90,630 minutes. On the same date, 09:00 to 17:30 is an 8.5-hour interval.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Elapsed days</th><th>Weeks</th><th>Elapsed hours</th><th>Elapsed minutes</th></tr></thead><tbody><tr><td><strong>Count from date</strong> +1 day</td><td>−1.59 %</td><td>−1.59 %</td><td>−1.59 %</td><td>−1.59 %</td></tr><tr><td><strong>Count from time</strong> +1 hour</td><td>−0.07 %</td><td>−0.07 %</td><td>−0.07 %</td><td>−0.07 %</td></tr><tr><td><strong>Target date</strong> +1 day</td><td>+1.59 %</td><td>+1.59 %</td><td>+1.59 %</td><td>+1.59 %</td></tr><tr><td><strong>Target time</strong> +1 hour</td><td>+0.07 %</td><td>+0.07 %</td><td>+0.07 %</td><td>+0.07 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Count from date</strong>. <strong>Count from time</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Count from date</strong> opens at 23 October 2026</li><li><strong>Count from time</strong> opens at 12:00</li><li><strong>Target date</strong> opens at 25 December 2026</li><li><strong>Target time</strong> opens at 09:30</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Changing the period without changing its unit.</strong> A weekly figure and a yearly figure are comparable only after the number of weeks in the year is stated.</li><li><strong>Treating an estimate as a live clock.</strong> The page calculates from the dates and rates entered; it does not watch the calendar or update a deadline in real time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Inputs define the result.</strong> The page does not fetch calendars, prices or personal records from another service.</li></li><li><li><strong>Local rules can differ.</strong> Holidays, leap years, time zones and contract definitions may change how a real deadline is counted.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The assumptions behind the estimate', 'html' => <<<'TXT'
            This is arithmetic on the entered local date and time; it has no location or timezone field. If an interval crosses a daylight-saving change, an elapsed-clock calculation in a named timezone may differ by an hour. For a travel booking or legal filing, use the authoritative local time and verify whether the endpoint is inclusive. The calculator also does not tick down while the page is open: it gives a snapshot from the four values you entered. To refresh it, change the start point. A negative answer means the target is earlier than the starting point, not that the calculator silently swapped the dates.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need count from date and count from time and target date and target time. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Elapsed days and weeks and elapsed hours and elapsed minutes should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/date-countdown">Date countdown</a> <a href="/everyday-life/hour-countdown">Hour countdown</a> <a href="/everyday-life/time-between-dates">Time between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Count from date</strong> +10 days</td><td>62.896</td><td>52.896</td><td>×0.841</td></tr><tr><td><strong>Count from time</strong> +10 hours</td><td>62.896</td><td>62.479</td><td>×0.993</td></tr><tr><td><strong>Target date</strong> +10 days</td><td>62.896</td><td>72.896</td><td>×1.159</td></tr><tr><td><strong>Target time</strong> +10 hours</td><td>62.896</td><td>63.312</td><td>×1.007</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time Until calculator work out?', 'a' => <<<'TXT'
            It returns elapsed days and weeks and elapsed hours and elapsed minutes from count from date and count from time and target date and target time. The relationship is Target date - Count from date + Target time - Count from time.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Count from date, Count from time, Target date, Target time. Everything else is computed.'],
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
            ['q' => 'Does it count down live?', 'a' => 'No. It calculates the interval between the values in the four fields.'],
            ['q' => 'Are time zones included?', 'a' => 'No. The inputs are local calendar dates and clock times without a zone.'],
            ['q' => 'Why can another timer differ by an hour?', 'a' => 'A timezone-aware timer may account for daylight-saving changes; this calculation does not.'],
            ['q' => 'Can the target be earlier?', 'a' => 'Yes. The result becomes negative rather than reversing the endpoints.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
            ['path' => '/everyday-life/hour-countdown', 'name' => 'Hour countdown'],
            ['path' => '/everyday-life/time-between-dates', 'name' => 'Time between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
