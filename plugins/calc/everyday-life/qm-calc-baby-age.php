<?php

/**
 * Baby Age Calculator
 * /everyday-life/baby-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Baby Age Calculator',
    'meta' => ['title' => 'Baby Age Calculator — Weeks, Months and Days', 'description' => 'A baby\'s age in weeks, in months and in days, side by side, with the days since birth and the date of the next monthly milestone. The formula is shown.', 'h1' => 'Baby Age Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '2026-06-10'],
                ['name' => 'today', 'label' => 'Today', 'type' => 'date', 'default' => '2026-10-23'],
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
                    'name' => 'months',
                    'label' => 'Months old',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'months',
                ],
                ['name' => 'next_month', 'label' => 'Date of the next monthly milestone', 'type' => 'date'],
            ],
        ],
    ],
    'formula' => ['days' => 'today - birth', 'weeks' => 'floor((today - birth) / 7)', 'months' => <<<'TXT'
    if_else(daysBetween(dateAtMonthsOld(birth, floor((today - birth) / 30.436875) + 1), today) >= 0, floor((today - birth) / 30.436875) + 1, floor((today - birth) / 30.436875))
    TXT, 'next_month' => <<<'TXT'
    dateAtMonthsOld(birth, if_else(daysBetween(dateAtMonthsOld(birth, floor((today - birth) / 30.436875) + 1), today) >= 0, floor((today - birth) / 30.436875) + 1, floor((today - birth) / 30.436875)) + 1)
    TXT],
    'article' => [
        'intro' => 'Three readings of one small age. A newborn is counted in days, then weeks, then months, and each switch happens at a different moment.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A baby's age is three different numbers and the clinic expects all three. Days for the first fortnight, weeks for the first few months, months from about eight weeks on.</p><p>The page gives them together with the date of the next monthly milestone, which is the date a vaccination or a check-up is booked against. Whole weeks are floored, so a baby of eleven weeks and six days is eleven weeks old and not twelve.</p><p>The answer is <strong>days old and weeks old and months old and date of the next monthly milestone</strong>, worked out from date of birth and today. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Today - Date of birth</code></td></tr><tr><td><strong>weeks</strong></td><td><code>floor((Today - Date of birth) ÷ 7)</code></td></tr><tr><td><strong>months</strong></td><td><code>if_else(daysBetween(dateAtMonthsOld(Date of birth, floor((Today - Date of birth) ÷ 30.436875) + 1), Today) >= 0, floor((Today - Date of birth) ÷ 30.436875) + 1, floor((Today - Date of birth) ÷ 30.436875))</code></td></tr><tr><td><strong>next_month</strong></td><td><code>dateAtMonthsOld(Date of birth, if_else(daysBetween(dateAtMonthsOld(Date of birth, floor((Today - Date of birth) ÷ 30.436875) + 1), Today) >= 0, floor((Today - Date of birth) ÷ 30.436875) + 1, floor((Today - Date of birth) ÷ 30.436875)) + 1)</code></td></tr></tbody></table><p>Days by subtraction, weeks by flooring the days over seven, months by testing the next monthly anniversary against the date and stepping back if it has not arrived. The milestone line is that anniversary plus one.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days old and weeks old and months old and date of the next monthly milestone.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Today</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days old</strong> — days.</li><li><strong>Weeks old</strong> — weeks.</li><li><strong>Months old</strong> — months.</li><li><strong>Date of the next monthly milestone</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 10 June 2026, today = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Days old</strong> = <code>Today - Date of birth</code> = <strong>135 days</strong></li><li><strong>Weeks old</strong> = <code>floor((Today - Date of birth) ÷ 7)</code> = <strong>19 weeks</strong></li><li><strong>Months old</strong> = <code>if_else(daysBetween(dateAtMonthsOld(Date of birth, floor((Today - Date of birth) ÷ 30.436875) + 1), Today) >= 0, floor((Today - Date of birth) ÷ 30.436875) + 1, floor((Today - Date of birth) ÷ 30.436875))</code> = <strong>4 months</strong></li><li><strong>Date of the next monthly milestone</strong> = <code>dateAtMonthsOld(Date of birth, if_else(daysBetween(dateAtMonthsOld(Date of birth, floor((Today - Date of birth) ÷ 30.436875) + 1), Today) >= 0, floor((Today - Date of birth) ÷ 30.436875) + 1, floor((Today - Date of birth) ÷ 30.436875)) + 1)</code> = <strong>10 November 2026</strong></li></ul><p>The month line counts monthly anniversaries, so a baby born on the 31st is a month old on the last day of a shorter month.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 - 20 614</code>, which comes to <strong>135 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A baby born on 10 June 2026 is 135 days old on 23 October, which is 19 weeks, or four months by the calendar, with the fifth month on 10 November.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days old</th><th>Weeks old</th><th>Months old</th><th>Date of the next monthly milestone</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>−0.74 %</td><td>+0 %</td><td>+0 %</td><td>+1 d</td></tr><tr><td><strong>Today</strong> +1 day</td><td>+0.74 %</td><td>+0 %</td><td>+0 %</td><td>+0 d</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 10 June 2026</li><li><strong>Today</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 22 October 2026, today = 23 October 2026: <strong>Days old</strong> = 1 days, <strong>Weeks old</strong> = 0 weeks, <strong>Months old</strong> = 0 months, <strong>Date of the next monthly milestone</strong> = 22 November 2026. One day old is zero weeks and zero months, which is the case that shows the floors doing their job.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Rounding weeks up.</strong> Nineteen weeks and two days is nineteen weeks; the second number is not a week.</li><li><strong>Reading the months line as days over thirty.</strong> It counts anniversaries, which is why the milestone date is the useful line.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No corrected age.</strong> A premature baby's corrected age needs the due date, not the birth date.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and today. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days old and weeks old and months old and date of the next monthly milestone should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Answering the midwife's question in the unit she expects.</li></li><li><li>Dating the next monthly check-up.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age-in-weeks">Age in weeks</a> <a href="/everyday-life/age-in-months">Age in months</a> <a href="/everyday-life/chronological-age">Chronological age</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>135</td><td>125</td><td>×0.926</td></tr><tr><td><strong>Today</strong> +10 days</td><td>135</td><td>145</td><td>×1.074</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Baby Age calculator work out?', 'a' => 'It returns days old and weeks old and months old and date of the next monthly milestone from date of birth and today. The relationship is Today - Date of birth.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Today. Everything else is computed.'],
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
            ['q' => 'Why three ages?', 'a' => 'Because clinics switch units as a baby grows and each form asks in the unit of the moment. Having all three avoids a conversion at the desk.'],
            ['q' => 'When do I stop counting in weeks?', 'a' => 'Usually around three months, when a form starts asking for months. The weeks line keeps working after that.'],
            ['q' => 'Does the milestone date account for short months?', 'a' => 'Yes. It lands on the same day of the month, clamped at the end of a short one.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-weeks', 'name' => 'Age in weeks'],
            ['path' => '/everyday-life/age-in-months', 'name' => 'Age in months'],
            ['path' => '/everyday-life/chronological-age', 'name' => 'Chronological age'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
