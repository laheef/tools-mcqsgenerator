<?php

/**
 * Podcast Time Calculator
 * /everyday-life/podcasts
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Podcast Time Calculator',
    'meta' => ['title' => 'Podcast Time — What a Week of Shows Costs a Year', 'description' => 'Five episodes a week at forty-five minutes is 195 hours a year, or eight whole days. The page turns a weekly listening habit into the number it really is.', 'h1' => 'Podcast Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'episodes',
                    'label' => 'Episodes a week',
                    'type' => 'number',
                    'suffix' => 'episodes',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Average episode',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_week',
                    'label' => 'Hours a week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'hours_month',
                    'label' => 'Hours a month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
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
    'formula' => ['hours_week' => 'episodes * minutes / 60', 'hours_month' => 'episodes * minutes / 60 * 30.4375 / 7', 'hours_year' => 'episodes * minutes / 60 * 52', 'days_year' => 'episodes * minutes / 60 * 52 / 24'],
    'article' => [
        'intro' => 'The hours a week of podcast episodes takes, what that becomes over a month and a year, and how many whole days of the year it adds up to.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Five shows a week at forty-five minutes is under four hours, which fits in a commute and feels like nothing. Over a year it is 195 hours, or eight days of the year spent listening.</p><p>That is not an argument against podcasts; it is the number you need to decide whether the queue is a habit or a backlog. Eight days is also roughly twenty-four books at the audiobook pace, which is a fair comparison of two ways to fill the same commute.</p><p>The answer is <strong>hours a week and hours a month and hours a year and whole days a year</strong>, worked out from episodes a week and average episode. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours_week</strong></td><td><code>Episodes a week × Average episode ÷ 60</code></td></tr><tr><td><strong>hours_month</strong></td><td><code>Episodes a week × Average episode ÷ 60 × 30.4375 ÷ 7</code></td></tr><tr><td><strong>hours_year</strong></td><td><code>Episodes a week × Average episode ÷ 60 × 52</code></td></tr><tr><td><strong>days_year</strong></td><td><code>Episodes a week × Average episode ÷ 60 × 52 ÷ 24</code></td></tr></tbody></table><p>Episodes times minutes over sixty gives hours a week. The month uses the average 30.44-day month, the year uses 52 weeks, and the day count is the year divided by 24.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports hours a week and hours a month and hours a year and whole days a year.</p><ul><li><strong>Episodes a week</strong> — episodes.</li><li><strong>Average episode</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours a week</strong> — h.</li><li><strong>Hours a month</strong> — h.</li><li><strong>Hours a year</strong> — h.</li><li><strong>Whole days a year</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put episodes a week = 5 episodes, average episode = 45 min into the form and the panel reads:</p><ul><li><strong>Hours a week</strong> = <code>Episodes a week × Average episode ÷ 60</code> = <strong>3.75 h</strong></li><li><strong>Hours a month</strong> = <code>Episodes a week × Average episode ÷ 60 × 30.4375 ÷ 7</code> = <strong>16.306 h</strong></li><li><strong>Hours a year</strong> = <code>Episodes a week × Average episode ÷ 60 × 52</code> = <strong>195 h</strong></li><li><strong>Whole days a year</strong> = <code>Episodes a week × Average episode ÷ 60 × 52 ÷ 24</code> = <strong>8.125 days</strong></li></ul><p>Two episodes is 78 hours a year and three days. The habit scales linearly, which makes it easy to cut by a fixed amount rather than guessing.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>5 × 45 ÷ 60</code>, which comes to <strong>3.75 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Five episodes of 45 minutes is 3.75 hours a week, 16.3 hours a month and 195 hours a year — eight days.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours a week</th><th>Hours a month</th><th>Hours a year</th><th>Whole days a year</th></tr></thead><tbody><tr><td><strong>Episodes a week</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Average episode</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Average episode</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Episodes a week</strong> opens at 5 episodes</li><li><strong>Average episode</strong> opens at 45 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Episodes a week</th><th>Hours a week</th><th>Hours a month</th><th>Hours a year</th><th>Whole days a year</th></tr></thead><tbody><tr><td>2.5 episodes</td><td>1.875</td><td>8.153</td><td>97.5</td><td>4.062</td></tr><tr><td>5 episodes</td><td>3.75</td><td>16.306</td><td>195</td><td>8.125</td></tr><tr><td>10 episodes</td><td>7.5</td><td>32.612</td><td>390</td><td>16.25</td></tr><tr><td>25 episodes</td><td>18.75</td><td>81.529</td><td>975</td><td>40.625</td></tr><tr><td>50 episodes</td><td>37.5</td><td>163.058</td><td>1 950</td><td>81.25</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set episodes a week = 7, average episode = 45: <strong>Hours a week</strong> = 5.25 h, <strong>Hours a month</strong> = 22.828 h, <strong>Hours a year</strong> = 273 h, <strong>Whole days a year</strong> = 11.375 days. Seven episodes a week is 5.25 hours, 273 hours a year and eleven and a half whole days.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting the queue as consumption.</strong> A saved episode is a resolution. The figure is what you actually listen to, not what you subscribe to.</li><li><strong>Ignoring the playback speed.</strong> Half the people listening to five hours a week are doing it at 1.5x, which is really three hours of attention and the audiobook-speed page has the correction.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Episodes, not attention.</strong> A podcast with the radio on in the background costs the hour and buys less than the hour of a show you follow.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need episodes a week and average episode. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours a week and hours a month and hours a year and whole days a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether to unsubscribe from a weekly show.</li></li><li><li>Comparing a podcast habit with an audiobook habit on the same commute.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/audiobooks">Audiobooks in a year</a> <a href="/everyday-life/audiobook-speed">Audiobook speed</a> <a href="/everyday-life/tv-alternatives">TV alternatives</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Episodes a week</strong> ×10</td><td>3.75</td><td>37.5</td><td>ten times larger</td></tr><tr><td><strong>Average episode</strong> ×10</td><td>3.75</td><td>37.5</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Podcast Time calculator work out?', 'a' => <<<'TXT'
            It returns hours a week and hours a month and hours a year and whole days a year from episodes a week and average episode. The relationship is Episodes a week × Average episode ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Episodes a week (episodes), Average episode (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: episodes a week in episodes; average episode in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many hours a year is an hour a day?', 'a' => '365, which is fifteen days. The arithmetic is trivial and the answer still surprises people, which is why it is worth doing once.'],
            ['q' => 'Does listening at 1.5x reduce the time?', 'a' => 'Yes, by a third. The same five episodes take 2.5 hours a week instead of 3.75, and the yearly figure falls from 195 to 130.'],
            ['q' => 'Should I count the commute twice?', 'a' => 'No. The commute is a fixed slot; the interesting figure is what fills it and what it costs in attention, not whether it happens.'],
        ],
        'related' => [
            ['path' => '/everyday-life/audiobooks', 'name' => 'Audiobooks in a year'],
            ['path' => '/everyday-life/audiobook-speed', 'name' => 'Audiobook speed'],
            ['path' => '/everyday-life/tv-alternatives', 'name' => 'TV alternatives'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
