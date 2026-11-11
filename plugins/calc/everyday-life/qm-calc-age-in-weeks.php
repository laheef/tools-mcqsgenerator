<?php

/**
 * Age in Weeks
 * /everyday-life/age-in-weeks
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Age in Weeks',
    'meta' => ['title' => 'Age in Weeks Calculator — Weeks Lived — Free Tool', 'description' => 'A birth date and a date to count to, returned as weeks lived with the days left over and the same span in months. Formula shown. The formula is shown.', 'h1' => 'Age in Weeks', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                [
                    'name' => 'on',
                    'label' => 'Count up to',
                    'type' => 'date',
                    'default' => '2026-10-23',
                    'help' => 'Leave this at today\'s date or choose another day.',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Age in weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'days',
                    'label' => 'Age in days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'years',
                    'label' => 'Age in years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['weeks' => '(on - birth) * 0.14285714285714285', 'years' => '(on - birth) / 365.2425', 'days' => 'on - birth'],
    'article' => [
        'intro' => <<<'TXT'
        The page counts the time between a birth date and a date you choose, in weeks. The count is calendar days multiplied out, so leap years are included and nothing is estimated.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Weeks fit human plans: a pregnancy is forty of them, a school year about thirty-nine, and a notice period is often written in them. The count between two dates divides cleanly.</p><p>The arithmetic is one subtraction and one multiplication. The subtraction gives whole days between the two dates; the multiplication turns those days into weeks.</p><p>The answer is <strong>age in weeks and age in days and age in years</strong>, worked out from date of birth and count up to. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>weeks</strong></td><td><code>(Count up to - Date of birth) × 0.14285714285714285</code></td></tr><tr><td><strong>years</strong></td><td><code>(Count up to - Date of birth) ÷ 365.2425</code></td></tr><tr><td><strong>days</strong></td><td><code>Count up to - Date of birth</code></td></tr></tbody></table><p>365.242 5 is the mean length of the Gregorian year, and 30.436 875 the mean month. Multiplying days by 24, 1 440 or 86 400 assumes a day of exactly that many hours, minutes or seconds.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports age in weeks and age in days and age in years.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Count up to</strong>. Leave this at today&#x27;s date or choose another day.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Age in weeks</strong> — weeks.</li><li><strong>Age in days</strong> — days.</li><li><strong>Age in years</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, count up to = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Age in weeks</strong> = <code>(Count up to - Date of birth) × 0.14285714285714285</code> = <strong>1 901.143 weeks</strong></li><li><strong>Age in days</strong> = <code>Count up to - Date of birth</code> = <strong>13 308 days</strong></li><li><strong>Age in years</strong> = <code>(Count up to - Date of birth) ÷ 365.2425</code> = <strong>36.436 years</strong></li></ul><p>The default dates are a birth on 17 May 1990 and a count to 23 October 2026, which is a span of 13 308 days.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(20 749 - 7 441) × 0.14285714285714285</code>, which comes to <strong>1 901.143 weeks</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Twenty years is 1 043 weeks and a few days. Forty weeks is a pregnancy, and 1 043 of them is a life that has just left school.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Age in weeks</th><th>Age in days</th><th>Age in years</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>−0.01 %</td><td>−0.01 %</td><td>−0.01 %</td></tr><tr><td><strong>Count up to</strong> +1 day</td><td>+0.01 %</td><td>+0.01 %</td><td>+0.01 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Count up to</strong> opens at 23 October 2026 — Leave this at today&#x27;s date or choose another day.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 1 January 2000, count up to = 1 January 2001: <strong>Age in weeks</strong> = 52.286 weeks, <strong>Age in days</strong> = 366 days, <strong>Age in years</strong> = 1.002 years. A leap year included: 366 days, not 365.</li><li>Set date of birth = 17 May 1990, count up to = 17 May 2026: <strong>Age in weeks</strong> = 1 878.429 weeks, <strong>Age in days</strong> = 13 149 days, <strong>Age in years</strong> = 36.001 years. Exactly thirty-six calendar years, birthdays included.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Weeks do not divide evenly.</strong> The leftover days are shown rather than dropped.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>It counts days, not moments.</strong> A birth time would move the hour and second counts, and the page does not ask for one.</li></li><li><li><strong>The end date is not included.</strong> The count stops at the start of the day you choose, so a birthday is not counted until the day after.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Reading a number this large', 'html' => <<<'TXT'
            <p>A count in weeks grows fast enough to stop meaning anything. The cure is the other two boxes: read the weeks against the day count, which people can picture, and the year count, which is how the same span is usually described.</p><p>Milestones are where the big number earns its keep. A billion seconds lands at 31.7 years, a million minutes at 1.9 years, and ten thousand days at 27.4. Each is memorable in a way the raw count is not, and each is a single division away from the figures on this page.</p><p>The default dates are deliberately fixed rather than set to today, so the example above can be reproduced. Change the second box to see the count move by one day for every day you move it.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and count up to. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Age in weeks and age in days and age in years should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Answering the question a child asks about weeks lived.</li></li><li><li>Checking a milestone such as a million minutes.</li></li><li><li>Turning a date of birth into a number for a form that demands one.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age-in-days">Age in days</a> <a href="/everyday-life/age-in-months">Age in months</a> <a href="/everyday-life/pregnancy-countdown">Pregnancy countdown</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>1 901.143</td><td>1 899.714</td><td>unchanged</td></tr><tr><td><strong>Count up to</strong> +10 days</td><td>1 901.143</td><td>1 902.571</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Age in Weeks calculator work out?', 'a' => <<<'TXT'
            It returns age in weeks and age in days and age in years from date of birth and count up to. The relationship is (Count up to - Date of birth) × 0.14285714285714285.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Count up to. Everything else is computed.'],
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
            ['q' => 'How is the weeks count worked out?', 'a' => 'The page subtracts the two dates to get whole days, then multiplies by the number of weeks in a day. Leap years are already inside the day count.'],
            ['q' => 'Does it include the day of birth?', 'a' => 'No. The count runs from the start of the birth date to the start of the date you choose, so a baby is one day old on the day after it was born.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-days', 'name' => 'Age in days'],
            ['path' => '/everyday-life/age-in-months', 'name' => 'Age in months'],
            ['path' => '/everyday-life/pregnancy-countdown', 'name' => 'Pregnancy countdown'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
