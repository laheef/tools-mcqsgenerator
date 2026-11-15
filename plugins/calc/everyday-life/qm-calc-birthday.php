<?php

/**
 * Birthday Calculator
 * /everyday-life/birthday
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Birthday Calculator',
    'meta' => ['title' => 'Birthday Calculator — Age and Next Birthday', 'description' => 'Work out completed age, the next birthday date, its weekday and how many days remain. Enter the date of birth and a reference date rather than relying on.', 'h1' => 'Birthday Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '2001-12-25'],
                ['name' => 'today', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'age',
                    'label' => 'Completed age',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                ['name' => 'next', 'label' => 'Next birthday', 'type' => 'date'],
                [
                    'name' => 'days',
                    'label' => 'Days until birthday',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday (Sunday is 0)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['age' => 'getYear(today) - getYear(birth) - if_else(today < dateAtYearsOld(birth, getYear(today) - getYear(birth)), 1, 0)', 'next' => 'dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(today < dateAtYearsOld(birth, getYear(today) - getYear(birth)), 1, 0)) + 1)', 'days' => 'dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(today < dateAtYearsOld(birth, getYear(today) - getYear(birth)), 1, 0)) + 1) - today', 'weekday' => 'getDayOfWeek(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(today < dateAtYearsOld(birth, getYear(today) - getYear(birth)), 1, 0)) + 1))'],
    'article' => [
        'intro' => <<<'TXT'
        A birthday calculator needs to know whether this year's anniversary has already passed. These results show the completed age and the next birthday from a chosen reference date.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            The birthday's month and day decide whether a person has reached their next age this year. A simple subtraction of years is one too high before the anniversary and right on or after it. This page tests that boundary, then finds the next anniversary and its weekday so a party date can be checked without mental calendar arithmetic.<p>The answer is <strong>completed age and next birthday and days until birthday and weekday</strong>, worked out from date of birth and count from. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>age</strong></td><td><code>getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)</code></td></tr><tr><td><strong>next</strong></td><td><code>dateAtYearsOld(Date of birth, (getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)) + 1)</code></td></tr><tr><td><strong>days</strong></td><td><code>dateAtYearsOld(Date of birth, (getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)) + 1) - Count from</code></td></tr><tr><td><strong>weekday</strong></td><td><code>getDayOfWeek(dateAtYearsOld(Date of birth, (getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)) + 1))</code></td></tr></tbody></table><p>Completed age is the year difference minus one when the birthday month and day are still ahead. The next birthday is the birth date moved forward by one more completed year; subtracting today's day number gives the countdown.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports completed age and next birthday and days until birthday and weekday.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Count from</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Completed age</strong> — years.</li><li><strong>Next birthday</strong>.</li><li><strong>Days until birthday</strong> — days.</li><li><strong>Weekday (Sunday is 0)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 25 December 2001, count from = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Completed age</strong> = <code>getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)</code> = <strong>24 years</strong></li><li><strong>Next birthday</strong> = <code>dateAtYearsOld(Date of birth, (getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)) + 1)</code> = <strong>25 December 2026</strong></li><li><strong>Days until birthday</strong> = <code>dateAtYearsOld(Date of birth, (getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)) + 1) - Count from</code> = <strong>63 days</strong></li><li><strong>Weekday (Sunday is 0)</strong> = <code>getDayOfWeek(dateAtYearsOld(Date of birth, (getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0)) + 1))</code> = <strong>5</strong></li></ul><p>Leap-day birthdays need a declared convention in non-leap years. The date helper clamps 29 February to 28 February when it moves into a year without that date. Some institutions instead observe 1 March; this page does not choose that legal or cultural rule. If the birthday is used for an official age threshold, check the governing jurisdiction. For ordinary planning, the calculated weekday and count are a useful prompt to verify the date on the calendar before sending invitations.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 749) - getYear(11 681) - if_else(20 749 < dateAtYearsOld(11 681, getYear(20 749) - getYear(11 681)), 1, 0)</code>, which comes to <strong>24 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Someone born 25 December 2001 is 24 on 23 October 2026. The next birthday is 25 December, 63 days away, and falls on Friday (5 when Sunday is zero). A May birthday has already happened by the reference date, so the next one lies in May 2027.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Completed age</th><th>Next birthday</th><th>Days until birthday</th><th>Weekday (Sunday is 0)</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>+0 %</td><td>+1 d</td><td>+1.59 %</td><td>+20 %</td></tr><tr><td><strong>Count from</strong> +1 day</td><td>+0 %</td><td>+0 d</td><td>−1.59 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date of birth</strong>. <strong>Count from</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 25 December 2001</li><li><strong>Count from</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            Leap-day birthdays need a declared convention in non-leap years. The date helper clamps 29 February to 28 February when it moves into a year without that date. Some institutions instead observe 1 March; this page does not choose that legal or cultural rule. If the birthday is used for an official age threshold, check the governing jurisdiction. For ordinary planning, the calculated weekday and count are a useful prompt to verify the date on the calendar before sending invitations.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and count from. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Completed age and next birthday and days until birthday and weekday should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/birthday-countdown">Birthday countdown</a> <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/date-of-birth">Date of birth from age</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>24</td><td>24</td><td>unchanged</td></tr><tr><td><strong>Count from</strong> +10 days</td><td>24</td><td>24</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Birthday calculator work out?', 'a' => <<<'TXT'
            It returns completed age and next birthday and days until birthday and weekday from date of birth and count from. The relationship is getYear(Count from) - getYear(Date of birth) - if_else(Count from < dateAtYearsOld(Date of birth, getYear(Count from) - getYear(Date of birth)), 1, 0).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Count from. Everything else is computed.'],
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
            ['q' => 'How is completed age calculated?', 'a' => 'The year difference is reduced by one if this year\'s calendar anniversary has not yet arrived.'],
            ['q' => 'Does it use today\'s date automatically?', 'a' => 'No. A reference date field makes the result repeatable.'],
            ['q' => 'How are 29 February birthdays handled?', 'a' => 'They clamp to 28 February in a non-leap year; local rules may differ.'],
            ['q' => 'What is weekday zero?', 'a' => 'Sunday is 0, Monday 1, through Saturday 6.'],
        ],
        'related' => [
            ['path' => '/everyday-life/birthday-countdown', 'name' => 'Birthday countdown'],
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/date-of-birth', 'name' => 'Date of birth from age'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
