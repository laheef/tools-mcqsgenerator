<?php

/**
 * Binge-Watching Calculator
 * /everyday-life/binge-watching
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Binge-Watching Calculator',
    'meta' => ['title' => 'Binge-Watching — Episodes a Night and When It Ends', 'description' => 'A season, a nightly episode count and a runtime: hours a night, nights to the end, and what the whole sitting costs in weeks of evenings. The formula is shown.', 'h1' => 'Binge-Watching Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'episodes',
                    'label' => 'Episodes in the season',
                    'type' => 'number',
                    'suffix' => 'episodes',
                    'default' => '24',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Episode runtime',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '42',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_night',
                    'label' => 'Episodes a night',
                    'type' => 'number',
                    'suffix' => 'episodes',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nights_week',
                    'label' => 'Nights a week',
                    'type' => 'number',
                    'suffix' => 'nights',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_night',
                    'label' => 'Sitting length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'hours_total',
                    'label' => 'Total viewing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'nights',
                    'label' => 'Nights to finish',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'nights',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Calendar weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
            ],
        ],
    ],
    'formula' => ['hours_night' => 'per_night * minutes / 60', 'hours_total' => 'episodes * minutes / 60', 'nights' => 'episodes / per_night', 'weeks' => 'episodes / per_night / nights_week'],
    'article' => [
        'intro' => 'How long a nightly sitting runs, how many nights a season takes at that pace, and what the whole run costs in weeks of evenings.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Four episodes of forty-two minutes is two hours and forty-eight minutes, not "a couple of episodes". Twenty-four of them at that pace is six nights, or just over a week if you watch five nights out of seven.</p><p>The sitting length is the number worth seeing. The decision is made one episode at a time and the cost is paid in whole evenings, and those two facts do not meet unless somebody multiplies them.</p><p>The answer is <strong>sitting length and total viewing and nights to finish and calendar weeks</strong>, worked out from episodes in the season and episode runtime and episodes a night and nights a week. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours_night</strong></td><td><code>Episodes a night × Episode runtime ÷ 60</code></td></tr><tr><td><strong>hours_total</strong></td><td><code>Episodes in the season × Episode runtime ÷ 60</code></td></tr><tr><td><strong>nights</strong></td><td><code>Episodes in the season ÷ Episodes a night</code></td></tr><tr><td><strong>weeks</strong></td><td><code>Episodes in the season ÷ Episodes a night ÷ Nights a week</code></td></tr></tbody></table><p>Episodes a night times the runtime gives the sitting; the season is the episode count times the runtime. Nights are episodes over the nightly count, and weeks divide that by the nights you watch.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports sitting length and total viewing and nights to finish and calendar weeks.</p><ul><li><strong>Episodes in the season</strong> — episodes.</li><li><strong>Episode runtime</strong> — min.</li><li><strong>Episodes a night</strong> — episodes.</li><li><strong>Nights a week</strong> — nights.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Sitting length</strong> — h.</li><li><strong>Total viewing</strong> — h.</li><li><strong>Nights to finish</strong> — nights.</li><li><strong>Calendar weeks</strong> — weeks.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put episodes in the season = 24 episodes, episode runtime = 42 min, episodes a night = 4 episodes, nights a week = 5 nights into the form and the panel reads:</p><ul><li><strong>Sitting length</strong> = <code>Episodes a night × Episode runtime ÷ 60</code> = <strong>2.8 h</strong></li><li><strong>Total viewing</strong> = <code>Episodes in the season × Episode runtime ÷ 60</code> = <strong>16.8 h</strong></li><li><strong>Nights to finish</strong> = <code>Episodes in the season ÷ Episodes a night</code> = <strong>6 nights</strong></li><li><strong>Calendar weeks</strong> = <code>Episodes in the season ÷ Episodes a night ÷ Nights a week</code> = <strong>1.2 weeks</strong></li></ul><p>Two episodes a night is 1.4 hours and twelve nights — the same season, and twice the calendar time. Autoplay is what moves the first number.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>4 × 42 ÷ 60</code>, which comes to <strong>2.8 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Four episodes of 42 minutes is 2.8 hours a night. The 24-episode season is 16.8 hours, six nights, and 1.2 weeks at five nights a week.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Sitting length</th><th>Total viewing</th><th>Nights to finish</th><th>Calendar weeks</th></tr></thead><tbody><tr><td><strong>Episodes in the season</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Episode runtime</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Episodes a night</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Nights a week</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Episodes in the season</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Episodes in the season</strong> opens at 24 episodes</li><li><strong>Episode runtime</strong> opens at 42 min</li><li><strong>Episodes a night</strong> opens at 4 episodes</li><li><strong>Nights a week</strong> opens at 5 nights</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Episodes in the season</th><th>Sitting length</th><th>Total viewing</th><th>Nights to finish</th><th>Calendar weeks</th></tr></thead><tbody><tr><td>12 episodes</td><td>2.8</td><td>8.4</td><td>3</td><td>0.6</td></tr><tr><td>24 episodes</td><td>2.8</td><td>16.8</td><td>6</td><td>1.2</td></tr><tr><td>48 episodes</td><td>2.8</td><td>33.6</td><td>12</td><td>2.4</td></tr><tr><td>120 episodes</td><td>2.8</td><td>84</td><td>30</td><td>6</td></tr><tr><td>240 episodes</td><td>2.8</td><td>168</td><td>60</td><td>12</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set episodes in the season = 24, episode runtime = 42, episodes a night = 2, nights a week = 5: <strong>Sitting length</strong> = 1.4 h, <strong>Total viewing</strong> = 16.8 h, <strong>Nights to finish</strong> = 12 nights, <strong>Calendar weeks</strong> = 2.4 weeks. Two episodes a night is 1.4 hours, twelve nights and 2.4 weeks — the same season spread over twice the calendar.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Believing "one more".</strong> The average adult episode is 42 minutes, and "one more" three times is two hours. At the level of a season, autoplay is the whole difference between a fortnight and a weekend.</li><li><strong>Comparing a 24-episode season with a 6-episode one.</strong> Both are a season. The hours are the only comparable figure.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No adverts, no credits.</strong> A streaming runtime is clean; a broadcast episode with adverts is twelve minutes longer and the arithmetic changes by a fifth.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need episodes in the season and episode runtime and episodes a night and nights a week. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Sitting length and total viewing and nights to finish and calendar weeks should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether to start a season at ten at night.</li></li><li><li>Working out what a weekly watching habit costs in a year.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tv-series-duration">Series duration</a> <a href="/everyday-life/star-wars-marathon">Film marathon</a> <a href="/everyday-life/tv-alternatives">TV alternatives</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Episodes in the season</strong> ×10</td><td>2.8</td><td>2.8</td><td>unchanged</td></tr><tr><td><strong>Episode runtime</strong> ×10</td><td>2.8</td><td>28</td><td>ten times larger</td></tr><tr><td><strong>Episodes a night</strong> ×10</td><td>2.8</td><td>28</td><td>ten times larger</td></tr><tr><td><strong>Nights a week</strong> ×10</td><td>2.8</td><td>2.8</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Binge-Watching calculator work out?', 'a' => <<<'TXT'
            It returns sitting length and total viewing and nights to finish and calendar weeks from episodes in the season and episode runtime and episodes a night and nights a week. The relationship is Episodes a night × Episode runtime ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Episodes in the season (episodes), Episode runtime (min), Episodes a night (episodes), Nights a week (nights). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: episodes in the season in episodes; episode runtime in min; episodes a night in episodes; nights a week in nights. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How long is a binge-watch?', 'a' => 'A whole season in one sitting is typically 8 to 10 hours, which is most of a day. People usually mean three or four episodes, which is two to three hours.'],
            ['q' => 'Does autoplay make a difference?', 'a' => 'To the calendar, everything. The sitting starts at one episode and the next begins before anybody decides. Turning it off is the only control that works.'],
            ['q' => 'Is watching four episodes a night a lot?', 'a' => 'It is two and a half hours of a four-hour evening, every night. The page exists to make that visible rather than to judge it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/tv-series-duration', 'name' => 'Series duration'],
            ['path' => '/everyday-life/star-wars-marathon', 'name' => 'Film marathon'],
            ['path' => '/everyday-life/tv-alternatives', 'name' => 'TV alternatives'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
