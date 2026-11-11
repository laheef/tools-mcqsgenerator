<?php

/**
 * Adding Hours Calculator
 * /everyday-life/adding-hours
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Adding Hours Calculator',
    'meta' => ['title' => 'Adding Hours to a Clock Time — End Time Calculator', 'description' => 'Add a number of hours, whole or fractional, to a clock time and see the time it lands on, the minutes added and whether it crossed midnight, all on one page..', 'h1' => 'Adding Hours Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'Start time', 'type' => 'time', 'default' => '09:00'],
                [
                    'name' => 'hours',
                    'label' => 'Hours to add',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3.5',
                    'help' => 'Half hours are fine: 3.5 is three and a half hours.',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'result', 'label' => 'Time after adding', 'type' => 'time'],
                [
                    'name' => 'day_shift',
                    'label' => 'Days past midnight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'minutes_later',
                    'label' => 'Minutes later',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['result' => 'mod(start + hours * 3600000, 86400000)', 'day_shift' => 'floor((start + hours * 3600000) / 86400000)', 'minutes_later' => 'hours * 60'],
    'article' => [
        'intro' => <<<'TXT'
        A clock time plus hours, including half hours. The answer is the clock reading, not a duration, so a shift that ends after midnight shows a morning time and one day past.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Hours are the easy unit until they are not. Three hours after nine in the morning is noon and nobody needs a page for that. Half past ten at night plus four is where people reach for one, because the answer is a morning time and the date has moved on underneath it.</p><p>The page accepts a fractional hour, so three and a half goes in as 3.5 and lands half an hour into the fourth hour without a second box to fill.</p><p>The answer is <strong>time after adding and days past midnight and minutes later</strong>, worked out from start time and hours to add. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>result</strong></td><td><code>mod(Start time + Hours to add × 3600000, 86400000)</code></td></tr><tr><td><strong>day_shift</strong></td><td><code>floor((Start time + Hours to add × 3600000) ÷ 86400000)</code></td></tr><tr><td><strong>minutes_later</strong></td><td><code>Hours to add × 60</code></td></tr></tbody></table><p>The hours box is multiplied by 3 600 000 to reach milliseconds, added to the start time and taken modulo one day. The fractional part of the hours box survives that multiplication, which is why 3.5 is exact and not rounded to three.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports time after adding and days past midnight and minutes later.</p><ul><li><strong>Start time</strong>.</li><li><strong>Hours to add</strong> — h. Half hours are fine: 3.5 is three and a half hours.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time after adding</strong>.</li><li><strong>Days past midnight</strong> — days.</li><li><strong>Minutes later</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put start time = 09:00, hours to add = 3.5 h into the form and the panel reads:</p><ul><li><strong>Time after adding</strong> = <code>mod(Start time + Hours to add × 3600000, 86400000)</code> = <strong>12:30</strong></li><li><strong>Days past midnight</strong> = <code>floor((Start time + Hours to add × 3600000) ÷ 86400000)</code> = <strong>0 days</strong></li><li><strong>Minutes later</strong> = <code>Hours to add × 60</code> = <strong>210 min</strong></li></ul><p>A night shift ending after midnight is the case this page exists for. Write the end time as the clock shows it and read the day count separately.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Nine in the morning plus three and a half hours is 12:30, with no day crossed and 210 minutes added. Ten at night plus four hours is 02:00 the next morning and one day past midnight.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time after adding</th><th>Days past midnight</th><th>Minutes later</th></tr></thead><tbody><tr><td><strong>Start time</strong> +1 hour</td><td>+0 d</td><td>—</td><td>+0 %</td></tr><tr><td><strong>Hours to add</strong> +10 %</td><td>+0 d</td><td>—</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hours to add</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Start time</strong> opens at 09:00</li><li><strong>Hours to add</strong> opens at 3.5 h — Half hours are fine: 3.5 is three and a half hours.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set start time = 22:00, hours to add = 4: <strong>Time after adding</strong> = 02:00, <strong>Days past midnight</strong> = 1 days, <strong>Minutes later</strong> = 240 min. Ten at night plus four hours lands at 02:00, one day past midnight: the clock reading alone would look like an earlier time.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading 02:00 as an earlier time.</strong> It is the next morning, which is what the days-past-midnight line is telling you.</li><li><strong>Typing 3:30 for three and a half hours.</strong> The box wants a decimal; 3:30 would be read as three and three tenths.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Hours, not hours and minutes.</strong> For a spell written as 7 h 50 min, the hours-and-minutes page takes both boxes.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need start time and hours to add. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time after adding and days past midnight and minutes later should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>A shift that finishes after midnight.</li></li><li><li>A flight time written as a duration.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/adding-hours-and-minutes">Adding hours and minutes</a> <a href="/everyday-life/add-minutes">Add minutes</a> <a href="/everyday-life/subtract-time">Subtract time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start time</strong> +10 hours</td><td>12:30</td><td>22:30</td><td>+0 d</td></tr><tr><td><strong>Hours to add</strong> ×10</td><td>12:30</td><td>20:00</td><td>+0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Adding Hours calculator work out?', 'a' => <<<'TXT'
            It returns time after adding and days past midnight and minutes later from start time and hours to add. The relationship is mod(Start time + Hours to add × 3600000, 86400000).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Start time, Hours to add (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hours to add in h. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Can the hours box take half an hour?', 'a' => 'Yes. 0.5 is thirty minutes and 3.5 is three and a half hours. The box reads a decimal, so write a half as 0.5 rather than as 30.'],
            ['q' => 'What if the answer should be on the previous day?', 'a' => 'Add a negative number of hours. The wrap then goes back through midnight and the day line reads −1.'],
            ['q' => 'Does the page account for daylight saving?', 'a' => 'No. It adds to a clock reading, not to a moment in a time zone, so an hour that a clock skips or repeats is a normal hour here.'],
        ],
        'related' => [
            ['path' => '/everyday-life/adding-hours-and-minutes', 'name' => 'Adding hours and minutes'],
            ['path' => '/everyday-life/add-minutes', 'name' => 'Add minutes'],
            ['path' => '/everyday-life/subtract-time', 'name' => 'Subtract time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
