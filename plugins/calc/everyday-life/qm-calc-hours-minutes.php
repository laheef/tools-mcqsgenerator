<?php

/**
 * Hours and Minutes Calculator
 * /everyday-life/hours-minutes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hours and Minutes Calculator',
    'meta' => ['title' => 'Hours and Minutes — Adding Up Four Durations', 'description' => 'Four durations in hours and minutes add to a total in the same form, as decimal hours and as working days: 2:20 plus 1:50 plus 3:15 plus 0:35 is 8:00.', 'h1' => 'Hours and Minutes Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'h1',
                    'label' => 'First duration, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm1',
                    'label' => 'First duration, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h2',
                    'label' => 'Second duration, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm2',
                    'label' => 'Second duration, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h3',
                    'label' => 'Third duration, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm3',
                    'label' => 'Third duration, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h4',
                    'label' => 'Fourth duration, hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'm4',
                    'label' => 'Fourth duration, minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '35',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_min',
                    'label' => 'Total minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Total, hours and minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'decimal',
                    'label' => 'Total, decimal hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'work_days',
                    'label' => 'Working days at 8 h',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['total_min' => '(h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)', 'total_hours' => '((h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)) / 60', 'decimal' => '((h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)) / 60', 'work_days' => '((h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)) / 480'],
    'article' => [
        'intro' => 'The total of four durations, kept in hours and minutes, shown also as decimal hours and as working days.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Adding hours and minutes is not like adding decimal numbers, because sixty minutes is an hour and a hundred is not. Two hours twenty plus one hour fifty is four hours ten, not three hours seventy.</p><p>The safe method is to turn everything into minutes first, add, and divide once at the end. The four entries here come to 480 minutes, which is 8.00 hours and one working day exactly — the kind of round number a timesheet is supposed to produce and rarely does.</p><p>The answer is <strong>total minutes and total, hours and minutes and total, decimal hours and working days at 8 h</strong>, worked out from first duration, hours and first duration, minutes and second duration, hours and second duration, minutes and third duration, hours and third duration, minutes and fourth duration, hours and fourth duration, minutes. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_min</strong></td><td><code>(First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>((First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)) ÷ 60</code></td></tr><tr><td><strong>decimal</strong></td><td><code>((First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)) ÷ 60</code></td></tr><tr><td><strong>work_days</strong></td><td><code>((First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)) ÷ 480</code></td></tr></tbody></table><p>Each duration in minutes is its hours times sixty plus its minutes. The four are added, divided by sixty for decimal hours, and by 480 for days at eight hours.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill. It reports total minutes and total, hours and minutes and total, decimal hours and working days at 8 h.</p><ul><li><strong>First duration, hours</strong> — h.</li><li><strong>First duration, minutes</strong> — min.</li><li><strong>Second duration, hours</strong> — h.</li><li><strong>Second duration, minutes</strong> — min.</li><li><strong>Third duration, hours</strong> — h.</li><li><strong>Third duration, minutes</strong> — min.</li><li><strong>Fourth duration, hours</strong> — h.</li><li><strong>Fourth duration, minutes</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Total minutes</strong> — min.</li><li><strong>Total, hours and minutes</strong> — h.</li><li><strong>Total, decimal hours</strong> — h.</li><li><strong>Working days at 8 h</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put first duration, hours = 2 h, first duration, minutes = 20 min, second duration, hours = 1 h, second duration, minutes = 50 min, third duration, hours = 3 h, third duration, minutes = 15 min, fourth duration, hours = 0 h, fourth duration, minutes = 35 min into the form and the panel reads:</p><ul><li><strong>Total minutes</strong> = <code>(First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)</code> = <strong>480 min</strong></li><li><strong>Total, hours and minutes</strong> = <code>((First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)) ÷ 60</code> = <strong>8 h</strong></li><li><strong>Total, decimal hours</strong> = <code>((First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)) ÷ 60</code> = <strong>8 h</strong></li><li><strong>Working days at 8 h</strong> = <code>((First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes)) ÷ 480</code> = <strong>1 days</strong></li></ul><p>Drop the last entry and the total is 7.42 hours — 445 minutes — which is fifty minutes short of a day and twenty-three minutes short of a shift.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(2 × 60 + 20) + (1 × 60 + 50) + (3 × 60 + 15) + (0 × 60 + 35)</code>, which comes to <strong>480 min</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>2:20, 1:50, 3:15 and 0:35 come to 480 minutes, which is 8.00 decimal hours and exactly one eight-hour day.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Total minutes</th><th>Total, hours and minutes</th><th>Total, decimal hours</th><th>Working days at 8 h</th></tr></thead><tbody><tr><td><strong>First duration, hours</strong> +10 %</td><td>+2.5 %</td><td>+2.5 %</td><td>+2.5 %</td><td>+2.5 %</td></tr><tr><td><strong>First duration, minutes</strong> +10 %</td><td>+0.42 %</td><td>+0.42 %</td><td>+0.42 %</td><td>+0.42 %</td></tr><tr><td><strong>Second duration, hours</strong> +10 %</td><td>+1.25 %</td><td>+1.25 %</td><td>+1.25 %</td><td>+1.25 %</td></tr><tr><td><strong>Second duration, minutes</strong> +10 %</td><td>+1.04 %</td><td>+1.04 %</td><td>+1.04 %</td><td>+1.04 %</td></tr><tr><td><strong>Third duration, hours</strong> +10 %</td><td>+3.75 %</td><td>+3.75 %</td><td>+3.75 %</td><td>+3.75 %</td></tr><tr><td><strong>Third duration, minutes</strong> +10 %</td><td>+0.31 %</td><td>+0.31 %</td><td>+0.31 %</td><td>+0.31 %</td></tr><tr><td><strong>Fourth duration, hours</strong> +10 %</td><td>+1.25 %</td><td>+1.25 %</td><td>+1.25 %</td><td>+1.25 %</td></tr><tr><td><strong>Fourth duration, minutes</strong> +10 %</td><td>+0.73 %</td><td>+0.73 %</td><td>+0.73 %</td><td>+0.73 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Third duration, hours</strong>. <strong>Third duration, minutes</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>First duration, hours</strong> opens at 2 h</li><li><strong>First duration, minutes</strong> opens at 20 min</li><li><strong>Second duration, hours</strong> opens at 1 h</li><li><strong>Second duration, minutes</strong> opens at 50 min</li><li><strong>Third duration, hours</strong> opens at 3 h</li><li><strong>Third duration, minutes</strong> opens at 15 min</li><li><strong>Fourth duration, hours</strong> opens at 0 h</li><li><strong>Fourth duration, minutes</strong> opens at 35 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>First duration, hours</th><th>Total minutes</th><th>Total, hours and minutes</th><th>Total, decimal hours</th><th>Working days at 8 h</th></tr></thead><tbody><tr><td>1 h</td><td>420</td><td>7</td><td>7</td><td>0.875</td></tr><tr><td>2 h</td><td>480</td><td>8</td><td>8</td><td>1</td></tr><tr><td>4 h</td><td>600</td><td>10</td><td>10</td><td>1.25</td></tr><tr><td>10 h</td><td>960</td><td>16</td><td>16</td><td>2</td></tr><tr><td>20 h</td><td>1 560</td><td>26</td><td>26</td><td>3.25</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set first duration, hours = 2, first duration, minutes = 20, second duration, hours = 1, second duration, minutes = 50, third duration, hours = 3, third duration, minutes = 15, fourth duration, hours = 0, fourth duration, minutes = 0: <strong>Total minutes</strong> = 445 min, <strong>Total, hours and minutes</strong> = 7.417 h, <strong>Total, decimal hours</strong> = 7.417 h, <strong>Working days at 8 h</strong> = 0.927 days. Without the last entry the total is 7.42 hours — 445 minutes, which is fifty minutes short of an eight-hour day.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Carrying at a hundred.</strong> The usual mistake is writing the minutes as decimals and adding: 20 + 50 + 15 + 35 is 120 becomes 1.20, which is wrong by forty minutes.</li><li><strong>Adding hours and minutes separately and carrying late.</strong> It works, but a minute total over 120 is easy to mis-carry. Minutes first is safer.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Positive durations.</strong> Time subtracted needs the larger entry first; a negative duration is not handled by a straight sum.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need first duration, hours and first duration, minutes and second duration, hours and second duration, minutes and third duration, hours and third duration, minutes and fourth duration, hours and fourth duration, minutes. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Total minutes and total, hours and minutes and total, decimal hours and working days at 8 h should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Totalling a day of jobs for a timesheet or an invoice.</li></li><li><li>Adding up a week of training sessions.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-card">Time card</a> <a href="/everyday-life/time-to-decimal">Time to decimal</a> <a href="/everyday-life/8-hour-shift">Eight-hour shift</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>First duration, hours</strong> ×10</td><td>480</td><td>1 560</td><td>×3.25</td></tr><tr><td><strong>First duration, minutes</strong> ×10</td><td>480</td><td>660</td><td>×1.375</td></tr><tr><td><strong>Second duration, hours</strong> ×10</td><td>480</td><td>1 020</td><td>×2.125</td></tr><tr><td><strong>Second duration, minutes</strong> ×10</td><td>480</td><td>930</td><td>×1.938</td></tr><tr><td><strong>Third duration, hours</strong> ×10</td><td>480</td><td>2 100</td><td>×4.375</td></tr><tr><td><strong>Third duration, minutes</strong> ×10</td><td>480</td><td>615</td><td>×1.281</td></tr><tr><td><strong>Fourth duration, hours</strong> ×10</td><td>480</td><td>540</td><td>×1.125</td></tr><tr><td><strong>Fourth duration, minutes</strong> ×10</td><td>480</td><td>795</td><td>×1.656</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hours and Minutes calculator work out?', 'a' => <<<'TXT'
            It returns total minutes and total, hours and minutes and total, decimal hours and working days at 8 h from first duration, hours and first duration, minutes and second duration, hours and second duration, minutes and third duration, hours and third duration, minutes and fourth duration, hours and fourth duration, minutes. The relationship is (First duration, hours × 60 + First duration, minutes) + (Second duration, hours × 60 + Second duration, minutes) + (Third duration, hours × 60 + Third duration, minutes) + (Fourth duration, hours × 60 + Fourth duration, minutes).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            First duration, hours (h), First duration, minutes (min), Second duration, hours (h), Second duration, minutes (min), Third duration, hours (h), Third duration, minutes (min), Fourth duration, hours (h), Fourth duration, minutes (min). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: first duration, hours in h; first duration, minutes in min; second duration, hours in h; second duration, minutes in min; third duration, hours in h; third duration, minutes in min; fourth duration, hours in h; fourth duration, minutes in min. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why can\'t I just add the minutes?', 'a' => 'Because a minute total above sixty becomes an hour. Adding 20 and 50 gives 70, which is one hour ten and not 0.70.'],
            ['q' => 'How do I convert the total to decimals?', 'a' => 'Divide the total minutes by sixty. Forty-five minutes is 0.75, and 480 minutes is 8.'],
            ['q' => 'Does the page handle fractions of a minute?', 'a' => 'It takes whole minutes. For seconds, divide the seconds by sixty first and add the result to the minutes.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
            ['path' => '/everyday-life/time-to-decimal', 'name' => 'Time to decimal'],
            ['path' => '/everyday-life/8-hour-shift', 'name' => 'Eight-hour shift'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
