<?php

/**
 * Film Marathon Calculator
 * /everyday-life/star-wars-marathon
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Film Marathon Calculator',
    'meta' => ['title' => 'Film Marathon — Every Film, Breaks and Bedtime', 'description' => 'Eleven films at about two hours twenty each is nearly 27 hours with breaks: the scale of a full marathon, in evenings and in days of continuous viewing.', 'h1' => 'Film Marathon Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'films',
                    'label' => 'Films',
                    'type' => 'number',
                    'suffix' => 'films',
                    'default' => '11',
                    'help' => 'Nine saga episodes plus two stand-alone films is eleven. Count only the ones you intend to watch.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Average runtime',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '140',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'break_every',
                    'label' => 'A break every',
                    'type' => 'number',
                    'suffix' => 'films',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'break_len',
                    'label' => 'Length of the break',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Running time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'breaks',
                    'label' => 'Breaks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'breaks',
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'With breaks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'days',
                    'label' => 'Continuous days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'evenings',
                    'label' => 'Evenings at 3 hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'evenings',
                ],
            ],
        ],
    ],
    'formula' => [
        'hours' => 'films * minutes / 60',
        'breaks' => 'floor(films / break_every)',
        'total_hours' => 'films * minutes / 60 + floor(films / break_every) * break_len / 60',
        'days' => 'films * minutes / 60 / 24',
        'evenings' => '(films * minutes / 60 + floor(films / break_every) * break_len / 60) / 3',
    ],
    'article' => [
        'intro' => 'The running time of a whole film series with breaks between the discs, the days of continuous viewing it represents, and the number of evenings it really takes.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Eleven films at two hours twenty is 25.7 hours of film, and the breaks between them add another 45 minutes, because a marathon is three films and a cup of tea rather than one continuous screening.</p><p>Just over 26 hours is a day and a bit of continuous viewing, or nine evenings of three hours. The marathon is not one night; it is a week of nights and a weekend.</p><p>The answer is <strong>running time and breaks and with breaks and continuous days and evenings at 3 hours</strong>, worked out from films and average runtime and a break every and length of the break. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>Films × Average runtime ÷ 60</code></td></tr><tr><td><strong>breaks</strong></td><td><code>floor(Films ÷ A break every)</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>Films × Average runtime ÷ 60 + floor(Films ÷ A break every) × Length of the break ÷ 60</code></td></tr><tr><td><strong>days</strong></td><td><code>Films × Average runtime ÷ 60 ÷ 24</code></td></tr><tr><td><strong>evenings</strong></td><td><code>(Films × Average runtime ÷ 60 + floor(Films ÷ A break every) × Length of the break ÷ 60) ÷ 3</code></td></tr></tbody></table><p>Films times runtime gives the running time. The break count is the films divided by the interval and rounded down, so three breaks for eleven films at every three. Everything else is that total divided by 24 or by three.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports running time and breaks and with breaks and continuous days and evenings at 3 hours.</p><ul><li><strong>Films</strong> — films. Nine saga episodes plus two stand-alone films is eleven. Count only the ones you intend to watch.</li><li><strong>Average runtime</strong> — min.</li><li><strong>A break every</strong> — films.</li><li><strong>Length of the break</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Running time</strong> — h.</li><li><strong>Breaks</strong> — breaks.</li><li><strong>With breaks</strong> — h.</li><li><strong>Continuous days</strong> — days.</li><li><strong>Evenings at 3 hours</strong> — evenings.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put films = 11 films, average runtime = 140 min, a break every = 3 films, length of the break = 15 min into the form and the panel reads:</p><ul><li><strong>Running time</strong> = <code>Films × Average runtime ÷ 60</code> = <strong>25.667 h</strong></li><li><strong>Breaks</strong> = <code>floor(Films ÷ A break every)</code> = <strong>3 breaks</strong></li><li><strong>With breaks</strong> = <code>Films × Average runtime ÷ 60 + floor(Films ÷ A break every) × Length of the break ÷ 60</code> = <strong>26.417 h</strong></li><li><strong>Continuous days</strong> = <code>Films × Average runtime ÷ 60 ÷ 24</code> = <strong>1.069 days</strong></li><li><strong>Evenings at 3 hours</strong> = <code>(Films × Average runtime ÷ 60 + floor(Films ÷ A break every) × Length of the break ÷ 60) ÷ 3</code> = <strong>8.806 evenings</strong></li></ul><p>Nine films is 21 hours and 21.75 with breaks — the difference between a weekend and a week, which is why the stand-alone films get left out of most marathons.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>11 × 140 ÷ 60</code>, which comes to <strong>25.667 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Eleven films of 140 minutes is 25.67 hours, plus three breaks of fifteen minutes: 26.42 hours, one and a tenth days, or 8.8 evenings of three hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Running time</th><th>Breaks</th><th>With breaks</th><th>Continuous days</th><th>Evenings at 3 hours</th></tr></thead><tbody><tr><td><strong>Films</strong> +10 %</td><td>+10 %</td><td>+33.33 %</td><td>+10.66 %</td><td>+10 %</td><td>+10.66 %</td></tr><tr><td><strong>Average runtime</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+9.72 %</td><td>+10 %</td><td>+9.72 %</td></tr><tr><td><strong>A break every</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Length of the break</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.28 %</td><td>+0 %</td><td>+0.28 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Films</strong>. <strong>A break every</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Films</strong> opens at 11 films — Nine saga episodes plus two stand-alone films is eleven. Count only the ones you intend to watch.</li><li><strong>Average runtime</strong> opens at 140 min</li><li><strong>A break every</strong> opens at 3 films</li><li><strong>Length of the break</strong> opens at 15 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Films</th><th>Running time</th><th>Breaks</th><th>With breaks</th><th>Continuous days</th><th>Evenings at 3 hours</th></tr></thead><tbody><tr><td>5.5 films</td><td>12.833</td><td>1</td><td>13.083</td><td>0.535</td><td>4.361</td></tr><tr><td>11 films</td><td>25.667</td><td>3</td><td>26.417</td><td>1.069</td><td>8.806</td></tr><tr><td>22 films</td><td>51.333</td><td>7</td><td>53.083</td><td>2.139</td><td>17.694</td></tr><tr><td>55 films</td><td>128.333</td><td>18</td><td>132.833</td><td>5.347</td><td>44.278</td></tr><tr><td>110 films</td><td>256.667</td><td>36</td><td>265.667</td><td>10.694</td><td>88.556</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set films = 9, average runtime = 140, a break every = 3, length of the break = 15: <strong>Running time</strong> = 21 h, <strong>Breaks</strong> = 3 breaks, <strong>With breaks</strong> = 21.75 h, <strong>Continuous days</strong> = 0.875 days, <strong>Evenings at 3 hours</strong> = 7.25 evenings. Nine films is 21 hours and 21.75 with breaks, 7.25 evenings — three fewer than the eleven-film count.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the shortest runtime.</strong> Film lengths in a series run from 105 to 160 minutes. Averaging the actual runtimes is closer than picking one.</li><li><strong>Forgetting that the credits count.</strong> Eight minutes of credits eleven times is an hour and a half, and nobody watches them.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Films only.</strong> Series, animated spin-offs and a documentary would each add their own hours if you count them, and the count is a choice.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need films and average runtime and a break every and length of the break. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Running time and breaks and with breaks and continuous days and evenings at 3 hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a marathon weekend with friends.</li></li><li><li>Deciding whether the whole series is a week or a month.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tv-series-duration">Series duration</a> <a href="/everyday-life/binge-watching">Binge-watching</a> <a href="/everyday-life/tv-alternatives">TV alternatives</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Films</strong> ×10</td><td>25.667</td><td>256.667</td><td>ten times larger</td></tr><tr><td><strong>Average runtime</strong> ×10</td><td>25.667</td><td>256.667</td><td>ten times larger</td></tr><tr><td><strong>A break every</strong> ×10</td><td>25.667</td><td>25.667</td><td>unchanged</td></tr><tr><td><strong>Length of the break</strong> ×10</td><td>25.667</td><td>25.667</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Film Marathon calculator work out?', 'a' => <<<'TXT'
            It returns running time and breaks and with breaks and continuous days and evenings at 3 hours from films and average runtime and a break every and length of the break. The relationship is Films × Average runtime ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Films (films), Average runtime (min), A break every (films), Length of the break (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: films in films; average runtime in min; a break every in films; length of the break in min. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How long is the full Star Wars marathon?', 'a' => <<<'TXT'
            The nine saga films are about 21 hours of running time; the two stand-alone films add another 4.5. With breaks, the eleven-film version is a little over 26 hours.
            TXT],
            ['q' => 'Should I watch in release order or chronological order?', 'a' => 'Release order for a first viewing, because the films were made to reveal things in that sequence. The order does not change the running time.'],
            ['q' => 'How many days does a marathon take?', 'a' => 'At three hours an evening, nine nights. One continuous sitting is a day and a bit, and most people find the fourth film is where the plan fails.'],
        ],
        'related' => [
            ['path' => '/everyday-life/tv-series-duration', 'name' => 'Series duration'],
            ['path' => '/everyday-life/binge-watching', 'name' => 'Binge-watching'],
            ['path' => '/everyday-life/tv-alternatives', 'name' => 'TV alternatives'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
