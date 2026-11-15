<?php

/**
 * Keystrokes per Hour Calculator
 * /everyday-life/keystrokes-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Keystrokes per Hour Calculator',
    'meta' => ['title' => 'Keystrokes per Hour — Gross and Net Rate — Free Tool', 'description' => 'Calculate gross keystrokes per hour, net rate after errors, per-minute speed and accuracy from a timed sample. Use the same counting method for each test.', 'h1' => 'Keystrokes per Hour Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'keystrokes',
                    'label' => 'Keystrokes entered',
                    'type' => 'number',
                    'suffix' => 'keys',
                    'default' => '18000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'errors',
                    'label' => 'Incorrect keystrokes',
                    'type' => 'number',
                    'suffix' => 'keys',
                    'default' => '180',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Time spent',
                    'type' => 'number',
                    'suffix' => 'hours',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gross',
                    'label' => 'Gross keystrokes per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'keys/h',
                ],
                [
                    'name' => 'net',
                    'label' => 'Net keystrokes per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'keys/h',
                ],
                [
                    'name' => 'per_minute',
                    'label' => 'Gross keystrokes per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'keys/min',
                ],
                [
                    'name' => 'accuracy',
                    'label' => 'Keystroke accuracy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['gross' => 'keystrokes / hours', 'net' => '(keystrokes - errors) / hours', 'per_minute' => 'keystrokes / hours / 60', 'accuracy' => '(keystrokes - errors) / keystrokes * 100'],
    'article' => [
        'intro' => 'A timed typing sample can be expressed as a gross rate or adjusted for mistakes. Enter the count, errors and time to compare both readings.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A single speed number hides whether mistakes were counted. Gross rate divides every entered keystroke by time; net rate removes the errors first. Showing both makes two timed tests easier to compare, provided they count keys the same way.<p>The answer is <strong>gross keystrokes per hour and net keystrokes per hour and gross keystrokes per minute and keystroke accuracy</strong>, worked out from keystrokes entered and incorrect keystrokes and time spent. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gross</strong></td><td><code>Keystrokes entered ÷ Time spent</code></td></tr><tr><td><strong>net</strong></td><td><code>(Keystrokes entered - Incorrect keystrokes) ÷ Time spent</code></td></tr><tr><td><strong>per_minute</strong></td><td><code>Keystrokes entered ÷ Time spent ÷ 60</code></td></tr><tr><td><strong>accuracy</strong></td><td><code>(Keystrokes entered - Incorrect keystrokes) ÷ Keystrokes entered × 100</code></td></tr></tbody></table><p>Gross speed is total keystrokes divided by hours. Net speed subtracts errors before dividing; accuracy is correct keystrokes as a share of all keystrokes.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports gross keystrokes per hour and net keystrokes per hour and gross keystrokes per minute and keystroke accuracy.</p><ul><li><strong>Keystrokes entered</strong> — keys.</li><li><strong>Incorrect keystrokes</strong> — keys.</li><li><strong>Time spent</strong> — hours.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Gross keystrokes per hour</strong> — keys/h.</li><li><strong>Net keystrokes per hour</strong> — keys/h.</li><li><strong>Gross keystrokes per minute</strong> — keys/min.</li><li><strong>Keystroke accuracy</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put keystrokes entered = 18 000 keys, incorrect keystrokes = 180 keys, time spent = 3 hours into the form and the panel reads:</p><ul><li><strong>Gross keystrokes per hour</strong> = <code>Keystrokes entered ÷ Time spent</code> = <strong>6 000 keys/h</strong></li><li><strong>Net keystrokes per hour</strong> = <code>(Keystrokes entered - Incorrect keystrokes) ÷ Time spent</code> = <strong>5 940 keys/h</strong></li><li><strong>Gross keystrokes per minute</strong> = <code>Keystrokes entered ÷ Time spent ÷ 60</code> = <strong>100 keys/min</strong></li><li><strong>Keystroke accuracy</strong> = <code>(Keystrokes entered - Incorrect keystrokes) ÷ Keystrokes entered × 100</code> = <strong>99 %</strong></li></ul><p>Keystroke counting is not standardized across software. Some tests count backspaces and corrections, while others score only the final text. Use the same test and error rule if you are comparing practice sessions. A high rate with many errors may not mean useful output, and this calculator does not assess ergonomics, fatigue or accessibility. The time field must be greater than zero. If the session lasted minutes, convert that duration to a decimal hour before entering it: 30 minutes is 0.5 hour.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>18 000 ÷ 3</code>, which comes to <strong>6 000 keys/h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>18,000 keystrokes in three hours is 6,000 per hour, or 100 per minute. With 180 incorrect keys, the net rate is 5,940 per hour and accuracy is 99 percent.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Gross keystrokes per hour</th><th>Net keystrokes per hour</th><th>Gross keystrokes per minute</th><th>Keystroke accuracy</th></tr></thead><tbody><tr><td><strong>Keystrokes entered</strong> +10 %</td><td>+10 %</td><td>+10.1 %</td><td>+10 %</td><td>+0.09 %</td></tr><tr><td><strong>Incorrect keystrokes</strong> +10 %</td><td>+0 %</td><td>−0.1 %</td><td>+0 %</td><td>−0.1 %</td></tr><tr><td><strong>Time spent</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Keystrokes entered</strong>. <strong>Incorrect keystrokes</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Keystrokes entered</strong> opens at 18 000 keys</li><li><strong>Incorrect keystrokes</strong> opens at 180 keys</li><li><strong>Time spent</strong> opens at 3 hours</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Keystrokes entered</th><th>Gross keystrokes per hour</th><th>Net keystrokes per hour</th><th>Gross keystrokes per minute</th><th>Keystroke accuracy</th></tr></thead><tbody><tr><td>9 000 keys</td><td>3 000</td><td>2 940</td><td>50</td><td>98</td></tr><tr><td>18 000 keys</td><td>6 000</td><td>5 940</td><td>100</td><td>99</td></tr><tr><td>36 000 keys</td><td>12 000</td><td>11 940</td><td>200</td><td>99.5</td></tr><tr><td>90 000 keys</td><td>30 000</td><td>29 940</td><td>500</td><td>99.8</td></tr><tr><td>180 000 keys</td><td>60 000</td><td>59 940</td><td>1 000</td><td>99.9</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Changing the period without changing its unit.</strong> A weekly figure and a yearly figure are comparable only after the number of weeks in the year is stated.</li><li><strong>Treating an estimate as a live clock.</strong> The page calculates from the dates and rates entered; it does not watch the calendar or update a deadline in real time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Inputs define the result.</strong> The page does not fetch calendars, prices or personal records from another service.</li></li><li><li><strong>Local rules can differ.</strong> Holidays, leap years, time zones and contract definitions may change how a real deadline is counted.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The assumptions behind the estimate', 'html' => <<<'TXT'
            Keystroke counting is not standardized across software. Some tests count backspaces and corrections, while others score only the final text. Use the same test and error rule if you are comparing practice sessions. A high rate with many errors may not mean useful output, and this calculator does not assess ergonomics, fatigue or accessibility. The time field must be greater than zero. If the session lasted minutes, convert that duration to a decimal hour before entering it: 30 minutes is 0.5 hour.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need keystrokes entered and incorrect keystrokes and time spent. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Gross keystrokes per hour and net keystrokes per hour and gross keystrokes per minute and keystroke accuracy should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/gwam">Gross words per minute</a> <a href="/everyday-life/words-per-minute">Words per minute</a> <a href="/everyday-life/reading-time">Reading time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Keystrokes entered</strong> ×10</td><td>6 000</td><td>60 000</td><td>ten times larger</td></tr><tr><td><strong>Incorrect keystrokes</strong> ×10</td><td>6 000</td><td>6 000</td><td>unchanged</td></tr><tr><td><strong>Time spent</strong> ×10</td><td>6 000</td><td>600</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Keystrokes per Hour calculator work out?', 'a' => <<<'TXT'
            It returns gross keystrokes per hour and net keystrokes per hour and gross keystrokes per minute and keystroke accuracy from keystrokes entered and incorrect keystrokes and time spent. The relationship is Keystrokes entered ÷ Time spent.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Keystrokes entered (keys), Incorrect keystrokes (keys), Time spent (hours). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: keystrokes entered in keys; incorrect keystrokes in keys; time spent in hours. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How do I enter 30 minutes?', 'a' => 'Enter 0.5 in the hours field.'],
            ['q' => 'What is net keystrokes per hour?', 'a' => 'It subtracts the incorrect keystrokes before dividing by time.'],
            ['q' => 'Are corrections counted as errors?', 'a' => 'That depends on the typing test; use its stated scoring rule.'],
            ['q' => 'Does this measure words per minute?', 'a' => 'No. Keystrokes and words are different measures.'],
        ],
        'related' => [
            ['path' => '/everyday-life/gwam', 'name' => 'Gross words per minute'],
            ['path' => '/everyday-life/words-per-minute', 'name' => 'Words per minute'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
