<?php

/**
 * How Many Days Have I Been Alive
 * /everyday-life/how-many-days-have-i-been-alive
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'How Many Days Have I Been Alive',
    'meta' => ['title' => 'How Many Days Have I Been Alive — Exact Day Count', 'description' => 'The exact number of days you have been alive, with the hours, the weekends and the birthdays that fit inside the count. See the formula and an example.', 'h1' => 'How Many Days Have I Been Alive', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'today', 'label' => 'Today', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'days',
                    'label' => 'Days alive',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weekends',
                    'label' => 'Weekend days inside',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'birthdays',
                    'label' => 'Birthdays passed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'today - birth', 'weekends' => 'floor(((today - birth) - mod(5 - mod(birth + 3, 7), 7) + 6) / 7) + floor(((today - birth) - mod(6 - mod(birth + 3, 7), 7) + 6) / 7)', 'birthdays' => <<<'TXT'
    getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0))
    TXT],
    'article' => [
        'intro' => <<<'TXT'
        A day count from birth to a chosen date, with the weekends inside it and the birthdays passed. The number people want on a birthday card, and the arithmetic behind it.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The day count is the honest answer to the question, and the reason it is asked is usually that a year is a poor unit for a long life: thirty-six birthdays and thirteen thousand days are the same span and feel different.</p><p>The weekends line divides the count by seven with the starting weekday taken into account, so it is the number of Saturdays and Sundays inside the span rather than an estimate.</p><p>The answer is <strong>days alive and weekend days inside and birthdays passed</strong>, worked out from date of birth and today. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Today - Date of birth</code></td></tr><tr><td><strong>weekends</strong></td><td><code>floor(((Today - Date of birth) - mod(5 - mod(Date of birth + 3, 7), 7) + 6) ÷ 7) + floor(((Today - Date of birth) - mod(6 - mod(Date of birth + 3, 7), 7) + 6) ÷ 7)</code></td></tr><tr><td><strong>birthdays</strong></td><td><code>getYear(Today) - getYear(Date of birth) - if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code></td></tr></tbody></table><p>One subtraction for the days. The weekends use the weekday of the birth date to place the first Saturday and Sunday in the span, which is what stops the division by seven from drifting by a day.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days alive and weekend days inside and birthdays passed.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Today</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days alive</strong> — days.</li><li><strong>Weekend days inside</strong> — days.</li><li><strong>Birthdays passed</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, today = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Days alive</strong> = <code>Today - Date of birth</code> = <strong>13 308 days</strong></li><li><strong>Weekend days inside</strong> = <code>floor(((Today - Date of birth) - mod(5 - mod(Date of birth + 3, 7), 7) + 6) ÷ 7) + floor(((Today - Date of birth) - mod(6 - mod(Date of birth + 3, 7), 7) + 6) ÷ 7)</code> = <strong>3 802 days</strong></li><li><strong>Birthdays passed</strong> = <code>getYear(Today) - getYear(Date of birth) - if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code> = <strong>36 years</strong></li></ul><p>Weekend days come to about two sevenths of the total. If they come out far from that, the birth weekday has been used wrongly.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 - 7 441</code>, which comes to <strong>13 308 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Born 17 May 1990 and read on 23 October 2026: 13 308 days alive, of which 3 802 are weekend days, and 36 birthdays have passed.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days alive</th><th>Weekend days inside</th><th>Birthdays passed</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>−0.01 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Today</strong> +1 day</td><td>+0.01 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Today</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 16 October 2026, today = 23 October 2026: <strong>Days alive</strong> = 7 days, <strong>Weekend days inside</strong> = 2 days, <strong>Birthdays passed</strong> = 0 years. One week is seven days, and exactly two of them are weekend days, which is the smallest case that tests the weekday offset.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Multiplying years by 365.</strong> Nine or ten leap days go missing, and the count is short by that much.</li><li><strong>Expecting exactly two sevenths of the days to be weekends.</strong> The span rarely divides by seven, so the fraction is close and never exact.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No holiday list.</strong> Public holidays are ordinary days here.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and today. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days alive and weekend days inside and birthdays passed should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>A birthday card with a real number in it.</li></li><li><li>Checking a long service record in days.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age-in-days">Age in days</a> <a href="/everyday-life/business-days">Business days</a> <a href="/everyday-life/day-counter">Day counter</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>13 308</td><td>13 298</td><td>unchanged</td></tr><tr><td><strong>Today</strong> +10 days</td><td>13 308</td><td>13 318</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the How Many Days Have I Been Alive calculator work out?', 'a' => 'It returns days alive and weekend days inside and birthdays passed from date of birth and today. The relationship is Today - Date of birth.'],
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
            ['q' => 'Do the weekends include holidays?', 'a' => 'No. Only Saturday and Sunday are counted, which is the definition of a weekend before any holiday list is applied.'],
            ['q' => 'Why do the weekends not come to two sevenths exactly?', 'a' => 'Because a span of days is not a multiple of seven. The count is exact even when the fraction is not.'],
            ['q' => 'Does the count include today?', 'a' => 'No. It runs from birth to the date you give, so today\'s own day is not yet counted.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-days', 'name' => 'Age in days'],
            ['path' => '/everyday-life/business-days', 'name' => 'Business days'],
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
