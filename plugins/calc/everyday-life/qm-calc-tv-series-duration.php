<?php

/**
 * TV Series Duration Calculator
 * /everyday-life/tv-series-duration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TV Series Duration Calculator',
    'meta' => ['title' => 'TV Series Duration — Seasons, Episodes and Hours', 'description' => 'Seasons, episodes per season and an average runtime give the total episodes and the hours they take, plus the nights it costs at two hours an evening.', 'h1' => 'TV Series Duration Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'seasons',
                    'label' => 'Seasons',
                    'type' => 'number',
                    'suffix' => 'seasons',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'episodes',
                    'label' => 'Episodes a season',
                    'type' => 'number',
                    'suffix' => 'episodes',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Average episode',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_night',
                    'label' => 'Watching a night',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_episodes',
                    'label' => 'Total episodes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'episodes',
                ],
                [
                    'name' => 'total_hours',
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
                    'label' => 'Weeks at 5 nights',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
            ],
        ],
    ],
    'formula' => ['total_episodes' => 'seasons * episodes', 'total_hours' => 'seasons * episodes * minutes / 60', 'nights' => 'seasons * episodes * minutes / 60 / hours_night', 'weeks' => 'seasons * episodes * minutes / 60 / hours_night / 5'],
    'article' => [
        'intro' => 'The total episodes and viewing hours in a series, from its season count, and how many evenings it takes at a fixed amount of watching a night.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Six seasons of ten fifty-minute episodes is sixty episodes and fifty hours. At two hours a night that is twenty-five evenings, or five weeks if you watch five nights a week.</p><p>That is the number a recommendation means. "You should watch it" costs twenty-five evenings of your year, and comparing it with the eight days of podcasts or the five hours of a novel is a fair way to choose.</p><p>The answer is <strong>total episodes and total viewing and nights to finish and weeks at 5 nights</strong>, worked out from seasons and episodes a season and average episode and watching a night. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_episodes</strong></td><td><code>Seasons × Episodes a season</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>Seasons × Episodes a season × Average episode ÷ 60</code></td></tr><tr><td><strong>nights</strong></td><td><code>Seasons × Episodes a season × Average episode ÷ 60 ÷ Watching a night</code></td></tr><tr><td><strong>weeks</strong></td><td><code>Seasons × Episodes a season × Average episode ÷ 60 ÷ Watching a night ÷ 5</code></td></tr></tbody></table><p>Seasons times episodes gives the count; times the runtime and divided by sixty gives hours. Nights and weeks divide that by the hours you watch a night and by the number of nights in a week.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports total episodes and total viewing and nights to finish and weeks at 5 nights.</p><ul><li><strong>Seasons</strong> — seasons.</li><li><strong>Episodes a season</strong> — episodes.</li><li><strong>Average episode</strong> — min.</li><li><strong>Watching a night</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Total episodes</strong> — episodes.</li><li><strong>Total viewing</strong> — h.</li><li><strong>Nights to finish</strong> — nights.</li><li><strong>Weeks at 5 nights</strong> — weeks.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put seasons = 6 seasons, episodes a season = 10 episodes, average episode = 50 min, watching a night = 2 h into the form and the panel reads:</p><ul><li><strong>Total episodes</strong> = <code>Seasons × Episodes a season</code> = <strong>60 episodes</strong></li><li><strong>Total viewing</strong> = <code>Seasons × Episodes a season × Average episode ÷ 60</code> = <strong>50 h</strong></li><li><strong>Nights to finish</strong> = <code>Seasons × Episodes a season × Average episode ÷ 60 ÷ Watching a night</code> = <strong>25 nights</strong></li><li><strong>Weeks at 5 nights</strong> = <code>Seasons × Episodes a season × Average episode ÷ 60 ÷ Watching a night ÷ 5</code> = <strong>5 weeks</strong></li></ul><p>A show with twenty episode seasons is twice as long for the same number of seasons — which is why the episode count, not the season count, is the figure to compare.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>6 × 10</code>, which comes to <strong>60 episodes</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Six seasons of ten episodes at 50 minutes is 60 episodes, 50 hours, 25 nights at two hours and five weeks at five nights a week.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Total episodes</th><th>Total viewing</th><th>Nights to finish</th><th>Weeks at 5 nights</th></tr></thead><tbody><tr><td><strong>Seasons</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Episodes a season</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Average episode</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Watching a night</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Average episode</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Seasons</strong> opens at 6 seasons</li><li><strong>Episodes a season</strong> opens at 10 episodes</li><li><strong>Average episode</strong> opens at 50 min</li><li><strong>Watching a night</strong> opens at 2 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Seasons</th><th>Total episodes</th><th>Total viewing</th><th>Nights to finish</th><th>Weeks at 5 nights</th></tr></thead><tbody><tr><td>3 seasons</td><td>30</td><td>25</td><td>12.5</td><td>2.5</td></tr><tr><td>6 seasons</td><td>60</td><td>50</td><td>25</td><td>5</td></tr><tr><td>12 seasons</td><td>120</td><td>100</td><td>50</td><td>10</td></tr><tr><td>30 seasons</td><td>300</td><td>250</td><td>125</td><td>25</td></tr><tr><td>60 seasons</td><td>600</td><td>500</td><td>250</td><td>50</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set seasons = 6, episodes a season = 10, average episode = 60, watching a night = 2: <strong>Total episodes</strong> = 60 episodes, <strong>Total viewing</strong> = 60 h, <strong>Nights to finish</strong> = 30 nights, <strong>Weeks at 5 nights</strong> = 6 weeks. At sixty minutes an episode the same series is 60 hours and 30 nights — five more evenings for a ten-minute runtime difference.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting seasons instead of episodes.</strong> A British six-episode season and a US twenty-two episode season are not the same unit and are both called a season.</li><li><strong>Forgetting the pilot and finale.</strong> Premieres and finales often run long. On a sixty-episode series that is an hour or two the average hides.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No rewatching.</strong> The figure is one pass, and a show you have seen twice has cost twice. The arithmetic is honest about that even if the habit is not.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need seasons and episodes a season and average episode and watching a night. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Total episodes and total viewing and nights to finish and weeks at 5 nights should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether to start a long series before a holiday.</li></li><li><li>Comparing the commitment of two recommendations.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/binge-watching">Binge-watching</a> <a href="/everyday-life/star-wars-marathon">Film marathon</a> <a href="/everyday-life/tv-alternatives">TV alternatives</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Seasons</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr><tr><td><strong>Episodes a season</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr><tr><td><strong>Average episode</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr><tr><td><strong>Watching a night</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TV Series Duration calculator work out?', 'a' => <<<'TXT'
            It returns total episodes and total viewing and nights to finish and weeks at 5 nights from seasons and episodes a season and average episode and watching a night. The relationship is Seasons × Episodes a season.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Seasons (seasons), Episodes a season (episodes), Average episode (min), Watching a night (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: seasons in seasons; episodes a season in episodes; average episode in min; watching a night in h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How long does it take to watch a typical series?', 'a' => 'A modern ten-episode drama is about 8 to 10 hours, which is four or five evenings. A network series with 22 episodes is 16 hours and a fortnight.'],
            ['q' => 'Should I use the runtime or the slot length?', 'a' => 'The runtime. A 50-minute episode in a one-hour slot is 50 minutes of show and ten of adverts, and the adverts are not the part you are choosing.'],
            ['q' => 'Does this include the recap?', 'a' => 'No. Recaps and titles are a minute or two an episode, which on sixty episodes is an hour — worth knowing, not worth modelling.'],
        ],
        'related' => [
            ['path' => '/everyday-life/binge-watching', 'name' => 'Binge-watching'],
            ['path' => '/everyday-life/star-wars-marathon', 'name' => 'Film marathon'],
            ['path' => '/everyday-life/tv-alternatives', 'name' => 'TV alternatives'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
