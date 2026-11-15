<?php

/**
 * Date Countdown Calculator
 * /everyday-life/date-countdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Date Countdown Calculator',
    'meta' => ['title' => 'Date Countdown — Days Until a Date — Free Tool', 'description' => 'Count the calendar days from a reference date to a target, then see that same interval in weeks, hours and minutes. Both dates stay visible in the calculation.', 'h1' => 'Date Countdown Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'today', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'target', 'label' => 'Target date', 'type' => 'date', 'default' => '2026-12-25'],
                [
                    'name' => 'days',
                    'label' => 'Days until target',
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
                    'label' => 'Hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hours',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'minutes',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'target - today', 'weeks' => '(target - today) / 7', 'hours' => '(target - today) * 24', 'minutes' => '(target - today) * 1440'],
    'article' => [
        'intro' => <<<'TXT'
        A countdown is a difference between two calendar days. Choose the date to count from and the date you are waiting for; the page shows the distance in four units.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A countdown needs a start point. A page that silently assumes today becomes stale in a saved link or a printed plan, so both dates are inputs. The result is elapsed calendar days, not a count of named dates with both ends included. Weeks, hours and minutes are unit conversions of that same interval; they do not introduce extra precision into a date-only question.<p>The answer is <strong>days until target and weeks and hours and minutes</strong>, worked out from count from and target date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Target date - Count from</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Target date - Count from) ÷ 7</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Target date - Count from) × 24</code></td></tr><tr><td><strong>minutes</strong></td><td><code>(Target date - Count from) × 1440</code></td></tr></tbody></table><p>Subtract the start day number from the target day number. Divide by seven for weeks, then multiply by 24 or 1,440 for hours or minutes. Those are calendar-unit equivalents, not elapsed clock time across a daylight-saving change.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days until target and weeks and hours and minutes.</p><ul><li><strong>Count from</strong>.</li><li><strong>Target date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days until target</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Hours</strong> — hours.</li><li><strong>Minutes</strong> — minutes.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put count from = 23 October 2026, target date = 25 December 2026 into the form and the panel reads:</p><ul><li><strong>Days until target</strong> = <code>Target date - Count from</code> = <strong>63 days</strong></li><li><strong>Weeks</strong> = <code>(Target date - Count from) ÷ 7</code> = <strong>9 weeks</strong></li><li><strong>Hours</strong> = <code>(Target date - Count from) × 24</code> = <strong>1 512 hours</strong></li><li><strong>Minutes</strong> = <code>(Target date - Count from) × 1440</code> = <strong>90 720 minutes</strong></li></ul><p>When the countdown is for a deadline, check whether the first day is excluded by the rule that governs it. Many notice periods start the day after service; many informal plans count today as day one. The arithmetic here states the distance, leaving the convention visible instead of choosing one on your behalf. A past target returns a negative interval, which is useful for seeing how late something is. A zero means both fields identify the same date. If the event begins at a particular local time, use a time-aware calculation; multiplying date distance by 24 assumes ordinary 24-hour calendar days.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 812 - 20 749</code>, which comes to <strong>63 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From 23 October to 25 December 2026 is 63 elapsed days: exactly nine weeks, or 1,512 hours. From 1 January to 31 December is 364 days between the dates, although 365 calendar dates appear if both endpoints are listed.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days until target</th><th>Weeks</th><th>Hours</th><th>Minutes</th></tr></thead><tbody><tr><td><strong>Count from</strong> +1 day</td><td>−1.59 %</td><td>−1.59 %</td><td>−1.59 %</td><td>−1.59 %</td></tr><tr><td><strong>Target date</strong> +1 day</td><td>+1.59 %</td><td>+1.59 %</td><td>+1.59 %</td><td>+1.59 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Count from</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Count from</strong> opens at 23 October 2026</li><li><strong>Target date</strong> opens at 25 December 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            When the countdown is for a deadline, check whether the first day is excluded by the rule that governs it. Many notice periods start the day after service; many informal plans count today as day one. The arithmetic here states the distance, leaving the convention visible instead of choosing one on your behalf. A past target returns a negative interval, which is useful for seeing how late something is. A zero means both fields identify the same date. If the event begins at a particular local time, use a time-aware calculation; multiplying date distance by 24 assumes ordinary 24-hour calendar days.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need count from and target date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days until target and weeks and hours and minutes should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/birthday-countdown">Birthday countdown</a> <a href="/everyday-life/deadline">Deadline calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Count from</strong> +10 days</td><td>63</td><td>53</td><td>×0.841</td></tr><tr><td><strong>Target date</strong> +10 days</td><td>63</td><td>73</td><td>×1.159</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Date Countdown calculator work out?', 'a' => 'It returns days until target and weeks and hours and minutes from count from and target date. The relationship is Target date - Count from.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Count from, Target date. Everything else is computed.'],
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
            ['q' => 'Is today counted?', 'a' => 'The answer is elapsed days from the start date; the start date itself is not an extra day.'],
            ['q' => 'Why does a year-end countdown show 364?', 'a' => '31 December is 364 days after 1 January. Listing both dates gives 365 date labels.'],
            ['q' => 'Can I count down to a past date?', 'a' => 'Yes. The signed result becomes negative, showing the target has passed.'],
            ['q' => 'Are the hours exact across daylight saving?', 'a' => 'They are 24 times the calendar-day interval; they are not a time-zone-aware elapsed-hour count.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/birthday-countdown', 'name' => 'Birthday countdown'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
