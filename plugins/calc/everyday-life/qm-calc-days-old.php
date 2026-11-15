<?php

/**
 * Days Old Calculator
 * /everyday-life/days-old
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days Old Calculator',
    'meta' => ['title' => 'Days Old — Age in Days, Weeks and Hours — Free Tool', 'description' => 'Calculate how many calendar days have passed since a birth date, then express the same age in weeks and hours. Choose the reference date to reproduce the.', 'h1' => 'Days Old Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '2000-01-01'],
                ['name' => 'today', 'label' => 'Count through', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'days',
                    'label' => 'Days old',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks old',
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
            ],
        ],
    ],
    'formula' => ['days' => 'today - birth', 'weeks' => '(today - birth) / 7', 'hours' => '(today - birth) * 24'],
    'article' => [
        'intro' => <<<'TXT'
        Age is usually stated in years, but some milestones are counted in days. Enter a birth date and a reference date to get elapsed days, weeks and equivalent hours.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A day count gives a different feel for a long age than a year count. It includes the leap days that actually occurred between the dates, rather than multiplying years by 365. The start and end remain visible, so the result can be checked against a calendar or rerun for a future milestone.<p>The answer is <strong>days old and weeks old and equivalent hours</strong>, worked out from date of birth and count through. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Count through - Date of birth</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Count through - Date of birth) ÷ 7</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Count through - Date of birth) × 24</code></td></tr></tbody></table><p>Subtract the birth day number from the reference day number. Divide by seven for weeks and multiply by 24 for equivalent hours. Gregorian leap days are already included in the date subtraction.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days old and weeks old and equivalent hours.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Count through</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days old</strong> — days.</li><li><strong>Weeks old</strong> — weeks.</li><li><strong>Equivalent hours</strong> — hours.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 1 January 2000, count through = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Days old</strong> = <code>Count through - Date of birth</code> = <strong>9 792 days</strong></li><li><strong>Weeks old</strong> = <code>(Count through - Date of birth) ÷ 7</code> = <strong>1 398.857 weeks</strong></li><li><strong>Equivalent hours</strong> = <code>(Count through - Date of birth) × 24</code> = <strong>235 008 hours</strong></li></ul><p>The word 'old' can mean completed calendar days or the count of dates touched. This page reports completed elapsed days, so someone born yesterday is one day old today, and the birth date itself contributes no completed day at the instant the count begins. A birth time is not captured, so the result cannot distinguish 23 hours from 25 hours around local clock changes. For a medical, legal or official age calculation, use the jurisdiction's stated method and verify the birth record. The weeks figure is a decimal duration, not a number of whole weeks lived.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 - 10 957</code>, which comes to <strong>9 792 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From 1 January 2000 to 23 October 2026 is 9,792 elapsed days, or 1,398.8571 weeks and 235,008 equivalent hours. A one-day interval returns exactly one day; the fractions appear only when converting that count into weeks.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days old</th><th>Weeks old</th><th>Equivalent hours</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>−0.01 %</td><td>−0.01 %</td><td>−0.01 %</td></tr><tr><td><strong>Count through</strong> +1 day</td><td>+0.01 %</td><td>+0.01 %</td><td>+0.01 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 1 January 2000</li><li><strong>Count through</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            The word 'old' can mean completed calendar days or the count of dates touched. This page reports completed elapsed days, so someone born yesterday is one day old today, and the birth date itself contributes no completed day at the instant the count begins. A birth time is not captured, so the result cannot distinguish 23 hours from 25 hours around local clock changes. For a medical, legal or official age calculation, use the jurisdiction's stated method and verify the birth record. The weeks figure is a decimal duration, not a number of whole weeks lived.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and count through. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days old and weeks old and equivalent hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/birthday-countdown">Birthday countdown</a> <a href="/everyday-life/date-of-birth">Date of birth from age</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>9 792</td><td>9 782</td><td>×0.999</td></tr><tr><td><strong>Count through</strong> +10 days</td><td>9 792</td><td>9 802</td><td>×1.001</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days Old calculator work out?', 'a' => 'It returns days old and weeks old and equivalent hours from date of birth and count through. The relationship is Count through - Date of birth.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Count through. Everything else is computed.'],
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
            ['q' => 'Are leap years included?', 'a' => 'Yes. Subtracting calendar days includes every 29 February between the dates.'],
            ['q' => 'Does it count the birth date?', 'a' => 'It reports elapsed days, not an inclusive count of date labels.'],
            ['q' => 'Can I calculate age at a past date?', 'a' => 'Yes, set the reference date to that day.'],
            ['q' => 'Is the hour result exact?', 'a' => 'It is 24 hours per calendar day and does not account for time zones or clock changes.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/birthday-countdown', 'name' => 'Birthday countdown'],
            ['path' => '/everyday-life/date-of-birth', 'name' => 'Date of birth from age'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
