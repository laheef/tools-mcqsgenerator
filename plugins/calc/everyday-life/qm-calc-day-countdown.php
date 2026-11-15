<?php

/**
 * Day Countdown Calculator
 * /everyday-life/day-countdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Day Countdown Calculator',
    'meta' => ['title' => 'Day Countdown — Days, Weeks and Remainder — Free Tool', 'description' => 'Find the elapsed days to a chosen date and split that interval into complete weeks and leftover days. Set the reference date yourself for a repeatable.', 'h1' => 'Day Countdown Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'finish', 'label' => 'Count to', 'type' => 'date', 'default' => '2027-01-01'],
                [
                    'name' => 'days',
                    'label' => 'Total days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Complete weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'remainder',
                    'label' => 'Days after full weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
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
    'formula' => ['days' => 'finish - start', 'weeks' => 'floor((finish - start) / 7)', 'remainder' => '(finish - start) - 7 * floor((finish - start) / 7)', 'hours' => '(finish - start) * 24'],
    'article' => [
        'intro' => 'This countdown makes the seven-day structure visible: it returns full weeks and the days left over, as well as the total interval.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A total such as 70 days is easier to plan when it is split into weeks. The complete-week result rounds down, while the remainder carries the days that do not make another full seven. It is still elapsed time: a countdown from one date to another does not count the first date as an extra day.<p>The answer is <strong>total days and complete weeks and days after full weeks and equivalent hours</strong>, worked out from count from and count to. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Count to - Count from</code></td></tr><tr><td><strong>weeks</strong></td><td><code>floor((Count to - Count from) ÷ 7)</code></td></tr><tr><td><strong>remainder</strong></td><td><code>(Count to - Count from) - 7 × floor((Count to - Count from) ÷ 7)</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Count to - Count from) × 24</code></td></tr></tbody></table><p>Subtract start from finish. The number of complete weeks is the floor of that difference divided by seven; subtract those complete weeks from the total to recover the remainder.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports total days and complete weeks and days after full weeks and equivalent hours.</p><ul><li><strong>Count from</strong>.</li><li><strong>Count to</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Total days</strong> — days.</li><li><strong>Complete weeks</strong> — weeks.</li><li><strong>Days after full weeks</strong> — days.</li><li><strong>Equivalent hours</strong> — hours.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put count from = 23 October 2026, count to = 1 January 2027 into the form and the panel reads:</p><ul><li><strong>Total days</strong> = <code>Count to - Count from</code> = <strong>70 days</strong></li><li><strong>Complete weeks</strong> = <code>floor((Count to - Count from) ÷ 7)</code> = <strong>10 weeks</strong></li><li><strong>Days after full weeks</strong> = <code>(Count to - Count from) - 7 × floor((Count to - Count from) ÷ 7)</code> = <strong>0 days</strong></li><li><strong>Equivalent hours</strong> = <code>(Count to - Count from) × 24</code> = <strong>1 680 hours</strong></li></ul><p>The remainder is always the part left after whole weeks, not a day-of-week label. The same date can land on different weekdays in different years, so this page does not assume the week begins on Monday or Sunday. It only groups duration into sevens. The hours line multiplies calendar days by 24; it is useful for rough scheduling but not for a timed event crossing a daylight-saving transition. When counting down to a deadline, check the rules for weekends and holidays separately. A business-day deadline is not the same measure as an ordinary day countdown.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 819 - 20 749</code>, which comes to <strong>70 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>23 October 2026 to 1 January 2027 is 70 days: ten full weeks, no remainder, and 1,680 equivalent hours. If the interval were 72 days, the page would show ten complete weeks and two remaining days.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Total days</th><th>Complete weeks</th><th>Days after full weeks</th><th>Equivalent hours</th></tr></thead><tbody><tr><td><strong>Count from</strong> +1 day</td><td>−1.43 %</td><td>−10 %</td><td>—</td><td>−1.43 %</td></tr><tr><td><strong>Count to</strong> +1 day</td><td>+1.43 %</td><td>+0 %</td><td>—</td><td>+1.43 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Count from</strong>. <strong>Count to</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Count from</strong> opens at 23 October 2026</li><li><strong>Count to</strong> opens at 1 January 2027</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            The remainder is always the part left after whole weeks, not a day-of-week label. The same date can land on different weekdays in different years, so this page does not assume the week begins on Monday or Sunday. It only groups duration into sevens. The hours line multiplies calendar days by 24; it is useful for rough scheduling but not for a timed event crossing a daylight-saving transition. When counting down to a deadline, check the rules for weekends and holidays separately. A business-day deadline is not the same measure as an ordinary day countdown.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need count from and count to. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Total days and complete weeks and days after full weeks and equivalent hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/working-days">Working days</a> <a href="/everyday-life/date-countdown">Date countdown</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Count from</strong> +10 days</td><td>70</td><td>60</td><td>×0.857</td></tr><tr><td><strong>Count to</strong> +10 days</td><td>70</td><td>80</td><td>×1.143</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Day Countdown calculator work out?', 'a' => 'It returns total days and complete weeks and days after full weeks and equivalent hours from count from and count to. The relationship is Count to - Count from.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Count from, Count to. Everything else is computed.'],
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
            ['q' => 'What does the remainder mean?', 'a' => 'It is the number of days left after removing all complete seven-day weeks.'],
            ['q' => 'Is the first date included?', 'a' => 'No extra inclusive day is added; the result is the elapsed difference.'],
            ['q' => 'Does the week start Sunday or Monday?', 'a' => 'The calculation groups each seven consecutive days; it does not assign weekdays to a named week.'],
            ['q' => 'Can I use it for workdays?', 'a' => 'No. Weekends and holidays are included; use a working-day method for business deadlines.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
