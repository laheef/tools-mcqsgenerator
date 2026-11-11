<?php

/**
 * Days Until Calculator
 * /everyday-life/days-until
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days Until Calculator',
    'meta' => ['title' => 'Days Until a Date — Days, Weeks and the Weekday', 'description' => 'How many days until any date, with the weeks and days left over and the weekday it falls on, for holidays, deadlines and the date you keep counting to.', 'h1' => 'Days Until Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'today', 'label' => 'From', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'target', 'label' => 'Until', 'type' => 'date', 'default' => '2027-01-01'],
                [
                    'name' => 'days',
                    'label' => 'Days until',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks until',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday of the target (1 is Monday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'target - today', 'weeks' => '(target - today) / 7', 'weekday' => 'mod(target + 3, 7) + 1'],
    'article' => [
        'intro' => 'The distance from one date to a later one, in days and in weeks, with the weekday of the target. A negative answer means the date has already passed.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Counting to a date is the one calculation everybody does badly in their head. The mistake is not the subtraction, it is the month boundaries: three days at the end of January plus the whole of February is not a number anyone carries accurately.</p><p>The page takes two dates and returns the distance, the same distance in weeks, and the weekday of the target. The weekday matters more than it looks: a deadline that falls on a Sunday is usually moved by a day, and a holiday that falls on a Monday is a long weekend.</p><p>The answer is <strong>days until and weeks until and weekday of the target</strong>, worked out from from and until. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Until - From</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Until - From) ÷ 7</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(Until + 3, 7) + 1</code></td></tr></tbody></table><p>A date is a day number, so the distance is a subtraction and the weeks line is that subtraction divided by seven. The weekday comes from the day number modulo seven, offset so that Monday is one.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days until and weeks until and weekday of the target.</p><ul><li><strong>From</strong>.</li><li><strong>Until</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days until</strong> — days.</li><li><strong>Weeks until</strong> — weeks.</li><li><strong>Weekday of the target (1 is Monday)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put from = 23 October 2026, until = 1 January 2027 into the form and the panel reads:</p><ul><li><strong>Days until</strong> = <code>Until - From</code> = <strong>70 days</strong></li><li><strong>Weeks until</strong> = <code>(Until - From) ÷ 7</code> = <strong>10 weeks</strong></li><li><strong>Weekday of the target (1 is Monday)</strong> = <code>mod(Until + 3, 7) + 1</code> = <strong>5</strong></li></ul><p>Ten weeks exactly is a rare clean answer, which makes this pair a good first test of the page.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 819 - 20 749</code>, which comes to <strong>70 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>From 23 October 2026 to 1 January 2027 is 70 days, or 10 weeks exactly, and the first of January is a Friday.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days until</th><th>Weeks until</th><th>Weekday of the target (1 is Monday)</th></tr></thead><tbody><tr><td><strong>From</strong> +1 day</td><td>−1.43 %</td><td>−1.43 %</td><td>+0 %</td></tr><tr><td><strong>Until</strong> +1 day</td><td>+1.43 %</td><td>+1.43 %</td><td>+20 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Until</strong>. <strong>From</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>From</strong> opens at 23 October 2026</li><li><strong>Until</strong> opens at 1 January 2027</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set from = 20 December 2026, until = 25 December 2026: <strong>Days until</strong> = 5 days, <strong>Weeks until</strong> = 0.714 weeks, <strong>Weekday of the target (1 is Monday)</strong> = 5. Five days to Christmas from the twentieth, and the weekday line says which day of the week the holiday falls on.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting both dates.</strong> The distance is a subtraction, so the answer is the number of days between them and not one more.</li><li><strong>Reading a negative answer as an error.</strong> It is not: it means the target is behind you, and the size of the number is how far.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar days.</strong> Weekends count; the working-days page is the other count.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need from and until. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days until and weeks until and weekday of the target should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Counting down to a holiday or a deadline.</li></li><li><li>Checking how long is left before a renewal date.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/day-counter">Day counter</a> <a href="/everyday-life/countdown">Countdown</a> <a href="/everyday-life/days-between-dates">Days between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>From</strong> +10 days</td><td>70</td><td>60</td><td>×0.857</td></tr><tr><td><strong>Until</strong> +10 days</td><td>70</td><td>80</td><td>×1.143</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days Until calculator work out?', 'a' => 'It returns days until and weeks until and weekday of the target from from and until. The relationship is Until - From.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'From, Until. Everything else is computed.'],
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
            ['q' => 'Does it include the target date?', 'a' => 'No. The answer is how many days until it, so the target is the day after the last full day counted.'],
            ['q' => 'What if the date has passed?', 'a' => 'The answer is negative, which is the honest reading: minus twenty days means twenty days ago.'],
            ['q' => 'Can I use today\'s date?', 'a' => 'Set the From box to today. The page does not read the clock, so the answer is reproducible tomorrow.'],
        ],
        'related' => [
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
            ['path' => '/everyday-life/countdown', 'name' => 'Countdown'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
