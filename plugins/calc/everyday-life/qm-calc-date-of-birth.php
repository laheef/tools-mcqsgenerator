<?php

/**
 * Date of Birth from Age Calculator
 * /everyday-life/date-of-birth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Date of Birth from Age Calculator',
    'meta' => ['title' => 'Date of Birth from Age — Calendar Estimate Tool', 'description' => 'Estimate the birth date for someone at a completed age on a chosen reference date. The page also reports days alive and the date and distance to the next.', 'h1' => 'Date of Birth from Age Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'today', 'label' => 'Age measured on', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'age',
                    'label' => 'Completed age',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'birth', 'label' => 'Estimated date of birth', 'type' => 'date'],
                [
                    'name' => 'days_alive',
                    'label' => 'Days from estimated birth date',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                ['name' => 'next_birthday', 'label' => 'Next birthday', 'type' => 'date'],
                [
                    'name' => 'days_to_next',
                    'label' => 'Days until next birthday',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['birth' => 'dateAtYearsOld(today, -age)', 'days_alive' => 'today - dateAtYearsOld(today, -age)', 'next_birthday' => 'dateAtYearsOld(today, 1)', 'days_to_next' => 'dateAtYearsOld(today, 1) - today'],
    'article' => [
        'intro' => <<<'TXT'
        If you know a person's completed age on a particular date, this page estimates the matching birth anniversary and the next birthday. It cannot infer the unknown month and day from age alone.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A completed age does not identify a unique date of birth. At age 30 on 23 October, the birthday could already have happened earlier in the year or still be ahead. This page makes a calendar-anniversary estimate by placing the birth date on the same month and day thirty years earlier. Use it as an estimate, not as evidence about a person.<p>The answer is <strong>estimated date of birth and days from estimated birth date and next birthday and days until next birthday</strong>, worked out from age measured on and completed age. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>birth</strong></td><td><code>dateAtYearsOld(Age measured on, -Completed age)</code></td></tr><tr><td><strong>days_alive</strong></td><td><code>Age measured on - dateAtYearsOld(Age measured on, -Completed age)</code></td></tr><tr><td><strong>next_birthday</strong></td><td><code>dateAtYearsOld(Age measured on, 1)</code></td></tr><tr><td><strong>days_to_next</strong></td><td><code>dateAtYearsOld(Age measured on, 1) - Age measured on</code></td></tr></tbody></table><p>The calculator moves the reference date backward by the completed age in whole calendar years. Days alive are the date difference from that estimate to the reference date; the next birthday moves the reference date forward one year.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports estimated date of birth and days from estimated birth date and next birthday and days until next birthday.</p><ul><li><strong>Age measured on</strong>.</li><li><strong>Completed age</strong> — years.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Estimated date of birth</strong>.</li><li><strong>Days from estimated birth date</strong> — days.</li><li><strong>Next birthday</strong>.</li><li><strong>Days until next birthday</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put age measured on = 23 October 2026, completed age = 30 years into the form and the panel reads:</p><ul><li><strong>Estimated date of birth</strong> = <code>dateAtYearsOld(Age measured on, -Completed age)</code> = <strong>23 October 1996</strong></li><li><strong>Days from estimated birth date</strong> = <code>Age measured on - dateAtYearsOld(Age measured on, -Completed age)</code> = <strong>10 957 days</strong></li><li><strong>Next birthday</strong> = <code>dateAtYearsOld(Age measured on, 1)</code> = <strong>23 October 2027</strong></li><li><strong>Days until next birthday</strong> = <code>dateAtYearsOld(Age measured on, 1) - Age measured on</code> = <strong>365 days</strong></li></ul><p>The true birth date for someone of a given completed age lies within an interval bounded by birthdays, not at a single guaranteed day. This estimate assumes the birthday matches the reference month and day. A 29 February reference or birth date may be clamped in a non-leap year. The days-alive total is exact for the estimated date but inherits that assumption. For forms, identity checks, medical use or legal eligibility, use a recorded date of birth rather than reverse-engineering one from age.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>dateAtYearsOld(20 749, -30)</code>, which comes to <strong>23 October 1996</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>At age 30 on 23 October 2026, the anniversary estimate is 23 October 1996. The date difference is 10,957 days because seven leap days fall in that thirty-year interval. The next anniversary is 23 October 2027, 365 days away.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Estimated date of birth</th><th>Days from estimated birth date</th><th>Next birthday</th><th>Days until next birthday</th></tr></thead><tbody><tr><td><strong>Age measured on</strong> +1 day</td><td>+1 d</td><td>+0 %</td><td>+1 d</td><td>+0 %</td></tr><tr><td><strong>Completed age</strong> +10 %</td><td>-1096 d</td><td>+10 %</td><td>+0 d</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Completed age</strong>. <strong>Age measured on</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Age measured on</strong> opens at 23 October 2026</li><li><strong>Completed age</strong> opens at 30 years</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            The true birth date for someone of a given completed age lies within an interval bounded by birthdays, not at a single guaranteed day. This estimate assumes the birthday matches the reference month and day. A 29 February reference or birth date may be clamped in a non-leap year. The days-alive total is exact for the estimated date but inherits that assumption. For forms, identity checks, medical use or legal eligibility, use a recorded date of birth rather than reverse-engineering one from age.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need age measured on and completed age. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Estimated date of birth and days from estimated birth date and next birthday and days until next birthday should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/birthday">Birthday calculator</a> <a href="/everyday-life/days-old">Days old</a> <a href="/everyday-life/birth-from-death-date">Birth date from age at death</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Age measured on</strong> +10 days</td><td>23 October 1996</td><td>2 November 1996</td><td>+10 d</td></tr><tr><td><strong>Completed age</strong> ×10</td><td>23 October 1996</td><td>23 October 1726</td><td>-98616 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Date of Birth from Age calculator work out?', 'a' => <<<'TXT'
            It returns estimated date of birth and days from estimated birth date and next birthday and days until next birthday from age measured on and completed age. The relationship is dateAtYearsOld(Age measured on, -Completed age).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Age measured on, Completed age (years). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: completed age in years. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Can age alone reveal a birth date?', 'a' => 'No. Many dates are compatible with the same completed age; this page provides an anniversary estimate.'],
            ['q' => 'Why are there 10,957 days in 30 years?', 'a' => 'The span includes seven leap days, so it is longer than 30 × 365.'],
            ['q' => 'What does completed age mean?', 'a' => 'The number of birthdays already reached on the reference date.'],
            ['q' => 'Is this suitable for official records?', 'a' => 'No. Verify against an original record.'],
        ],
        'related' => [
            ['path' => '/everyday-life/birthday', 'name' => 'Birthday calculator'],
            ['path' => '/everyday-life/days-old', 'name' => 'Days old'],
            ['path' => '/everyday-life/birth-from-death-date', 'name' => 'Birth date from age at death'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
