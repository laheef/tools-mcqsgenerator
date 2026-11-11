<?php

/**
 * Traffic Density Calculator
 * /everyday-life/traffic-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Traffic Density Calculator',
    'meta' => ['title' => 'Traffic Density — Vehicles per Kilometre and Gap', 'description' => 'Flow over speed gives density: at 1 800 vehicles an hour and 60 km/h that is 30 a kilometre, a 33-metre gap and a two-second headway. The formula is shown.', 'h1' => 'Traffic Density Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'flow',
                    'label' => 'Traffic flow',
                    'type' => 'number',
                    'suffix' => 'veh/h',
                    'default' => '1800',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Average speed',
                    'type' => 'number',
                    'suffix' => 'km/h',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'segment',
                    'label' => 'Segment length',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'veh/km',
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Space per vehicle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm',
                ],
                [
                    'name' => 'headway',
                    'label' => 'Time headway',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'in_segment',
                    'label' => 'Vehicles in your segment',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'vehicles',
                ],
            ],
        ],
    ],
    'formula' => ['density' => 'flow / speed', 'spacing' => '1000 / (flow / speed)', 'headway' => '3600 / flow', 'in_segment' => 'flow / speed * segment / 1000'],
    'article' => [
        'intro' => 'How densely traffic packs a road from its flow and speed, the space between vehicles and the time gap that space gives a following driver.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Flow is how many vehicles pass a point in an hour and density is how many are on a kilometre at once. Dividing one by the other is the whole of traffic arithmetic: 1 800 an hour at 60 km/h is 30 vehicles to the kilometre.</p><p>Thirty a kilometre is a 33-metre space each, which at 60 km/h is a two-second headway. That is the difference between a road that flows and a queue: the same flow at 20 km/h would be 90 vehicles a kilometre and a metre of road each.</p><p>The answer is <strong>density and space per vehicle and time headway and vehicles in your segment</strong>, worked out from traffic flow and average speed and segment length. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>density</strong></td><td><code>Traffic flow ÷ Average speed</code></td></tr><tr><td><strong>spacing</strong></td><td><code>1000 ÷ (Traffic flow ÷ Average speed)</code></td></tr><tr><td><strong>headway</strong></td><td><code>3600 ÷ Traffic flow</code></td></tr><tr><td><strong>in_segment</strong></td><td><code>Traffic flow ÷ Average speed × Segment length ÷ 1000</code></td></tr></tbody></table><p>Flow over speed gives density in vehicles a kilometre when the speed is in kilometres an hour. The spacing is a thousand metres over the density, and the headway is 3 600 seconds over the flow.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports density and space per vehicle and time headway and vehicles in your segment.</p><ul><li><strong>Traffic flow</strong> — veh/h.</li><li><strong>Average speed</strong> — km/h.</li><li><strong>Segment length</strong> — m.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Density</strong> — veh/km.</li><li><strong>Space per vehicle</strong> — m.</li><li><strong>Time headway</strong> — s.</li><li><strong>Vehicles in your segment</strong> — vehicles.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put traffic flow = 1 800 veh/h, average speed = 60 km/h, segment length = 500 m into the form and the panel reads:</p><ul><li><strong>Density</strong> = <code>Traffic flow ÷ Average speed</code> = <strong>30 veh/km</strong></li><li><strong>Space per vehicle</strong> = <code>1000 ÷ (Traffic flow ÷ Average speed)</code> = <strong>33.333 m</strong></li><li><strong>Time headway</strong> = <code>3600 ÷ Traffic flow</code> = <strong>2 s</strong></li><li><strong>Vehicles in your segment</strong> = <code>Traffic flow ÷ Average speed × Segment length ÷ 1000</code> = <strong>15 vehicles</strong></li></ul><p>The same flow at 30 km/h doubles the density to 60 a kilometre — the road is twice as full for the same throughput, which is what a slowdown does.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>1 800 vehicles an hour at 60 km/h is 30 a kilometre: 33.3 metres each, a two-second headway, and 15 vehicles in a 500-metre stretch.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Density</th><th>Space per vehicle</th><th>Time headway</th><th>Vehicles in your segment</th></tr></thead><tbody><tr><td><strong>Traffic flow</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Average speed</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Segment length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Traffic flow</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Traffic flow</strong> opens at 1 800 veh/h</li><li><strong>Average speed</strong> opens at 60 km/h</li><li><strong>Segment length</strong> opens at 500 m</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Traffic flow</th><th>Density</th><th>Space per vehicle</th><th>Time headway</th><th>Vehicles in your segment</th></tr></thead><tbody><tr><td>900 veh/h</td><td>15</td><td>66.667</td><td>4</td><td>7.5</td></tr><tr><td>1 800 veh/h</td><td>30</td><td>33.333</td><td>2</td><td>15</td></tr><tr><td>3 600 veh/h</td><td>60</td><td>16.667</td><td>1</td><td>30</td></tr><tr><td>9 000 veh/h</td><td>150</td><td>6.667</td><td>0.4</td><td>75</td></tr><tr><td>18 000 veh/h</td><td>300</td><td>3.333</td><td>0.2</td><td>150</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set traffic flow = 1 800, average speed = 30, segment length = 500: <strong>Density</strong> = 60 veh/km, <strong>Space per vehicle</strong> = 16.667 m, <strong>Time headway</strong> = 2 s, <strong>Vehicles in your segment</strong> = 30 vehicles. At 30 km/h the same flow is 60 vehicles a kilometre and 16.7 metres apart — half a second of headway, which nobody leaves.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing miles and kilometres.</strong> Density is vehicles a unit of length, so flow and speed have to be in matching units. 1 800 an hour at 40 mph is 28 a mile, not 45 a kilometre.</li><li><strong>Treating flow as capacity.</strong> A road can carry its capacity at a range of speeds and collapse suddenly above it. The number here is what is happening, not what it could take.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>An average.</strong> Traffic is not uniform: density near a junction is double the average for the same flow.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need traffic flow and average speed and segment length. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Density and space per vehicle and time headway and vehicles in your segment should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Making sense of a traffic report's flow figure.</li></li><li><li>Working out whether a cycle lane fits the space between vehicles.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/miles-to-hours">Miles to hours</a> <a href="/everyday-life/crosswind">Crosswind</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Traffic flow</strong> ×10</td><td>30</td><td>300</td><td>ten times larger</td></tr><tr><td><strong>Average speed</strong> ×10</td><td>30</td><td>3</td><td>ten times smaller</td></tr><tr><td><strong>Segment length</strong> ×10</td><td>30</td><td>30</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Traffic Density calculator work out?', 'a' => <<<'TXT'
            It returns density and space per vehicle and time headway and vehicles in your segment from traffic flow and average speed and segment length. The relationship is Traffic flow ÷ Average speed.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Traffic flow (veh/h), Average speed (km/h), Segment length (m). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: traffic flow in veh/h; average speed in km/h; segment length in m. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a good traffic density?', 'a' => 'Under 15 vehicles a kilometre is free-flowing, 25 to 40 is busy, and above 60 it is a queue with a speed of its own.'],
            ['q' => 'Why does the headway matter more than the gap?', 'a' => 'Because a gap in metres shrinks with speed. Two seconds is the same following distance at 30 km/h and 100, and it is the figure driving guidance uses.'],
            ['q' => 'Does density predict delay?', 'a' => 'Roughly: delay rises steeply as density approaches the point where flow starts to fall with speed. That tipping point is what a traffic model is for.'],
        ],
        'related' => [
            ['path' => '/everyday-life/miles-to-hours', 'name' => 'Miles to hours'],
            ['path' => '/everyday-life/crosswind', 'name' => 'Crosswind'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
