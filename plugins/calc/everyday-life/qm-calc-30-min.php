<?php

/**
 * 30 Minute Blocks Calculator
 * /everyday-life/30-min
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '30 Minute Blocks Calculator',
    'meta' => ['title' => '30 Minute Blocks — How Many Fit in a Day and a Year', 'description' => 'Time in half-hour chunks: how many blocks a working day holds, how many a week, and what the same habit is worth over a year of them. The formula is shown.', 'h1' => '30 Minute Blocks Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours_day',
                    'label' => 'Hours a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'block_min',
                    'label' => 'Block length',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days_week',
                    'label' => 'Days a week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'blocks_day',
                    'label' => 'Blocks a day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'blocks',
                ],
                [
                    'name' => 'blocks_week',
                    'label' => 'Blocks a week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'blocks',
                ],
                [
                    'name' => 'hours_year',
                    'label' => 'Hours a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'days_year',
                    'label' => 'Whole days a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['blocks_day' => 'hours_day * 60 / block_min', 'blocks_week' => 'hours_day * 60 / block_min * days_week', 'hours_year' => 'hours_day * days_week * 52', 'days_year' => 'hours_day * days_week * 52 / 24'],
    'article' => [
        'intro' => 'The number of thirty-minute blocks in a day, a week and a year of a given schedule, which is how a plan in half hours is actually costed.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Half hours are how people plan and corners are how they live. Six hours a day is twelve blocks of thirty minutes, sixty blocks in a five-day week and 1 560 hours in a year — sixty-five whole days.</p><p>The block count is the useful part of this: a plan that says "two hours of study" is four blocks, and four blocks is a thing you can see in a calendar rather than a thing you hope for after dinner.</p><p>The answer is <strong>blocks a day and blocks a week and hours a year and whole days a year</strong>, worked out from hours a day and block length and days a week. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>blocks_day</strong></td><td><code>Hours a day × 60 ÷ Block length</code></td></tr><tr><td><strong>blocks_week</strong></td><td><code>Hours a day × 60 ÷ Block length × Days a week</code></td></tr><tr><td><strong>hours_year</strong></td><td><code>Hours a day × Days a week × 52</code></td></tr><tr><td><strong>days_year</strong></td><td><code>Hours a day × Days a week × 52 ÷ 24</code></td></tr></tbody></table><p>Hours times sixty over the block length gives blocks; the year is hours a day times days a week times 52, and the day count divides the year by 24.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports blocks a day and blocks a week and hours a year and whole days a year.</p><ul><li><strong>Hours a day</strong> — h.</li><li><strong>Block length</strong> — min.</li><li><strong>Days a week</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Blocks a day</strong> — blocks.</li><li><strong>Blocks a week</strong> — blocks.</li><li><strong>Hours a year</strong> — h.</li><li><strong>Whole days a year</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hours a day = 6 h, block length = 30 min, days a week = 5 days into the form and the panel reads:</p><ul><li><strong>Blocks a day</strong> = <code>Hours a day × 60 ÷ Block length</code> = <strong>12 blocks</strong></li><li><strong>Blocks a week</strong> = <code>Hours a day × 60 ÷ Block length × Days a week</code> = <strong>60 blocks</strong></li><li><strong>Hours a year</strong> = <code>Hours a day × Days a week × 52</code> = <strong>1 560 h</strong></li><li><strong>Whole days a year</strong> = <code>Hours a day × Days a week × 52 ÷ 24</code> = <strong>65 days</strong></li></ul><p>Drop to four hours a day and the year is 1 040 hours — still forty-three days, which is most of a working month of attention spent on one thing.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>6 × 60 ÷ 30</code>, which comes to <strong>12 blocks</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Six hours a day in half-hour blocks is twelve blocks a day, sixty a week, 1 560 hours a year and sixty-five whole days.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Blocks a day</th><th>Blocks a week</th><th>Hours a year</th><th>Whole days a year</th></tr></thead><tbody><tr><td><strong>Hours a day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Block length</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Days a week</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hours a day</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hours a day</strong> opens at 6 h</li><li><strong>Block length</strong> opens at 30 min</li><li><strong>Days a week</strong> opens at 5 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hours a day</th><th>Blocks a day</th><th>Blocks a week</th><th>Hours a year</th><th>Whole days a year</th></tr></thead><tbody><tr><td>3 h</td><td>6</td><td>30</td><td>780</td><td>32.5</td></tr><tr><td>6 h</td><td>12</td><td>60</td><td>1 560</td><td>65</td></tr><tr><td>12 h</td><td>24</td><td>120</td><td>3 120</td><td>130</td></tr><tr><td>30 h</td><td>60</td><td>300</td><td>7 800</td><td>325</td></tr><tr><td>60 h</td><td>120</td><td>600</td><td>15 600</td><td>650</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hours a day = 4, block length = 30, days a week = 5: <strong>Blocks a day</strong> = 8 blocks, <strong>Blocks a week</strong> = 40 blocks, <strong>Hours a year</strong> = 1 040 h, <strong>Whole days a year</strong> = 43.333 days. Four hours a day is eight blocks, forty a week and 1 040 hours a year — forty-three days rather than sixty-five.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Planning in hours and living in blocks.</strong> A two-hour task does not fit a gap of an hour and forty minutes, and four blocks that do fit are worth more than a perfect two-hour plan that never starts.</li><li><strong>Counting a whole year of a new habit.</strong> Fifty-two weeks assumes no holidays, no illness and no forgotten Sundays. Multiply by 48 for a realistic figure.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Fixed blocks.</strong> Some work does not divide into half hours — a meeting that overruns takes the block after it. This page counts capacity, not adherence.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hours a day and block length and days a week. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Blocks a day and blocks a week and hours a year and whole days a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Turning a study plan into blocks you can put in a calendar.</li></li><li><li>Checking whether a weekly commitment fits the time you actually have.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/every-second">Every second</a> <a href="/everyday-life/tv-alternatives">TV alternatives</a> <a href="/everyday-life/podcasts">Podcast time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hours a day</strong> ×10</td><td>12</td><td>120</td><td>ten times larger</td></tr><tr><td><strong>Block length</strong> ×10</td><td>12</td><td>1.2</td><td>ten times smaller</td></tr><tr><td><strong>Days a week</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 30 Minute Blocks calculator work out?', 'a' => <<<'TXT'
            It returns blocks a day and blocks a week and hours a year and whole days a year from hours a day and block length and days a week. The relationship is Hours a day × 60 ÷ Block length.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Hours a day (h), Block length (min), Days a week (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hours a day in h; block length in min; days a week in days. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why thirty minutes rather than an hour?', 'a' => <<<'TXT'
            Because half an hour is short enough to start on a bad day and long enough to finish something. An hour is the unit of optimism; half an hour is the unit of habit.
            TXT],
            ['q' => 'How many blocks are in a working week?', 'a' => 'A forty-hour week is eighty blocks of thirty minutes. Most calendars hold fewer because meetings and travel do not respect the grid.'],
            ['q' => 'Does the year figure include weekends?', 'a' => 'Only if the days-a-week field says seven. At five days the answer is a working-year figure, which is the honest one for anything tied to a schedule.'],
        ],
        'related' => [
            ['path' => '/everyday-life/every-second', 'name' => 'Every second'],
            ['path' => '/everyday-life/tv-alternatives', 'name' => 'TV alternatives'],
            ['path' => '/everyday-life/podcasts', 'name' => 'Podcast time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
