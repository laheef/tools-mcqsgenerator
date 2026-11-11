<?php

/**
 * Miles to Hours Calculator
 * /everyday-life/miles-to-hours
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Miles to Hours Calculator',
    'meta' => ['title' => 'Miles to Hours — Drive Time with the Stops In', 'description' => 'Distance over average speed gives the driving time, and a break allowance every hundred miles gives the arrival time you should plan your journey around.', 'h1' => 'Miles to Hours Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Distance',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '250',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Average speed',
                    'type' => 'number',
                    'suffix' => 'mph',
                    'default' => '55',
                    'help' => 'Average, not the speed limit. Motorway miles at 70 and town miles at 25 average closer to 50 over a long run.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'break_every',
                    'label' => 'Break every',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'break_len',
                    'label' => 'Length of each break',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Driving time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Driving time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'breaks',
                    'label' => 'Breaks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'stops',
                ],
                [
                    'name' => 'break_minutes',
                    'label' => 'Time stopped',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Total journey',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => [
        'hours' => 'distance / speed',
        'minutes' => 'distance / speed * 60',
        'breaks' => 'floor(distance / break_every)',
        'break_minutes' => 'floor(distance / break_every) * break_len',
        'total_hours' => 'distance / speed + floor(distance / break_every) * break_len / 60',
    ],
    'article' => [
        'intro' => 'How long a drive takes at an average speed, how many breaks the distance earns, and the total including them, in hours and minutes.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Navigation software quotes a time that assumes you drive the limit and do not stop. Two hundred and fifty miles at 55 is four hours thirty-three minutes of driving; add two fifteen-minute breaks and the journey is five hours three.</p><p>Breaks are counted per completed block of the interval, not per hour: a hundred miles earns one, and the last fifty earn none. That matches how a stop actually happens, which is after the tank or the bladder, not at a decimal point.</p><p>The answer is <strong>driving time and driving time and breaks and time stopped and total journey</strong>, worked out from distance and average speed and break every and length of each break. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>Distance ÷ Average speed</code></td></tr><tr><td><strong>minutes</strong></td><td><code>Distance ÷ Average speed × 60</code></td></tr><tr><td><strong>breaks</strong></td><td><code>floor(Distance ÷ Break every)</code></td></tr><tr><td><strong>break_minutes</strong></td><td><code>floor(Distance ÷ Break every) × Length of each break</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>Distance ÷ Average speed + floor(Distance ÷ Break every) × Length of each break ÷ 60</code></td></tr></tbody></table><p>Distance over speed gives hours; times sixty gives minutes. The break count is the distance divided by the interval and rounded down, and the stopped time is that count times the length of a break.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports driving time and driving time and breaks and time stopped and total journey.</p><ul><li><strong>Distance</strong> — mi.</li><li><strong>Average speed</strong> — mph. Average, not the speed limit. Motorway miles at 70 and town miles at 25 average closer to 50 over a long run.</li><li><strong>Break every</strong> — mi.</li><li><strong>Length of each break</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Driving time</strong> — h.</li><li><strong>Driving time</strong> — min.</li><li><strong>Breaks</strong> — stops.</li><li><strong>Time stopped</strong> — min.</li><li><strong>Total journey</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 250 mi, average speed = 55 mph, break every = 100 mi, length of each break = 15 min into the form and the panel reads:</p><ul><li><strong>Driving time</strong> = <code>Distance ÷ Average speed</code> = <strong>4.545 h</strong></li><li><strong>Driving time</strong> = <code>Distance ÷ Average speed × 60</code> = <strong>272.727 min</strong></li><li><strong>Breaks</strong> = <code>floor(Distance ÷ Break every)</code> = <strong>2 stops</strong></li><li><strong>Time stopped</strong> = <code>floor(Distance ÷ Break every) × Length of each break</code> = <strong>30 min</strong></li><li><strong>Total journey</strong> = <code>Distance ÷ Average speed + floor(Distance ÷ Break every) × Length of each break ÷ 60</code> = <strong>5.045 h</strong></li></ul><p>At 70 mph the driving time falls to 3.57 hours, but the total only falls to 4.07 because the breaks stay. Speed buys less than it looks.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>250 ÷ 55</code>, which comes to <strong>4.545 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>250 miles at 55 mph is 4.55 hours, 272.7 minutes. Two breaks of fifteen minutes add half an hour, so the journey takes 5.05 hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Driving time</th><th>Driving time</th><th>Breaks</th><th>Time stopped</th><th>Total journey</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+9.01 %</td></tr><tr><td><strong>Average speed</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td><td>−8.19 %</td></tr><tr><td><strong>Break every</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Length of each break</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0.99 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Length of each break</strong>. <strong>Break every</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 250 mi</li><li><strong>Average speed</strong> opens at 55 mph — Average, not the speed limit. Motorway miles at 70 and town miles at 25 average closer to 50 over a long run.</li><li><strong>Break every</strong> opens at 100 mi</li><li><strong>Length of each break</strong> opens at 15 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Driving time</th><th>Driving time</th><th>Breaks</th><th>Time stopped</th><th>Total journey</th></tr></thead><tbody><tr><td>125 mi</td><td>2.273</td><td>136.364</td><td>1</td><td>15</td><td>2.523</td></tr><tr><td>250 mi</td><td>4.545</td><td>272.727</td><td>2</td><td>30</td><td>5.045</td></tr><tr><td>500 mi</td><td>9.091</td><td>545.455</td><td>5</td><td>75</td><td>10.341</td></tr><tr><td>1 250 mi</td><td>22.727</td><td>1 363.636</td><td>12</td><td>180</td><td>25.727</td></tr><tr><td>2 500 mi</td><td>45.455</td><td>2 727.273</td><td>25</td><td>375</td><td>51.705</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 250, average speed = 70, break every = 100, length of each break = 15: <strong>Driving time</strong> = 3.571 h, <strong>Driving time</strong> = 214.286 min, <strong>Breaks</strong> = 2 stops, <strong>Time stopped</strong> = 30 min, <strong>Total journey</strong> = 4.071 h. At 70 mph the driving time is 3.57 hours and the two breaks take the total to 4.07, a saving of 59 minutes over the 55 mph run.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the speed limit as the average.</strong> A 70 mph motorway run with a town at each end averages nearer 55 over the whole distance, and the arrival estimate depends on the average.</li><li><strong>Forgetting the stops that are not breaks.</strong> Fuel, food and a wrong turn are not in the break field unless you count them, and a long journey usually has one of each.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One average speed.</strong> A route with a mountain pass and a city ring road has two or three speeds, and the average has to be your estimate of the whole.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and average speed and break every and length of each break. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Driving time and driving time and breaks and time stopped and total journey should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a departure time backwards from an appointment.</li></li><li><li>Deciding whether a drive is a one-day or a two-day trip.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/commute">Commute cost</a> <a href="/everyday-life/miles-to-dollars">Miles to dollars</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>4.545</td><td>45.455</td><td>ten times larger</td></tr><tr><td><strong>Average speed</strong> ×10</td><td>4.545</td><td>0.455</td><td>ten times smaller</td></tr><tr><td><strong>Break every</strong> ×10</td><td>4.545</td><td>4.545</td><td>unchanged</td></tr><tr><td><strong>Length of each break</strong> ×10</td><td>4.545</td><td>4.545</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Miles to Hours calculator work out?', 'a' => <<<'TXT'
            It returns driving time and driving time and breaks and time stopped and total journey from distance and average speed and break every and length of each break. The relationship is Distance ÷ Average speed.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (mi), Average speed (mph), Break every (mi), Length of each break (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: distance in mi; average speed in mph; break every in mi; length of each break in min. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why count breaks per hundred miles rather than per hour?', 'a' => <<<'TXT'
            Because the advice is written that way and because it is the distance that wears you out. A hundred miles is about two hours at a motorway pace, which is the interval most guidance recommends.
            TXT],
            ['q' => 'Should the average speed include stops?', 'a' => 'No. Coverage and average speed are different quantities, and mixing them gives a number that is neither. Put the stops in their own field.'],
            ['q' => 'How many miles a day is reasonable?', 'a' => 'For one driver, 500 miles is a long day and 600 is a strain. With a second driver 800 is possible and still tiring.'],
        ],
        'related' => [
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/commute', 'name' => 'Commute cost'],
            ['path' => '/everyday-life/miles-to-dollars', 'name' => 'Miles to dollars'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
