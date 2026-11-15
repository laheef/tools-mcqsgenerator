<?php

/**
 * GWAM Calculator
 * /everyday-life/gwam
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GWAM Calculator',
    'meta' => ['title' => 'GWAM — Gross and Net Words per Minute — Free Tool', 'description' => 'Calculate gross and net words per minute after errors, plus typing accuracy from a timed test. Enter sample length in minutes and use the test\'s scoring rule.', 'h1' => 'GWAM Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'words',
                    'label' => 'Words typed',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '210',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'errors',
                    'label' => 'Errors',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Test duration',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gross',
                    'label' => 'Gross words per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'GWAM',
                ],
                [
                    'name' => 'net',
                    'label' => 'Net words per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'NWPM',
                ],
                [
                    'name' => 'accuracy',
                    'label' => 'Accuracy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'words_per_hour',
                    'label' => 'Gross words per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'words/h',
                ],
            ],
        ],
    ],
    'formula' => ['gross' => 'words / minutes', 'net' => '(words - errors) / minutes', 'accuracy' => '(words - errors) / words * 100', 'words_per_hour' => 'words / minutes * 60'],
    'article' => [
        'intro' => 'Gross words per minute counts every word typed. Net speed subtracts mistakes first, so a test can show both pace and accuracy rather than pace alone.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A typing test often reports gross words per minute, or GWAM. That number can flatter a fast but error-prone run. Net speed shows what remains after mistakes are removed, while accuracy says how much of the sample was correct.<p>The answer is <strong>gross words per minute and net words per minute and accuracy and gross words per hour</strong>, worked out from words typed and errors and test duration. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gross</strong></td><td><code>Words typed ÷ Test duration</code></td></tr><tr><td><strong>net</strong></td><td><code>(Words typed - Errors) ÷ Test duration</code></td></tr><tr><td><strong>accuracy</strong></td><td><code>(Words typed - Errors) ÷ Words typed × 100</code></td></tr><tr><td><strong>words_per_hour</strong></td><td><code>Words typed ÷ Test duration × 60</code></td></tr></tbody></table><p>Gross rate is words divided by minutes. Net rate subtracts errors before that division; accuracy is correct words divided by the total entered words.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports gross words per minute and net words per minute and accuracy and gross words per hour.</p><ul><li><strong>Words typed</strong> — words.</li><li><strong>Errors</strong> — words.</li><li><strong>Test duration</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Gross words per minute</strong> — GWAM.</li><li><strong>Net words per minute</strong> — NWPM.</li><li><strong>Accuracy</strong> — %.</li><li><strong>Gross words per hour</strong> — words/h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put words typed = 210 words, errors = 5 words, test duration = 3 min into the form and the panel reads:</p><ul><li><strong>Gross words per minute</strong> = <code>Words typed ÷ Test duration</code> = <strong>70 GWAM</strong></li><li><strong>Net words per minute</strong> = <code>(Words typed - Errors) ÷ Test duration</code> = <strong>68.333 NWPM</strong></li><li><strong>Accuracy</strong> = <code>(Words typed - Errors) ÷ Words typed × 100</code> = <strong>97.619 %</strong></li><li><strong>Gross words per hour</strong> = <code>Words typed ÷ Test duration × 60</code> = <strong>4 200 words/h</strong></li></ul><p>Typing tests do not all define a word or an error the same way. Some count a fixed character group as a word, and some penalize errors differently. Follow the test's own method when comparing a result with a published benchmark. This calculator treats the error count as incorrect words and assumes it does not exceed the total. It measures a single sample, not sustained speed, comprehension or workplace productivity. A zero-minute test cannot produce a rate. For repeat practice, use the same passage length and correction rules each time.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>210 ÷ 3</code>, which comes to <strong>70 GWAM</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>210 words in three minutes gives 70 gross words per minute. Five errors reduce the net rate to 68.3333, and 205 correct words out of 210 produce 97.619 percent accuracy.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Gross words per minute</th><th>Net words per minute</th><th>Accuracy</th><th>Gross words per hour</th></tr></thead><tbody><tr><td><strong>Words typed</strong> +10 %</td><td>+10 %</td><td>+10.24 %</td><td>+0.22 %</td><td>+10 %</td></tr><tr><td><strong>Errors</strong> +10 %</td><td>+0 %</td><td>−0.24 %</td><td>−0.24 %</td><td>+0 %</td></tr><tr><td><strong>Test duration</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Words typed</strong>. <strong>Errors</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Words typed</strong> opens at 210 words</li><li><strong>Errors</strong> opens at 5 words</li><li><strong>Test duration</strong> opens at 3 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Words typed</th><th>Gross words per minute</th><th>Net words per minute</th><th>Accuracy</th><th>Gross words per hour</th></tr></thead><tbody><tr><td>105 words</td><td>35</td><td>33.333</td><td>95.238</td><td>2 100</td></tr><tr><td>210 words</td><td>70</td><td>68.333</td><td>97.619</td><td>4 200</td></tr><tr><td>420 words</td><td>140</td><td>138.333</td><td>98.81</td><td>8 400</td></tr><tr><td>1 050 words</td><td>350</td><td>348.333</td><td>99.524</td><td>21 000</td></tr><tr><td>2 100 words</td><td>700</td><td>698.333</td><td>99.762</td><td>42 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
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
            Typing tests do not all define a word or an error the same way. Some count a fixed character group as a word, and some penalize errors differently. Follow the test's own method when comparing a result with a published benchmark. This calculator treats the error count as incorrect words and assumes it does not exceed the total. It measures a single sample, not sustained speed, comprehension or workplace productivity. A zero-minute test cannot produce a rate. For repeat practice, use the same passage length and correction rules each time.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need words typed and errors and test duration. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Gross words per minute and net words per minute and accuracy and gross words per hour should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/words-per-minute">Words per minute</a> <a href="/everyday-life/keystrokes-per-hour">Keystrokes per hour</a> <a href="/everyday-life/reading-time">Reading time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Words typed</strong> ×10</td><td>70</td><td>700</td><td>ten times larger</td></tr><tr><td><strong>Errors</strong> ×10</td><td>70</td><td>70</td><td>unchanged</td></tr><tr><td><strong>Test duration</strong> ×10</td><td>70</td><td>7</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GWAM calculator work out?', 'a' => <<<'TXT'
            It returns gross words per minute and net words per minute and accuracy and gross words per hour from words typed and errors and test duration. The relationship is Words typed ÷ Test duration.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Words typed (words), Errors (words), Test duration (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: words typed in words; errors in words; test duration in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What does GWAM stand for?', 'a' => 'Gross words per minute: the total typed words divided by test minutes.'],
            ['q' => 'How is net speed different?', 'a' => 'It removes the entered errors before calculating words per minute.'],
            ['q' => 'Are typing-test words standardized?', 'a' => 'No. Tests may use different word-length and error rules.'],
            ['q' => 'Does this measure accuracy independently?', 'a' => 'It reports correct words as a percentage of the entered total.'],
        ],
        'related' => [
            ['path' => '/everyday-life/words-per-minute', 'name' => 'Words per minute'],
            ['path' => '/everyday-life/keystrokes-per-hour', 'name' => 'Keystrokes per hour'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
