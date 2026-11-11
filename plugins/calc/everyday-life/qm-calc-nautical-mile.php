<?php

/**
 * Nautical Mile Calculator
 * /everyday-life/nautical-mile
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Nautical Mile Calculator',
    'meta' => ['title' => 'Nautical Mile — Knots, Miles and Kilometres', 'description' => 'A nautical mile is 1.852 kilometres and a knot is that per hour. The page converts a distance, a speed and the time a passage takes. The formula is shown.', 'h1' => 'Nautical Mile Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'km',
                    'label' => 'Distance',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'knots',
                    'label' => 'Speed',
                    'type' => 'number',
                    'suffix' => 'kn',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nm',
                    'label' => 'Distance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'nm',
                ],
                [
                    'name' => 'kmh',
                    'label' => 'Speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'km/h',
                ],
                [
                    'name' => 'mph',
                    'label' => 'Speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Passage time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['nm' => 'km / 1.852', 'kmh' => 'knots * 1.852', 'mph' => 'knots * 1.15078', 'hours' => 'km / 1.852 / knots'],
    'article' => [
        'intro' => 'Kilometres into nautical miles, knots into kilometres and miles an hour, and the hours a passage takes at a given speed.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A nautical mile is a minute of latitude, which is why charts and sextants use it: one minute of arc on the globe. It works out at 1.852 kilometres, and a knot is one of those an hour.</p><p>A hundred kilometres is 54 nautical miles, and at six knots that is nine hours. Six knots is 11.1 kilometres an hour and 6.9 miles an hour, which is a sensible sailing speed and slower than a bicycle.</p><p>The answer is <strong>distance and speed and speed and passage time</strong>, worked out from distance and speed. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>nm</strong></td><td><code>Distance ÷ 1.852</code></td></tr><tr><td><strong>kmh</strong></td><td><code>Speed × 1.852</code></td></tr><tr><td><strong>mph</strong></td><td><code>Speed × 1.15078</code></td></tr><tr><td><strong>hours</strong></td><td><code>Distance ÷ 1.852 ÷ Speed</code></td></tr></tbody></table><p>Kilometres divided by 1.852 gives nautical miles. Knots times 1.852 gives kilometres an hour and times 1.15078 gives miles an hour. Passage time is the distance in nautical miles over the speed.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports distance and speed and speed and passage time.</p><ul><li><strong>Distance</strong> — km.</li><li><strong>Speed</strong> — kn.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Distance</strong> — nm.</li><li><strong>Speed</strong> — km/h.</li><li><strong>Speed</strong> — mph.</li><li><strong>Passage time</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 100 km, speed = 6 kn into the form and the panel reads:</p><ul><li><strong>Distance</strong> = <code>Distance ÷ 1.852</code> = <strong>53.996 nm</strong></li><li><strong>Speed</strong> = <code>Speed × 1.852</code> = <strong>11.112 km/h</strong></li><li><strong>Speed</strong> = <code>Speed × 1.15078</code> = <strong>6.905 mph</strong></li><li><strong>Passage time</strong> = <code>Distance ÷ 1.852 ÷ Speed</code> = <strong>8.999 h</strong></li></ul><p>A knot is not a mile an hour: 1.15078 of one. A ten-knot boat is doing 11.5 mph, which is the difference between a fast walk and a jog.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>100 ÷ 1.852</code>, which comes to <strong>53.996 nm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>100 kilometres is 54 nautical miles. Six knots is 11.1 km/h and 6.9 mph, so the passage takes nine hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Distance</th><th>Speed</th><th>Speed</th><th>Passage time</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Speed</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Speed</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 100 km</li><li><strong>Speed</strong> opens at 6 kn</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Distance</th><th>Speed</th><th>Speed</th><th>Passage time</th></tr></thead><tbody><tr><td>50 km</td><td>26.998</td><td>11.112</td><td>6.905</td><td>4.5</td></tr><tr><td>100 km</td><td>53.996</td><td>11.112</td><td>6.905</td><td>8.999</td></tr><tr><td>200 km</td><td>107.991</td><td>11.112</td><td>6.905</td><td>17.999</td></tr><tr><td>500 km</td><td>269.978</td><td>11.112</td><td>6.905</td><td>44.996</td></tr><tr><td>1 000 km</td><td>539.957</td><td>11.112</td><td>6.905</td><td>89.993</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 100, speed = 10: <strong>Distance</strong> = 53.996 nm, <strong>Speed</strong> = 18.52 km/h, <strong>Speed</strong> = 11.508 mph, <strong>Passage time</strong> = 5.4 h. At ten knots the same hundred kilometres takes 5.4 hours, and the speed is 18.5 km/h — a decent cruising boat.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using statute miles on a chart.</strong> A nautical mile is fifteen per cent longer, and a passage plotted in the wrong one is off by an hour in six.</li><li><strong>Confusing speed with distance.</strong> A knot is a speed and a nautical mile is a distance. "Knots per hour" is a tautology that has never meant anything.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Still water.</strong> A passage time ignores current and leeway, both of which can be a knot either way and neither of which is in this page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and speed. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Distance and speed and speed and passage time should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a day sail from a chart distance.</li></li><li><li>Converting a boat's speed for someone who thinks in mph.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/boat-speed">Boat speed</a> <a href="/conversion/kilometers-to-miles">Kilometres to miles</a> <a href="/everyday-life/miles-to-hours">Miles to hours</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>53.996</td><td>539.957</td><td>ten times larger</td></tr><tr><td><strong>Speed</strong> ×10</td><td>53.996</td><td>53.996</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Nautical Mile calculator work out?', 'a' => 'It returns distance and speed and speed and passage time from distance and speed. The relationship is Distance ÷ 1.852.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (km), Speed (kn). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: distance in km; speed in kn. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is a nautical mile longer than a mile?', 'a' => 'Because it is defined by the earth rather than by a king\'s stride: one minute of latitude, which is 1 852 metres.'],
            ['q' => 'Why do ships use knots?', 'a' => 'Because the unit matches the chart. A minute of latitude on the vertical scale is a nautical mile, so distance can be measured with dividers and no arithmetic.'],
            ['q' => 'How fast is a knot in mph?', 'a' => '1.15078 miles an hour. A 20-knot boat is doing 23 mph, which is why boats feel faster than their numbers suggest.'],
        ],
        'related' => [
            ['path' => '/everyday-life/boat-speed', 'name' => 'Boat speed'],
            ['path' => '/conversion/kilometers-to-miles', 'name' => 'Kilometres to miles'],
            ['path' => '/everyday-life/miles-to-hours', 'name' => 'Miles to hours'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
