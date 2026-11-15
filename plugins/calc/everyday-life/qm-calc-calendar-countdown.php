<?php

/**
 * Calendar Countdown Calculator
 * /everyday-life/calendar-countdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Calendar Countdown Calculator',
    'meta' => ['title' => 'Calendar Countdown — Days to a Target Date Today', 'description' => 'Count calendar days and equivalent weeks, hours and minutes between a reference date and a target date. Both dates are editable for events, trips and deadlines.', 'h1' => 'Calendar Countdown Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'target', 'label' => 'Target date', 'type' => 'date', 'default' => '2027-04-20'],
                [
                    'name' => 'days',
                    'label' => 'Calendar days',
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
                    'label' => 'Equivalent hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hours',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Equivalent minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'minutes',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'target - start', 'weeks' => '(target - start) / 7', 'hours' => '(target - start) * 24', 'minutes' => '(target - start) * 1440'],
    'article' => [
        'intro' => <<<'TXT'
        A calendar countdown answers how far away a target lies from a chosen day. Its dates are editable, so a saved plan can be checked without changing the meaning of today.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A calendar countdown is useful for plans that start on a date rather than at a minute. Both endpoints are visible, and all four answers come from the same date difference. This avoids the familiar off-by-one argument: elapsed days and inclusive date labels are different questions.<p>The answer is <strong>calendar days and weeks and equivalent hours and equivalent minutes</strong>, worked out from count from and target date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Target date - Count from</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Target date - Count from) ÷ 7</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Target date - Count from) × 24</code></td></tr><tr><td><strong>minutes</strong></td><td><code>(Target date - Count from) × 1440</code></td></tr></tbody></table><p>Subtract the start date from the target date. Weeks are days divided by seven, while hours and minutes use 24 and 1,440 units per calendar day.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports calendar days and weeks and equivalent hours and equivalent minutes.</p><ul><li><strong>Count from</strong>.</li><li><strong>Target date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Calendar days</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Equivalent hours</strong> — hours.</li><li><strong>Equivalent minutes</strong> — minutes.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put count from = 23 October 2026, target date = 20 April 2027 into the form and the panel reads:</p><ul><li><strong>Calendar days</strong> = <code>Target date - Count from</code> = <strong>179 days</strong></li><li><strong>Weeks</strong> = <code>(Target date - Count from) ÷ 7</code> = <strong>25.571 weeks</strong></li><li><strong>Equivalent hours</strong> = <code>(Target date - Count from) × 24</code> = <strong>4 296 hours</strong></li><li><strong>Equivalent minutes</strong> = <code>(Target date - Count from) × 1440</code> = <strong>257 760 minutes</strong></li></ul><p>The hours and minutes are expanded day counts, not stopwatch precision. A calendar interval can contain a daylight-saving shift, so 179 local midnights need not equal 4,296 elapsed clock hours in every timezone. For a flight, appointment or timed release, include the time and zone in the calculation. The plain-date answer remains useful for countdown boards, travel day planning and date-based reminders. If the target precedes the start, the signed result is negative rather than silently reversing the dates.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 928 - 20 749</code>, which comes to <strong>179 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>From 23 October 2026 to 20 April 2027 is 179 days, or 25.5714 weeks and 4,296 equivalent hours. If the dates match, every result is zero.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Calendar days</th><th>Weeks</th><th>Equivalent hours</th><th>Equivalent minutes</th></tr></thead><tbody><tr><td><strong>Count from</strong> +1 day</td><td>−0.56 %</td><td>−0.56 %</td><td>−0.56 %</td><td>−0.56 %</td></tr><tr><td><strong>Target date</strong> +1 day</td><td>+0.56 %</td><td>+0.56 %</td><td>+0.56 %</td><td>+0.56 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Count from</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Count from</strong> opens at 23 October 2026</li><li><strong>Target date</strong> opens at 20 April 2027</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            The hours and minutes are expanded day counts, not stopwatch precision. A calendar interval can contain a daylight-saving shift, so 179 local midnights need not equal 4,296 elapsed clock hours in every timezone. For a flight, appointment or timed release, include the time and zone in the calculation. The plain-date answer remains useful for countdown boards, travel day planning and date-based reminders. If the target precedes the start, the signed result is negative rather than silently reversing the dates.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need count from and target date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Calendar days and weeks and equivalent hours and equivalent minutes should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/date-countdown">Date countdown</a> <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/deadline">Deadline calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Count from</strong> +10 days</td><td>179</td><td>169</td><td>×0.944</td></tr><tr><td><strong>Target date</strong> +10 days</td><td>179</td><td>189</td><td>×1.056</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Calendar Countdown calculator work out?', 'a' => 'It returns calendar days and weeks and equivalent hours and equivalent minutes from count from and target date. The relationship is Target date - Count from.'],
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
            ['q' => 'How is this different from a timer?', 'a' => 'It compares calendar dates; it does not track hours, minutes or seconds from the current moment.'],
            ['q' => 'Does it include the target day?', 'a' => 'It returns elapsed date difference, without adding an inclusive endpoint.'],
            ['q' => 'Why are hours approximate?', 'a' => 'Each date is treated as 24 hours; timezone clock changes are not represented.'],
            ['q' => 'Can the target be in the past?', 'a' => 'Yes. The difference is signed and becomes negative.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
