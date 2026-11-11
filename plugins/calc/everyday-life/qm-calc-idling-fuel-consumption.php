<?php

/**
 * Idling Fuel Consumption Calculator
 * /everyday-life/idling-fuel-consumption
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Idling Fuel Consumption Calculator',
    'meta' => ['title' => 'Idling Fuel Consumption — What Standing Still Costs', 'description' => 'Engine size and hours spent idling give the fuel burned standing still, the money it costs over a year, and the miles of driving that fuel would have bought.', 'h1' => 'Idling Fuel Consumption Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'displacement',
                    'label' => 'Engine size',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '2',
                    'help' => 'Two litres is an ordinary four-cylinder, five is a V8. Idle burn follows engine size more closely than anything else.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_week',
                    'label' => 'Hours idling a week',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '5',
                    'help' => 'Warming up, waiting at a school, queuing, sitting in a car park with the heating on.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Fuel price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '3.45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mpg',
                    'label' => 'Fuel economy when moving',
                    'type' => 'number',
                    'suffix' => 'mpg',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gal_hour',
                    'label' => 'Fuel per hour idling',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal/h',
                ],
                [
                    'name' => 'gal_week',
                    'label' => 'Fuel a week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'lost_miles',
                    'label' => 'Miles that fuel would have covered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
            ],
        ],
    ],
    'formula' => ['gal_hour' => '0.09 * displacement', 'gal_week' => '0.09 * displacement * hours_week', 'cost_year' => '0.09 * displacement * hours_week * 52 * price', 'lost_miles' => '0.09 * displacement * hours_week * 52 * mpg'],
    'article' => [
        'intro' => 'Fuel burned while the engine idles, from its size and the hours a week it sits running, and what those hours cost a year — in money and in lost miles.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An idling engine burns fuel at a rate set by its size, not by the thermostat. A two-litre four uses roughly 0.18 gallons an hour at idle — about a fifth of a gallon — and a five-litre V8 nearer half a gallon.</p><p>Five hours a week of two-litre idling is 0.9 gallons, which is 3.11 a week and 161 a year. The same fuel would have driven 1 404 miles. That is the sentence the page is for: idling is not free, it is driving without going anywhere.</p><p>The answer is <strong>fuel per hour idling and fuel a week and cost a year and miles that fuel would have covered</strong>, worked out from engine size and hours idling a week and fuel price and fuel economy when moving. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gal_hour</strong></td><td><code>0.09 × Engine size</code></td></tr><tr><td><strong>gal_week</strong></td><td><code>0.09 × Engine size × Hours idling a week</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>0.09 × Engine size × Hours idling a week × 52 × Fuel price</code></td></tr><tr><td><strong>lost_miles</strong></td><td><code>0.09 × Engine size × Hours idling a week × 52 × Fuel economy when moving</code></td></tr></tbody></table><p>The idle rate is taken as 0.09 gallons an hour per litre of displacement, a rule of thumb that fits published idle figures for engines from 1.5 to 6 litres. Multiply by hours and weeks for the year, by price for money and by economy for the miles lost.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports fuel per hour idling and fuel a week and cost a year and miles that fuel would have covered.</p><ul><li><strong>Engine size</strong> — L. Two litres is an ordinary four-cylinder, five is a V8. Idle burn follows engine size more closely than anything else.</li><li><strong>Hours idling a week</strong> — h. Warming up, waiting at a school, queuing, sitting in a car park with the heating on.</li><li><strong>Fuel price</strong> — $/gal.</li><li><strong>Fuel economy when moving</strong> — mpg.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Fuel per hour idling</strong> — gal/h.</li><li><strong>Fuel a week</strong> — gal.</li><li><strong>Cost a year</strong> — $.</li><li><strong>Miles that fuel would have covered</strong> — mi.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put engine size = 2 L, hours idling a week = 5 h, fuel price = 3.45 $/gal, fuel economy when moving = 30 mpg into the form and the panel reads:</p><ul><li><strong>Fuel per hour idling</strong> = <code>0.09 × Engine size</code> = <strong>0.18 gal/h</strong></li><li><strong>Fuel a week</strong> = <code>0.09 × Engine size × Hours idling a week</code> = <strong>0.9 gal</strong></li><li><strong>Cost a year</strong> = <code>0.09 × Engine size × Hours idling a week × 52 × Fuel price</code> = <strong>161.46 $</strong></li><li><strong>Miles that fuel would have covered</strong> = <code>0.09 × Engine size × Hours idling a week × 52 × Fuel economy when moving</code> = <strong>1 404 mi</strong></li></ul><p>Idling also wears the engine without adding miles to the odometer, so the service interval arrives by date rather than by distance — and the used-car odometer reads low.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>0.09 × 2</code>, which comes to <strong>0.18 gal/h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A two-litre engine idles at 0.18 gallons an hour. Five hours a week is 0.9 gallons, 3.11 a week, 161.46 a year, and the same fuel would have carried the car 1 404 miles.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Fuel per hour idling</th><th>Fuel a week</th><th>Cost a year</th><th>Miles that fuel would have covered</th></tr></thead><tbody><tr><td><strong>Engine size</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours idling a week</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Fuel price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Fuel economy when moving</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Engine size</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Engine size</strong> opens at 2 L — Two litres is an ordinary four-cylinder, five is a V8. Idle burn follows engine size more closely than anything else.</li><li><strong>Hours idling a week</strong> opens at 5 h — Warming up, waiting at a school, queuing, sitting in a car park with the heating on.</li><li><strong>Fuel price</strong> opens at 3.45 $/gal</li><li><strong>Fuel economy when moving</strong> opens at 30 mpg</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Engine size</th><th>Fuel per hour idling</th><th>Fuel a week</th><th>Cost a year</th><th>Miles that fuel would have covered</th></tr></thead><tbody><tr><td>1 L</td><td>0.09</td><td>0.45</td><td>80.73</td><td>702</td></tr><tr><td>2 L</td><td>0.18</td><td>0.9</td><td>161.46</td><td>1 404</td></tr><tr><td>4 L</td><td>0.36</td><td>1.8</td><td>322.92</td><td>2 808</td></tr><tr><td>10 L</td><td>0.9</td><td>4.5</td><td>807.3</td><td>7 020</td></tr><tr><td>20 L</td><td>1.8</td><td>9</td><td>1 614.6</td><td>14 040</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set engine size = 2, hours idling a week = 10, fuel price = 3.45, fuel economy when moving = 30: <strong>Fuel per hour idling</strong> = 0.18 gal/h, <strong>Fuel a week</strong> = 1.8 gal, <strong>Cost a year</strong> = 322.92 $, <strong>Miles that fuel would have covered</strong> = 2 808 mi. Ten hours a week doubles everything: 1.8 gallons a week, 322.92 a year and 2 808 miles of driving given away.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Believing a restart costs more than idling.</strong> A warm restart uses a fraction of a minute's idle. Modern starters are rated for it, and above about ten seconds of standing the restart wins.</li><li><strong>Assuming idling warms the car faster.</strong> An idling engine warms slowly and the cabin heater takes heat out of it. Driving gently warms both sooner.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rule of thumb, not a test.</strong> Idle burn varies with temperature, load from the alternator and the air conditioning, which can add half as much again.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need engine size and hours idling a week and fuel price and fuel economy when moving. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Fuel per hour idling and fuel a week and cost a year and miles that fuel would have covered should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out what a school-run queue costs a term.</li></li><li><li>Deciding whether a block heater or a remote start is worth fitting.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a> <a href="/everyday-life/engine-hours-to-miles-converter">Engine hours to miles</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Engine size</strong> ×10</td><td>0.18</td><td>1.8</td><td>ten times larger</td></tr><tr><td><strong>Hours idling a week</strong> ×10</td><td>0.18</td><td>0.18</td><td>unchanged</td></tr><tr><td><strong>Fuel price</strong> ×10</td><td>0.18</td><td>0.18</td><td>unchanged</td></tr><tr><td><strong>Fuel economy when moving</strong> ×10</td><td>0.18</td><td>0.18</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Idling Fuel Consumption calculator work out?', 'a' => <<<'TXT'
            It returns fuel per hour idling and fuel a week and cost a year and miles that fuel would have covered from engine size and hours idling a week and fuel price and fuel economy when moving. The relationship is 0.09 × Engine size.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Engine size (L), Hours idling a week (h), Fuel price ($/gal), Fuel economy when moving (mpg). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: engine size in L; hours idling a week in h; fuel price in $/gal; fuel economy when moving in mpg. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much fuel does air conditioning use while idling?', 'a' => 'Around a tenth of a gallon an hour on a small engine at idle, and more in a hot climate where the compressor is working hard. It is not in this figure.'],
            ['q' => 'Is idling bad for the engine?', 'a' => <<<'TXT'
            It is not good for it. Idling burns fuel at low load, dilutes the oil with condensation and loads the catalytic converter less than it would like. Short idles are harmless; a habit is not.
            TXT],
            ['q' => 'Do stop-start cars idle at all?', 'a' => <<<'TXT'
            Only at rest with the system disabled or the battery low. On a car with the function working, most of this figure goes away — and that is the point of the function.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
            ['path' => '/everyday-life/engine-hours-to-miles-converter', 'name' => 'Engine hours to miles'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
