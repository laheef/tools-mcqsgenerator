<?php

/**
 * Palindrome Date Calculator
 * /everyday-life/palindrome-date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Palindrome Date Calculator',
    'meta' => ['title' => 'Palindrome Date — Reverse and Compare YYYYMMDD', 'description' => 'Format a date as eight YYYYMMDD digits, reverse them and compare the result. The page also totals the digits; it does not remove leading zeroes from the.', 'h1' => 'Palindrome Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Date', 'type' => 'date', 'default' => '2020-02-02'],
                [
                    'name' => 'code',
                    'label' => 'Date as YYYYMMDD',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'reversed',
                    'label' => 'Digits reversed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'palindrome',
                    'label' => 'Palindrome? (1 yes, 0 no)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'digit_sum',
                    'label' => 'Digit sum',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['code' => 'getYear(date) * 10000 + (getMonth(date) + 1) * 100 + getDate(date)', 'reversed' => <<<'TXT'
    mod(code, 10) * 10000000 + mod(floor(code / 10), 10) * 1000000 + mod(floor(code / 100), 10) * 100000 + mod(floor(code / 1000), 10) * 10000 + mod(floor(code / 10000), 10) * 1000 + mod(floor(code / 100000), 10) * 100 + mod(floor(code / 1000000), 10) * 10 + floor(code / 10000000)
    TXT, 'palindrome' => <<<'TXT'
    if_else(code == mod(code, 10) * 10000000 + mod(floor(code / 10), 10) * 1000000 + mod(floor(code / 100), 10) * 100000 + mod(floor(code / 1000), 10) * 10000 + mod(floor(code / 10000), 10) * 1000 + mod(floor(code / 100000), 10) * 100 + mod(floor(code / 1000000), 10) * 10 + floor(code / 10000000), 1, 0)
    TXT, 'digit_sum' => <<<'TXT'
    mod(code,10) + mod(floor(code/10),10) + mod(floor(code/100),10) + mod(floor(code/1000),10) + mod(floor(code/10000),10) + mod(floor(code/100000),10) + mod(floor(code/1000000),10) + floor(code/10000000)
    TXT],
    'article' => [
        'intro' => <<<'TXT'
        A palindrome date reads the same backward as forward under a chosen numeric format. This page uses YYYYMMDD, reverses the eight digits, and reports whether the values match.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            Palindrome dates depend on the order used to write a date. The same day can look symmetrical in one format and ordinary in another. This calculator chooses YYYYMMDD, keeps all eight positions in the arithmetic and compares the reversed digits with the original code.<p>The answer is <strong>date as YYYYMMDD and digits reversed and palindrome? and digit sum</strong>, worked out from date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>code</strong></td><td><code>getYear(Date) × 10000 + (getMonth(Date) + 1) × 100 + getDate(Date)</code></td></tr><tr><td><strong>reversed</strong></td><td><code>mod(code, 10) × 10000000 + mod(floor(code ÷ 10), 10) × 1000000 + mod(floor(code ÷ 100), 10) × 100000 + mod(floor(code ÷ 1000), 10) × 10000 + mod(floor(code ÷ 10000), 10) × 1000 + mod(floor(code ÷ 100000), 10) × 100 + mod(floor(code ÷ 1000000), 10) × 10 + floor(code ÷ 10000000)</code></td></tr><tr><td><strong>palindrome</strong></td><td><code>if_else(code == mod(code, 10) × 10000000 + mod(floor(code ÷ 10), 10) × 1000000 + mod(floor(code ÷ 100), 10) × 100000 + mod(floor(code ÷ 1000), 10) × 10000 + mod(floor(code ÷ 10000), 10) × 1000 + mod(floor(code ÷ 100000), 10) × 100 + mod(floor(code ÷ 1000000), 10) × 10 + floor(code ÷ 10000000), 1, 0)</code></td></tr><tr><td><strong>digit_sum</strong></td><td><code>mod(code,10) + mod(floor(code ÷ 10),10) + mod(floor(code ÷ 100),10) + mod(floor(code ÷ 1000),10) + mod(floor(code ÷ 10000),10) + mod(floor(code ÷ 100000),10) + mod(floor(code ÷ 1000000),10) + floor(code ÷ 10000000)</code></td></tr></tbody></table><p>The date is assembled from year, month and day into an eight-digit code. Each decimal place is extracted and rebuilt in reverse order; the equality test returns 1 for a match and 0 otherwise.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports date as YYYYMMDD and digits reversed and palindrome? and digit sum.</p><ul><li><strong>Date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Date as YYYYMMDD</strong>.</li><li><strong>Digits reversed</strong>.</li><li><strong>Palindrome? (1 yes, 0 no)</strong>.</li><li><strong>Digit sum</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date = 2 February 2020 into the form and the panel reads:</p><ul><li><strong>Date as YYYYMMDD</strong> = <code>getYear(Date) × 10000 + (getMonth(Date) + 1) × 100 + getDate(Date)</code> = <strong>2.02 × 10<sup>7</sup></strong></li><li><strong>Digits reversed</strong> = <code>mod(code, 10) × 10000000 + mod(floor(code ÷ 10), 10) × 1000000 + mod(floor(code ÷ 100), 10) × 100000 + mod(floor(code ÷ 1000), 10) × 10000 + mod(floor(code ÷ 10000), 10) × 1000 + mod(floor(code ÷ 100000), 10) × 100 + mod(floor(code ÷ 1000000), 10) × 10 + floor(code ÷ 10000000)</code> = <strong>2.02 × 10<sup>7</sup></strong></li><li><strong>Palindrome? (1 yes, 0 no)</strong> = <code>if_else(code == mod(code, 10) × 10000000 + mod(floor(code ÷ 10), 10) × 1000000 + mod(floor(code ÷ 100), 10) × 100000 + mod(floor(code ÷ 1000), 10) × 10000 + mod(floor(code ÷ 10000), 10) × 1000 + mod(floor(code ÷ 100000), 10) × 100 + mod(floor(code ÷ 1000000), 10) × 10 + floor(code ÷ 10000000), 1, 0)</code> = <strong>1</strong></li><li><strong>Digit sum</strong> = <code>mod(code,10) + mod(floor(code ÷ 10),10) + mod(floor(code ÷ 100),10) + mod(floor(code ÷ 1000),10) + mod(floor(code ÷ 10000),10) + mod(floor(code ÷ 100000),10) + mod(floor(code ÷ 1000000),10) + floor(code ÷ 10000000)</code> = <strong>8</strong></li></ul><p>A numeric result cannot display a leading zero, so dates early in a year may appear shorter than eight characters when copied from the result box. The arithmetic still uses the fixed YYYYMMDD positions. If you are checking a different convention, such as DDMMYYYY, the palindrome status may change; this page does not claim a format-independent property. The digit sum is a separate checksum-like curiosity, not a date validity test. The date input itself is validated by the calendar control before the code is built.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(18 294) × 10000 + (getMonth(18 294) + 1) × 100 + getDate(18 294)</code>, which comes to <strong>2.02 × 10<sup>7</sup></strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>2 February 2020 becomes 20200202 and reverses to the same number, so it is a palindrome under this format. 23 October 2026 becomes 20261023, which reverses to 32016202; the digits sum to 16.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Date as YYYYMMDD</th><th>Digits reversed</th><th>Palindrome? (1 yes, 0 no)</th><th>Digit sum</th></tr></thead><tbody><tr><td><strong>Date</strong> +1 day</td><td>+4.95 × 10<sup>-6</sup> %</td><td>+49.5 %</td><td>−100 %</td><td>+12.5 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date</strong> opens at 2 February 2020</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            A numeric result cannot display a leading zero, so dates early in a year may appear shorter than eight characters when copied from the result box. The arithmetic still uses the fixed YYYYMMDD positions. If you are checking a different convention, such as DDMMYYYY, the palindrome status may change; this page does not claim a format-independent property. The digit sum is a separate checksum-like curiosity, not a date validity test. The date input itself is validated by the calendar control before the code is built.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Date as yyyymmdd and digits reversed and palindrome? and digit sum should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/date">Date calculator</a> <a href="/everyday-life/day-of-the-year">Day of the year</a> <a href="/everyday-life/calendar">Calendar calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date</strong> +10 days</td><td>2.02 × 10<sup>7</sup></td><td>2.02 × 10<sup>7</sup></td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Palindrome Date calculator work out?', 'a' => <<<'TXT'
            It returns date as YYYYMMDD and digits reversed and palindrome? and digit sum from date. The relationship is getYear(Date) × 10000 + (getMonth(Date) + 1) × 100 + getDate(Date).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date. Everything else is computed.'],
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
            ['q' => 'What date format does it use?', 'a' => 'The digits are ordered year, month, day: YYYYMMDD.'],
            ['q' => 'Can a date be a palindrome in another format only?', 'a' => 'Yes. Reordering year, month and day can change the result.'],
            ['q' => 'Why can the code appear shorter?', 'a' => 'A numeric field drops leading zeroes when displayed; the calculation still reserves the date positions.'],
            ['q' => 'Does the digit sum validate a date?', 'a' => 'No. It is only the sum of the eight digits.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date', 'name' => 'Date calculator'],
            ['path' => '/everyday-life/day-of-the-year', 'name' => 'Day of the year'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
