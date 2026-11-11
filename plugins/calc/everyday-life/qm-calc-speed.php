<?php

/**
 * Speed Calculator
 * /everyday-life/speed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Speed Calculator',
    'meta' => ['title' => 'Speed Calculator — From Distance and Time — Free Tool', 'description' => 'Divide the distance you covered by the time it took and the page returns speed in km/h, mph and m/s, plus the pace in minutes per kilometre. Formula shown.', 'h1' => 'Speed Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Distance',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '10',
                    'help' => 'The distance covered, in kilometres.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '0',
                    'help' => 'Whole hours of the trip.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'help' => 'The rest of the time, in minutes.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'km/h',
                ],
                [
                    'name' => 'mph',
                    'label' => 'Speed in miles per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
                [
                    'name' => 'ms',
                    'label' => 'Speed in metres per second',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm/s',
                ],
                [
                    'name' => 'pace',
                    'label' => 'Pace',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min/km',
                ],
            ],
        ],
    ],
    'formula' => ['speed' => 'distance / (hours + minutes / 60)', 'mph' => 'distance / (hours + minutes / 60) / 1.609344', 'ms' => 'distance / (hours + minutes / 60) / 3.6', 'pace' => '(hours + minutes / 60) * 60 / distance'],
    'article' => [
        'intro' => <<<'TXT'
        Speed is distance divided by time, and that is all this page does. Type the distance you covered and the time it took; the panel returns the speed in three units and the pace, which is the same number written the other way up.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A speed is a distance with a time attached. Ten kilometres in half an hour is twenty kilometres an hour, and every other reading on the page is that same fact in a different unit. The pace says it in the unit runners use: minutes per kilometre rather than kilometres per hour.</p><p>Two of the four readings are exact conversions. The mile is 1.609 344 km by definition, and an hour is 3 600 seconds, so neither conversion loses anything.</p><p>The answer is <strong>speed and speed in miles per hour and speed in metres per second and pace</strong>, worked out from distance and hours and minutes. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>speed</strong></td><td><code>Distance ÷ (Hours + Minutes ÷ 60)</code></td></tr><tr><td><strong>mph</strong></td><td><code>Distance ÷ (Hours + Minutes ÷ 60) ÷ 1.609344</code></td></tr><tr><td><strong>ms</strong></td><td><code>Distance ÷ (Hours + Minutes ÷ 60) ÷ 3.6</code></td></tr><tr><td><strong>pace</strong></td><td><code>(Hours + Minutes ÷ 60) × 60 ÷ Distance</code></td></tr></tbody></table><p>The division by 60 turns the minutes box into a fraction of an hour. Typing 30 minutes as 0.5 hours gives the same answer, and typing both would count the half hour twice.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports speed and speed in miles per hour and speed in metres per second and pace.</p><ul><li><strong>Distance</strong> — km. The distance covered, in kilometres.</li><li><strong>Hours</strong> — h. Whole hours of the trip.</li><li><strong>Minutes</strong> — min. The rest of the time, in minutes.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Speed</strong> — km/h.</li><li><strong>Speed in miles per hour</strong> — mph.</li><li><strong>Speed in metres per second</strong> — m/s.</li><li><strong>Pace</strong> — min/km.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 10 km, hours = 0 h, minutes = 30 min into the form and the panel reads:</p><ul><li><strong>Speed</strong> = <code>Distance ÷ (Hours + Minutes ÷ 60)</code> = <strong>20 km/h</strong></li><li><strong>Speed in miles per hour</strong> = <code>Distance ÷ (Hours + Minutes ÷ 60) ÷ 1.609344</code> = <strong>12.427 mph</strong></li><li><strong>Speed in metres per second</strong> = <code>Distance ÷ (Hours + Minutes ÷ 60) ÷ 3.6</code> = <strong>5.556 m/s</strong></li><li><strong>Pace</strong> = <code>(Hours + Minutes ÷ 60) × 60 ÷ Distance</code> = <strong>3 min/km</strong></li></ul><p>Ten kilometres in half an hour is the arithmetic of a commute, not a race, and the pace of 3 min/km shows how fast that actually is.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>10 ÷ (0 + 30 ÷ 60)</code>, which comes to <strong>20 km/h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Twenty kilometres an hour is a brisk bicycle ride and a slow car. A pace of 3 min/km is a strong runner; 6 min/km is a steady jog; 12 min/km is a walk with shopping. Read the speed and the pace together, because a reader who thinks in one will misjudge the other.</p><table class="calc-table"><thead><tr><th>Range</th><th>What it usually means</th></tr></thead><tbody><tr><td><strong>3–5 km/h</strong></td><td>Walking, on flat ground, with no load.</td></tr><tr><td><strong>12–20 km/h</strong></td><td>Cycling at a commuter pace.</td></tr><tr><td><strong>30–50 km/h</strong></td><td>A car in town.</td></tr><tr><td><strong>90–120 km/h</strong></td><td>A car on a motorway.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Speed</th><th>Speed in miles per hour</th><th>Speed in metres per second</th><th>Pace</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Hours</strong> +10 %</td><td>−16.67 %</td><td>−16.67 %</td><td>−16.67 %</td><td>+20 %</td></tr><tr><td><strong>Minutes</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hours</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 10 km — The distance covered, in kilometres.</li><li><strong>Hours</strong> opens at 0 h — Whole hours of the trip.</li><li><strong>Minutes</strong> opens at 30 min — The rest of the time, in minutes.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Speed</th><th>Speed in miles per hour</th><th>Speed in metres per second</th><th>Pace</th></tr></thead><tbody><tr><td>5 km</td><td>10</td><td>6.214</td><td>2.778</td><td>6</td></tr><tr><td>10 km</td><td>20</td><td>12.427</td><td>5.556</td><td>3</td></tr><tr><td>20 km</td><td>40</td><td>24.855</td><td>11.111</td><td>1.5</td></tr><tr><td>50 km</td><td>100</td><td>62.137</td><td>27.778</td><td>0.6</td></tr><tr><td>100 km</td><td>200</td><td>124.274</td><td>55.556</td><td>0.3</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 42.195, hours = 4, minutes = 0: <strong>Speed</strong> = 10.549 km/h, <strong>Speed in miles per hour</strong> = 6.555 mph, <strong>Speed in metres per second</strong> = 2.93 m/s, <strong>Pace</strong> = 5.688 min/km. A marathon in four hours is 10.55 km/h, or 5 min 41 s per kilometre.</li><li>Set distance = 2, hours = 0, minutes = 25: <strong>Speed</strong> = 4.8 km/h, <strong>Speed in miles per hour</strong> = 2.983 mph, <strong>Speed in metres per second</strong> = 1.333 m/s, <strong>Pace</strong> = 12.5 min/km. Two kilometres in twenty-five minutes is a walking pace of 4.8 km/h.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Minutes typed as a decimal hour.</strong> 1 h 30 min is 1.5 hours, not 1.30. The page adds the two boxes, so the mistake is only visible in the answer.</li><li><strong>Distance in miles with a time in hours.</strong> The speed then comes out in miles per hour, while the box beside it says km/h. Convert first, or read the mph line and ignore the rest.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>It is an average.</strong> A trip that includes a coffee stop is slower than the driving between stops, and this page cannot tell the difference.</li></li><li><li><strong>No traffic, no wind, no gradient.</strong> The number is arithmetic on the two boxes; the world adds resistance the boxes do not mention.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and hours and minutes. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Speed and speed in miles per hour and speed in metres per second and pace should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a journey time against the distance on a map.</li></li><li><li>Settling an argument about how fast a walk actually was.</li></li><li><li>Turning a race time into a pace for training.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/drive-time">Drive time</a> <a href="/everyday-life/fuel-cost">Fuel cost</a> <a href="/everyday-life/speed">Speed calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Hours</strong> ×10</td><td>20</td><td>6.667</td><td>×0.333</td></tr><tr><td><strong>Minutes</strong> ×10</td><td>20</td><td>2</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Speed calculator work out?', 'a' => <<<'TXT'
            It returns speed and speed in miles per hour and speed in metres per second and pace from distance and hours and minutes. The relationship is Distance ÷ (Hours + Minutes ÷ 60).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (km), Hours (h), Minutes (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: distance in km; hours in h; minutes in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the pace in minutes per kilometre rather than km/h?', 'a' => <<<'TXT'
            Because a pace is what you can divide by on the move. If a kilometre takes five minutes, the next kilometre will also take five minutes, and the arithmetic stays in your head.
            TXT],
            ['q' => 'Can I mix miles and kilometres?', 'a' => <<<'TXT'
            Not in one run. Put the distance in the unit the box names, read the speed in the same unit, and use the mph line only after converting the distance to kilometres.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/drive-time', 'name' => 'Drive time'],
            ['path' => '/everyday-life/fuel-cost', 'name' => 'Fuel cost'],
            ['path' => '/everyday-life/speed', 'name' => 'Speed calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
