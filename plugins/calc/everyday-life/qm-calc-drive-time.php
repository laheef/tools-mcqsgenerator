<?php

/**
 * Drive Time Calculator
 * /everyday-life/drive-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Drive Time Calculator',
    'meta' => ['title' => 'Drive Time Calculator — Hours from Distance', 'description' => 'Turn a distance and an average speed into driving time in hours and minutes, with the time a ten per cent slower average would add. The formula is shown.', 'h1' => 'Drive Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Distance',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '250',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Average speed',
                    'type' => 'number',
                    'suffix' => 'km/h',
                    'default' => '90',
                    'help' => 'Motorway average including junctions is usually 80 to 100.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'breaks',
                    'label' => 'Break time',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
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
                    'name' => 'total',
                    'label' => 'Total with breaks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'slower',
                    'label' => 'Extra time at 10 % slower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['hours' => 'distance / speed', 'minutes' => 'distance / speed * 60', 'total' => 'distance / speed + breaks / 60', 'slower' => 'distance / (speed * 0.9) * 60 - distance / speed * 60'],
    'article' => [
        'intro' => <<<'TXT'
        Driving time is distance divided by average speed. The page returns hours, minutes and the extra time a slower average costs, which is the number that decides whether a detour is worth it.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An average speed is not a speed limit. A 250 km motorway trip at a 90 km/h average takes 2 h 47 min, and the same trip at 100 takes 2 h 30 min: ten kilometres an hour buys seventeen minutes, not the twenty-five the arithmetic suggests.</p><p>The slower line makes that trade explicit. It is the difference between a route with roadworks and the same route without.</p><p>The answer is <strong>driving time and driving time and total with breaks and extra time at 10 % slower</strong>, worked out from distance and average speed and break time. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>Distance ÷ Average speed</code></td></tr><tr><td><strong>minutes</strong></td><td><code>Distance ÷ Average speed × 60</code></td></tr><tr><td><strong>total</strong></td><td><code>Distance ÷ Average speed + Break time ÷ 60</code></td></tr><tr><td><strong>slower</strong></td><td><code>Distance ÷ (Average speed × 0.9) × 60 - Distance ÷ Average speed × 60</code></td></tr></tbody></table><p>Distance divided by speed gives hours. Multiplying by sixty gives minutes, and the break is added in hours so the total is one number.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports driving time and driving time and total with breaks and extra time at 10 % slower.</p><ul><li><strong>Distance</strong> — km.</li><li><strong>Average speed</strong> — km/h. Motorway average including junctions is usually 80 to 100.</li><li><strong>Break time</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Driving time</strong> — h.</li><li><strong>Driving time</strong> — min.</li><li><strong>Total with breaks</strong> — h.</li><li><strong>Extra time at 10 % slower</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 250 km, average speed = 90 km/h, break time = 30 min into the form and the panel reads:</p><ul><li><strong>Driving time</strong> = <code>Distance ÷ Average speed</code> = <strong>2.778 h</strong></li><li><strong>Driving time</strong> = <code>Distance ÷ Average speed × 60</code> = <strong>166.667 min</strong></li><li><strong>Total with breaks</strong> = <code>Distance ÷ Average speed + Break time ÷ 60</code> = <strong>3.278 h</strong></li><li><strong>Extra time at 10 % slower</strong> = <code>Distance ÷ (Average speed × 0.9) × 60 - Distance ÷ Average speed × 60</code> = <strong>18.519 min</strong></li></ul><p>The break box is separate because driving time and elapsed time are different questions, and a passenger asks the second one.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>250 ÷ 90</code>, which comes to <strong>2.778 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>250 km at 90 km/h is 2.78 hours, or 167 minutes, which is 3.28 hours with a thirty-minute break. Slowing to 81 km/h adds 19 minutes.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Driving time</th><th>Driving time</th><th>Total with breaks</th><th>Extra time at 10 % slower</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+8.47 %</td><td>+10 %</td></tr><tr><td><strong>Average speed</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−7.7 %</td><td>−9.09 %</td></tr><tr><td><strong>Break time</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.53 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Distance</strong>. <strong>Break time</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 250 km</li><li><strong>Average speed</strong> opens at 90 km/h — Motorway average including junctions is usually 80 to 100.</li><li><strong>Break time</strong> opens at 30 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Driving time</th><th>Driving time</th><th>Total with breaks</th><th>Extra time at 10 % slower</th></tr></thead><tbody><tr><td>125 km</td><td>1.389</td><td>83.333</td><td>1.889</td><td>9.259</td></tr><tr><td>250 km</td><td>2.778</td><td>166.667</td><td>3.278</td><td>18.519</td></tr><tr><td>500 km</td><td>5.556</td><td>333.333</td><td>6.056</td><td>37.037</td></tr><tr><td>1 250 km</td><td>13.889</td><td>833.333</td><td>14.389</td><td>92.593</td></tr><tr><td>2 500 km</td><td>27.778</td><td>1 666.667</td><td>28.278</td><td>185.185</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 250, average speed = 100, break time = 30: <strong>Driving time</strong> = 2.5 h, <strong>Driving time</strong> = 150 min, <strong>Total with breaks</strong> = 3 h, <strong>Extra time at 10 % slower</strong> = 16.667 min. A hundred kilometres an hour: 2.5 hours of driving, 3.0 with the break.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the speed limit.</strong> Junctions, traffic and weather pull the average well below the sign.</li><li><strong>Forgetting the return trip.</strong> The distance box is one way; double it for a there-and-back journey.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No traffic model.</strong> The average is yours, and it is the only thing the answer depends on.</li></li><li><li><strong>No rest rules.</strong> Legal driving limits are outside this arithmetic.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and average speed and break time. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Driving time and driving time and total with breaks and extra time at 10 % slower should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a departure time from an arrival time.</li></li><li><li>Deciding whether a detour is worth twenty minutes.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/speed">Speed calculator</a> <a href="/everyday-life/fuel-cost">Fuel cost</a> <a href="/everyday-life/commute">Commute</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>2.778</td><td>27.778</td><td>ten times larger</td></tr><tr><td><strong>Average speed</strong> ×10</td><td>2.778</td><td>0.278</td><td>ten times smaller</td></tr><tr><td><strong>Break time</strong> ×10</td><td>2.778</td><td>2.778</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Drive Time calculator work out?', 'a' => <<<'TXT'
            It returns driving time and driving time and total with breaks and extra time at 10 % slower from distance and average speed and break time. The relationship is Distance ÷ Average speed.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (km), Average speed (km/h), Break time (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: distance in km; average speed in km/h; break time in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What average speed should I use?', 'a' => 'For a motorway trip, 80 to 100 km/h including junctions. For mixed roads, 50 to 60. The page is only as good as that number.'],
            ['q' => 'Does it include the return journey?', 'a' => 'No. Put the round-trip distance in if that is what you want.'],
        ],
        'related' => [
            ['path' => '/everyday-life/speed', 'name' => 'Speed calculator'],
            ['path' => '/everyday-life/fuel-cost', 'name' => 'Fuel cost'],
            ['path' => '/everyday-life/commute', 'name' => 'Commute'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
