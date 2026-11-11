<?php

/**
 * Countdown Calculator
 * /everyday-life/countdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Countdown Calculator',
    'meta' => ['title' => 'Countdown Calculator — Days, Hours and Minutes to Go', 'description' => 'A countdown from any date to the one you are waiting for, in days, in hours and in minutes, so the same event can be quoted at three levels of patience.', 'h1' => 'Countdown Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'today', 'label' => 'Counting from', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'target', 'label' => 'Counting to', 'type' => 'date', 'default' => '2026-12-25'],
                [
                    'name' => 'days',
                    'label' => 'Days to go',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours to go',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes to go',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'target - today', 'hours' => '(target - today) * 24', 'minutes' => '(target - today) * 1440'],
    'article' => [
        'intro' => 'The distance to a date in three units. A year reads as 365 days, 8 760 hours, 525 600 minutes, which is the sort of number that makes a countdown feel real.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Every countdown is the same subtraction read at a different scale. The days line is what a calendar shows; the hours line is what a shift worker counts; the minutes line is what makes a long wait look long.</p><p>Because all three come from one subtraction, they cannot disagree. That is worth saying out loud, because the versions that do disagree are the ones built by adding three separate counters and letting them drift.</p><p>The answer is <strong>days to go and hours to go and minutes to go</strong>, worked out from counting from and counting to. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Counting to - Counting from</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Counting to - Counting from) × 24</code></td></tr><tr><td><strong>minutes</strong></td><td><code>(Counting to - Counting from) × 1440</code></td></tr></tbody></table><p>One subtraction of day numbers gives the day count; multiplying by twenty-four and by 1 440 gives the same span in hours and minutes. Nothing is rounded anywhere, so the three lines are exact multiples of each other.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days to go and hours to go and minutes to go.</p><ul><li><strong>Counting from</strong>.</li><li><strong>Counting to</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days to go</strong> — days.</li><li><strong>Hours to go</strong> — h.</li><li><strong>Minutes to go</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put counting from = 23 October 2026, counting to = 25 December 2026 into the form and the panel reads:</p><ul><li><strong>Days to go</strong> = <code>Counting to - Counting from</code> = <strong>63 days</strong></li><li><strong>Hours to go</strong> = <code>(Counting to - Counting from) × 24</code> = <strong>1 512 h</strong></li><li><strong>Minutes to go</strong> = <code>(Counting to - Counting from) × 1440</code> = <strong>90 720 min</strong></li></ul><p>The minutes line is the one to quote when the wait feels longer than the day count suggests.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 812 - 20 749</code>, which comes to <strong>63 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>23 October to 25 December 2026 is 63 days, which is 1 512 hours or 90 720 minutes. Divide the minutes by 60 and you are back at hours; divide the hours by 24 and you are back at days.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days to go</th><th>Hours to go</th><th>Minutes to go</th></tr></thead><tbody><tr><td><strong>Counting from</strong> +1 day</td><td>−1.59 %</td><td>−1.59 %</td><td>−1.59 %</td></tr><tr><td><strong>Counting to</strong> +1 day</td><td>+1.59 %</td><td>+1.59 %</td><td>+1.59 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Counting from</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Counting from</strong> opens at 23 October 2026</li><li><strong>Counting to</strong> opens at 25 December 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set counting from = 1 January 2026, counting to = 31 December 2026: <strong>Days to go</strong> = 364 days, <strong>Hours to go</strong> = 8 736 h, <strong>Minutes to go</strong> = 524 160 min. A year in a non-leap year reads 364 days from the first to the thirty-first, which is one short of the year people expect.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adding hours as if a day had twenty-four usable hours.</strong> The countdown measures the calendar, not the waking day.</li><li><strong>Forgetting the time of day.</strong> A target dated only runs from midnight to midnight, so an event at nine in the evening has a day less by breakfast time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Dates, not moments.</strong> For an answer to the hour, the time-between-dates page takes a clock time as well.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need counting from and counting to. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days to go and hours to go and minutes to go should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>A countdown to a holiday or a launch.</li></li><li><li>Showing how many working hours remain before a deadline.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-until">Days until</a> <a href="/everyday-life/day-counter">Day counter</a> <a href="/everyday-life/days-between-dates">Days between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Counting from</strong> +10 days</td><td>63</td><td>53</td><td>×0.841</td></tr><tr><td><strong>Counting to</strong> +10 days</td><td>63</td><td>73</td><td>×1.159</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Countdown calculator work out?', 'a' => 'It returns days to go and hours to go and minutes to go from counting from and counting to. The relationship is Counting to - Counting from.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Counting from, Counting to. Everything else is computed.'],
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
            ['q' => 'Why is a year 364 days here?', 'a' => 'Because the count runs from one date to the other, and the day you start on is not part of the distance. Add one if your convention counts the first day.'],
            ['q' => 'Do the three lines ever disagree?', 'a' => 'They cannot. All three are the same subtraction multiplied out, not three separate counters.'],
            ['q' => 'Can the countdown go backwards?', 'a' => 'Yes. A past target gives negative days, and the hours and minutes follow it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-until', 'name' => 'Days until'],
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
