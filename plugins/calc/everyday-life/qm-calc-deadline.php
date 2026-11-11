<?php

/**
 * Deadline Calculator
 * /everyday-life/deadline
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Deadline Calculator',
    'meta' => ['title' => 'Deadline — Hours a Day Needed to Finish in Time', 'description' => 'Twenty hours of work and five days left is four hours a day, and the page says whether the week you actually have contains those hours or comes up short.', 'h1' => 'Deadline Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'days_left',
                    'label' => 'Days left',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_work',
                    'label' => 'Work remaining',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_day',
                    'label' => 'Hours a day you have',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'needed',
                    'label' => 'Hours a day needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'available',
                    'label' => 'Hours available',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'slack',
                    'label' => 'Slack or shortfall',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'feasible',
                    'label' => 'Finishes in time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yes/no',
                ],
            ],
        ],
    ],
    'formula' => ['needed' => 'hours_work / days_left', 'available' => 'hours_day * days_left', 'slack' => 'hours_day * days_left - hours_work', 'feasible' => 'if_else(hours_day * days_left >= hours_work, 1, 0)'],
    'article' => [
        'intro' => 'The hours a day a piece of work needs to be finished by a date, how many hours the remaining days actually offer, and the shortfall or slack between them.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A deadline is a division. Twenty hours of work over five days is four hours a day, and if the week only contains three, the answer is that it does not fit — which is worth knowing on the Monday rather than the Thursday.</p><p>Twenty hours over five days is 4 a day, which is exactly the four hours available: feasible with nothing to spare. One lost evening and the slack is minus four, which is the state most deadlines are actually in.</p><p>The answer is <strong>hours a day needed and hours available and slack or shortfall and finishes in time</strong>, worked out from days left and work remaining and hours a day you have. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>needed</strong></td><td><code>Work remaining ÷ Days left</code></td></tr><tr><td><strong>available</strong></td><td><code>Hours a day you have × Days left</code></td></tr><tr><td><strong>slack</strong></td><td><code>Hours a day you have × Days left - Work remaining</code></td></tr><tr><td><strong>feasible</strong></td><td><code>if_else(Hours a day you have × Days left >= Work remaining, 1, 0)</code></td></tr></tbody></table><p>Work over days gives the daily requirement. The available hours are the daily hours times the days, and the slack is that less the work — negative when the plan does not fit.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports hours a day needed and hours available and slack or shortfall and finishes in time.</p><ul><li><strong>Days left</strong> — days.</li><li><strong>Work remaining</strong> — h.</li><li><strong>Hours a day you have</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours a day needed</strong> — h.</li><li><strong>Hours available</strong> — h.</li><li><strong>Slack or shortfall</strong> — h.</li><li><strong>Finishes in time</strong> — yes/no.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put days left = 5 days, work remaining = 20 h, hours a day you have = 4 h into the form and the panel reads:</p><ul><li><strong>Hours a day needed</strong> = <code>Work remaining ÷ Days left</code> = <strong>4 h</strong></li><li><strong>Hours available</strong> = <code>Hours a day you have × Days left</code> = <strong>20 h</strong></li><li><strong>Slack or shortfall</strong> = <code>Hours a day you have × Days left - Work remaining</code> = <strong>0 h</strong></li><li><strong>Finishes in time</strong> = <code>if_else(Hours a day you have × Days left >= Work remaining, 1, 0)</code> = <strong>1 yes/no</strong></li></ul><p>Four days of the same four hours is sixteen against twenty: four hours short, which is one evening and the reason a plan needs a fifth day rather than more effort.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 ÷ 5</code>, which comes to <strong>4 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Twenty hours over five days needs four a day. Five days at four hours is twenty available, so the slack is zero and the work finishes with nothing to spare.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours a day needed</th><th>Hours available</th><th>Slack or shortfall</th><th>Finishes in time</th></tr></thead><tbody><tr><td><strong>Days left</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>—</td><td>+0 %</td></tr><tr><td><strong>Work remaining</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>—</td><td>−100 %</td></tr><tr><td><strong>Hours a day you have</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>—</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Work remaining</strong>. <strong>Hours a day you have</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Days left</strong> opens at 5 days</li><li><strong>Work remaining</strong> opens at 20 h</li><li><strong>Hours a day you have</strong> opens at 4 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Days left</th><th>Hours a day needed</th><th>Hours available</th><th>Slack or shortfall</th><th>Finishes in time</th></tr></thead><tbody><tr><td>2.5 days</td><td>8</td><td>10</td><td>-10</td><td>0</td></tr><tr><td>5 days</td><td>4</td><td>20</td><td>0</td><td>1</td></tr><tr><td>10 days</td><td>2</td><td>40</td><td>20</td><td>1</td></tr><tr><td>25 days</td><td>0.8</td><td>100</td><td>80</td><td>1</td></tr><tr><td>50 days</td><td>0.4</td><td>200</td><td>180</td><td>1</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set days left = 4, work remaining = 20, hours a day you have = 4: <strong>Hours a day needed</strong> = 5 h, <strong>Hours available</strong> = 16 h, <strong>Slack or shortfall</strong> = -4 h, <strong>Finishes in time</strong> = 0 yes/no. Four days instead of five needs five hours a day and offers sixteen: a shortfall of four hours, which is one more evening.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting calendar days as working days.</strong> A weekend inside the window is two days that do not contain hours, and the requirement moves from four a day to six.</li><li><strong>Assuming the remaining work is fixed.</strong> Half of it might be waiting on someone else. The page assumes every hour is yours to spend.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Even distribution.</strong> Work is not spread evenly — some days are meetings — and the figure is an average over the window.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need days left and work remaining and hours a day you have. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours a day needed and hours available and slack or shortfall and finishes in time should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Saying no to a deadline before it is accepted.</li></li><li><li>Working out how much of a weekend a project costs.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/lead-time">Lead time</a> <a href="/everyday-life/cycle-time">Takt time</a> <a href="/everyday-life/30-min">30-minute blocks</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Days left</strong> ×10</td><td>4</td><td>0.4</td><td>ten times smaller</td></tr><tr><td><strong>Work remaining</strong> ×10</td><td>4</td><td>40</td><td>ten times larger</td></tr><tr><td><strong>Hours a day you have</strong> ×10</td><td>4</td><td>4</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Deadline calculator work out?', 'a' => <<<'TXT'
            It returns hours a day needed and hours available and slack or shortfall and finishes in time from days left and work remaining and hours a day you have. The relationship is Work remaining ÷ Days left.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Days left (days), Work remaining (h), Hours a day you have (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: days left in days; work remaining in h; hours a day you have in h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Should the last day be counted?', 'a' => 'Count the days that contain working hours. The day of the deadline usually only holds a morning.'],
            ['q' => 'Is it better to work more hours a day or ask for more days?', 'a' => 'More days, almost always. The daily requirement rises steeply as the window shrinks, and the quality of the last hours falls.'],
            ['q' => 'What if the work is not mine alone?', 'a' => 'Add the other people\'s hours to the total and their availability to the daily figure. The division is the same and the answer usually changes.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lead-time', 'name' => 'Lead time'],
            ['path' => '/everyday-life/cycle-time', 'name' => 'Takt time'],
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
