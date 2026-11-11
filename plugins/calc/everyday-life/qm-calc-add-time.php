<?php

/**
 * Add Time Calculator
 * /everyday-life/add-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Add Time Calculator',
    'meta' => ['title' => 'Add Time Calculator — Add Hours, Minutes and Seconds', 'description' => 'Add two stretches of time given in hours, minutes and seconds and read the total in hours, in minutes and in seconds, without converting anything by hand..', 'h1' => 'Add Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'h1',
                    'label' => 'Hours in the first spell',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm1',
                    'label' => 'Minutes in the first spell',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 's1',
                    'label' => 'Seconds in the first spell',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h2',
                    'label' => 'Hours in the second spell',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm2',
                    'label' => 'Minutes in the second spell',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 's2',
                    'label' => 'Seconds in the second spell',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Total hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'total_minutes',
                    'label' => 'Total minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'total_seconds',
                    'label' => 'Total seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
            ],
        ],
    ],
    'formula' => ['total_seconds' => 'h1 * 3600 + m1 * 60 + s1 + h2 * 3600 + m2 * 60 + s2', 'total_minutes' => '(h1 * 3600 + m1 * 60 + s1 + h2 * 3600 + m2 * 60 + s2) / 60', 'total_hours' => '(h1 * 3600 + m1 * 60 + s1 + h2 * 3600 + m2 * 60 + s2) / 3600'],
    'article' => [
        'intro' => 'Two spells of time, added in seconds and read back in three units. A lunch break and an afternoon meeting in the same sum is the usual reason to reach for it.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Adding 2 h 45 min to 1 h 20 min is not 3 h 65 min, and that is exactly the answer a person gets when they add the columns the way they were taught and forget that the minutes column carries at sixty. Sixty is the awkward base. Your fingers count in tens and the clock does not.</p><p>This page does the carrying for you. Put the two spells in, each with its own hours, minutes and seconds, and read the same total three ways: hours with a decimal, whole minutes, whole seconds.</p><p>The answer is <strong>total hours and total minutes and total seconds</strong>, worked out from hours in the first spell and minutes in the first spell and seconds in the first spell and hours in the second spell and minutes in the second spell and seconds in the second spell. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_seconds</strong></td><td><code>Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell</code></td></tr><tr><td><strong>total_minutes</strong></td><td><code>(Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell) ÷ 60</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>(Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell) ÷ 3600</code></td></tr></tbody></table><p>Every box is turned into seconds first, because seconds are the one unit all three can be added in. The two division lines are that same total read back in minutes and hours, so they cannot disagree with the seconds figure above them.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports total hours and total minutes and total seconds.</p><ul><li><strong>Hours in the first spell</strong> — h.</li><li><strong>Minutes in the first spell</strong> — min.</li><li><strong>Seconds in the first spell</strong> — s.</li><li><strong>Hours in the second spell</strong> — h.</li><li><strong>Minutes in the second spell</strong> — min.</li><li><strong>Seconds in the second spell</strong> — s.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Total hours</strong> — h.</li><li><strong>Total minutes</strong> — min.</li><li><strong>Total seconds</strong> — s.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hours in the first spell = 2 h, minutes in the first spell = 45 min, seconds in the first spell = 30 s, hours in the second spell = 1 h, minutes in the second spell = 20 min, seconds in the second spell = 15 s into the form and the panel reads:</p><ul><li><strong>Total hours</strong> = <code>(Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell) ÷ 3600</code> = <strong>4.096 h</strong></li><li><strong>Total minutes</strong> = <code>(Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell) ÷ 60</code> = <strong>245.75 min</strong></li><li><strong>Total seconds</strong> = <code>Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell</code> = <strong>14 745 s</strong></li></ul><p>The seconds figure is the one to quote when the two spells are a stopwatch reading; the decimal hours figure is the one a timesheet takes.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>2 h 45 min 30 s added to 1 h 20 min 15 s is 4 h 05 min 45 s, which is 14 745 seconds, or 245.75 minutes, or 4.0958 hours. The minutes and hours columns carry at sixty, not at a hundred.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Total hours</th><th>Total minutes</th><th>Total seconds</th></tr></thead><tbody><tr><td><strong>Hours in the first spell</strong> +10 %</td><td>+4.88 %</td><td>+4.88 %</td><td>+4.88 %</td></tr><tr><td><strong>Minutes in the first spell</strong> +10 %</td><td>+1.83 %</td><td>+1.83 %</td><td>+1.83 %</td></tr><tr><td><strong>Seconds in the first spell</strong> +10 %</td><td>+0.02 %</td><td>+0.02 %</td><td>+0.02 %</td></tr><tr><td><strong>Hours in the second spell</strong> +10 %</td><td>+2.44 %</td><td>+2.44 %</td><td>+2.44 %</td></tr><tr><td><strong>Minutes in the second spell</strong> +10 %</td><td>+0.81 %</td><td>+0.81 %</td><td>+0.81 %</td></tr><tr><td><strong>Seconds in the second spell</strong> +10 %</td><td>+0.01 %</td><td>+0.01 %</td><td>+0.01 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hours in the first spell</strong>. <strong>Seconds in the second spell</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hours in the first spell</strong> opens at 2 h</li><li><strong>Minutes in the first spell</strong> opens at 45 min</li><li><strong>Seconds in the first spell</strong> opens at 30 s</li><li><strong>Hours in the second spell</strong> opens at 1 h</li><li><strong>Minutes in the second spell</strong> opens at 20 min</li><li><strong>Seconds in the second spell</strong> opens at 15 s</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hours in the first spell</th><th>Total hours</th><th>Total minutes</th><th>Total seconds</th></tr></thead><tbody><tr><td>1 h</td><td>3.096</td><td>185.75</td><td>11 145</td></tr><tr><td>2 h</td><td>4.096</td><td>245.75</td><td>14 745</td></tr><tr><td>4 h</td><td>6.096</td><td>365.75</td><td>21 945</td></tr><tr><td>10 h</td><td>12.096</td><td>725.75</td><td>43 545</td></tr><tr><td>20 h</td><td>22.096</td><td>1 325.75</td><td>79 545</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hours in the first spell = 0, minutes in the first spell = 40, seconds in the first spell = 0, hours in the second spell = 0, minutes in the second spell = 35, seconds in the second spell = 0: <strong>Total hours</strong> = 1.25 h, <strong>Total minutes</strong> = 75 min, <strong>Total seconds</strong> = 4 500 s. Forty minutes and thirty-five makes 75 minutes, which is 1.25 hours: the carry at sixty is the whole of the difference.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adding the minutes past sixty.</strong> 45 plus 20 is 65, and 65 minutes is an hour and five, not one minute of the next hour left over.</li><li><strong>Assuming a decimal hour is minutes.</strong> 4.09 hours is four hours and about five minutes, not four hours nine minutes.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Two spells only.</strong> A rota with six rows needs the time adder, which sums a whole column.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hours in the first spell and minutes in the first spell and seconds in the first spell and hours in the second spell and minutes in the second spell and seconds in the second spell. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Total hours and total minutes and total seconds should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Adding a morning and an afternoon session to one billable figure.</li></li><li><li>Checking a stopwatch against a hand-written log.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-adder">Time adder</a> <a href="/everyday-life/hours-to-decimal">Hours to decimal</a> <a href="/everyday-life/time-duration">Time duration</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hours in the first spell</strong> ×10</td><td>4.096</td><td>22.096</td><td>×5.395</td></tr><tr><td><strong>Minutes in the first spell</strong> ×10</td><td>4.096</td><td>10.846</td><td>×2.648</td></tr><tr><td><strong>Seconds in the first spell</strong> ×10</td><td>4.096</td><td>4.171</td><td>×1.018</td></tr><tr><td><strong>Hours in the second spell</strong> ×10</td><td>4.096</td><td>13.096</td><td>×3.197</td></tr><tr><td><strong>Minutes in the second spell</strong> ×10</td><td>4.096</td><td>7.096</td><td>×1.732</td></tr><tr><td><strong>Seconds in the second spell</strong> ×10</td><td>4.096</td><td>4.133</td><td>×1.009</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Add Time calculator work out?', 'a' => <<<'TXT'
            It returns total hours and total minutes and total seconds from hours in the first spell and minutes in the first spell and seconds in the first spell and hours in the second spell and minutes in the second spell and seconds in the second spell. The relationship is Hours in the first spell × 3600 + Minutes in the first spell × 60 + Seconds in the first spell + Hours in the second spell × 3600 + Minutes in the second spell × 60 + Seconds in the second spell.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Hours in the first spell (h), Minutes in the first spell (min), Seconds in the first spell (s), Hours in the second spell (h), Minutes in the second spell (min), Seconds in the second spell (s). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: hours in the first spell in h; minutes in the first spell in min; seconds in the first spell in s; hours in the second spell in h; minutes in the second spell in min; seconds in the second spell in s. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why not just add the hours and minutes separately?', 'a' => 'Because the minutes column overflows at sixty. Adding them separately gives 3 h 65 min, a figure that cannot be written on a clock.'],
            ['q' => 'What happens if a box is left blank?', 'a' => 'Nothing is guessed. The total stays blank until all six boxes hold a number, and a zero is a value you have to type rather than one the page assumes.'],
            ['q' => 'Can a spell be more than 24 hours?', 'a' => 'Yes. The hours box has no ceiling, so two long spells add up to a duration longer than a day, which is what a project log needs.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-adder', 'name' => 'Time adder'],
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
            ['path' => '/everyday-life/time-duration', 'name' => 'Time duration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
