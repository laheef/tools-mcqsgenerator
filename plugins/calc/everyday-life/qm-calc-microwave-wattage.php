<?php

/**
 * Microwave Wattage Converter
 * /everyday-life/microwave-wattage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Microwave Wattage Converter',
    'meta' => ['title' => 'Microwave Wattage — Convert a Cooking Time in Watts', 'description' => 'Cook the same food in a microwave of a different power: the time at your oven\'s wattage turned into the time at another, with the minutes and seconds written.', 'h1' => 'Microwave Wattage Converter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'minutes',
                    'label' => 'Time on the packet',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'packet_watts',
                    'label' => 'Wattage the packet assumes',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '700',
                    'help' => 'Packets usually assume 700 W or 800 W; the small print on the back says which.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'your_watts',
                    'label' => 'Your microwave\'s wattage',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '1000',
                    'help' => 'The rating plate inside the door, or the model number\'s first digits.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'new_minutes',
                    'label' => 'Time in your microwave',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'new_seconds',
                    'label' => 'In seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'whole_minutes',
                    'label' => 'Minutes and seconds, whole minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'left_seconds',
                    'label' => 'Minutes and seconds, seconds over',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
            ],
        ],
    ],
    'formula' => ['new_minutes' => 'minutes * packet_watts / your_watts', 'new_seconds' => 'minutes * packet_watts / your_watts * 60', 'whole_minutes' => 'floor(minutes * packet_watts / your_watts)', 'left_seconds' => 'round((minutes * packet_watts / your_watts - floor(minutes * packet_watts / your_watts)) * 60)'],
    'article' => [
        'intro' => <<<'TXT'
        A cooking time at one power converted to another. Lower power needs longer, and the conversion is inverse: a 700 W oven takes half again as long as a 1 000 W one.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A microwave recipe is written for a power the packet does not always name. Eight minutes at 700 watts is 5 600 watt-minutes of energy, and the same energy at 1 000 watts takes 5.6 minutes. That is the whole conversion, and it is the reason two people following the same packet get different results.</p><p>The page gives the answer in decimal minutes and in minutes and seconds, because a microwave dial takes seconds and a recipe book talks in minutes.</p><p>The answer is <strong>time in your microwave and in seconds and minutes and seconds, whole minutes and minutes and seconds, seconds over</strong>, worked out from time on the packet and wattage the packet assumes and your microwave's wattage. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>new_minutes</strong></td><td><code>Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage</code></td></tr><tr><td><strong>new_seconds</strong></td><td><code>Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage × 60</code></td></tr><tr><td><strong>whole_minutes</strong></td><td><code>floor(Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage)</code></td></tr><tr><td><strong>left_seconds</strong></td><td><code>round((Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage - floor(Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage)) × 60)</code></td></tr></tbody></table><p>Time is inversely proportional to power when the energy is fixed: minutes times the packet's watts divided by your watts. The seconds lines multiply out and split the decimal part at sixty.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports time in your microwave and in seconds and minutes and seconds, whole minutes and minutes and seconds, seconds over.</p><ul><li><strong>Time on the packet</strong> — min.</li><li><strong>Wattage the packet assumes</strong> — W. Packets usually assume 700 W or 800 W; the small print on the back says which.</li><li><strong>Your microwave&#x27;s wattage</strong> — W. The rating plate inside the door, or the model number&#x27;s first digits.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time in your microwave</strong> — min.</li><li><strong>In seconds</strong> — s.</li><li><strong>Minutes and seconds, whole minutes</strong> — min.</li><li><strong>Minutes and seconds, seconds over</strong> — s.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put time on the packet = 8 min, wattage the packet assumes = 700 W, your microwave's wattage = 1 000 W into the form and the panel reads:</p><ul><li><strong>Time in your microwave</strong> = <code>Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage</code> = <strong>5.6 min</strong></li><li><strong>In seconds</strong> = <code>Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage × 60</code> = <strong>336 s</strong></li><li><strong>Minutes and seconds, whole minutes</strong> = <code>floor(Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage)</code> = <strong>5 min</strong></li><li><strong>Minutes and seconds, seconds over</strong> = <code>round((Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage - floor(Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage)) × 60)</code> = <strong>36 s</strong></li></ul><p>Round up rather than down. Food is safe at a minute over and not at a minute under, particularly with poultry.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>8 × 700 ÷ 1 000</code>, which comes to <strong>5.6 min</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Eight minutes at 700 W becomes 5.6 minutes at 1 000 W, which is 5 minutes 36 seconds: a quarter shorter, not a fifth, because the power is a third higher.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time in your microwave</th><th>In seconds</th><th>Minutes and seconds, whole minutes</th><th>Minutes and seconds, seconds over</th></tr></thead><tbody><tr><td><strong>Time on the packet</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+20 %</td><td>−72.22 %</td></tr><tr><td><strong>Wattage the packet assumes</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+20 %</td><td>−72.22 %</td></tr><tr><td><strong>Your microwave&#x27;s wattage</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>−86.11 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Your microwave&#x27;s wattage</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Time on the packet</strong> opens at 8 min</li><li><strong>Wattage the packet assumes</strong> opens at 700 W — Packets usually assume 700 W or 800 W; the small print on the back says which.</li><li><strong>Your microwave&#x27;s wattage</strong> opens at 1 000 W — The rating plate inside the door, or the model number&#x27;s first digits.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Time on the packet</th><th>Time in your microwave</th><th>In seconds</th><th>Minutes and seconds, whole minutes</th><th>Minutes and seconds, seconds over</th></tr></thead><tbody><tr><td>4 min</td><td>2.8</td><td>168</td><td>2</td><td>48</td></tr><tr><td>8 min</td><td>5.6</td><td>336</td><td>5</td><td>36</td></tr><tr><td>16 min</td><td>11.2</td><td>672</td><td>11</td><td>12</td></tr><tr><td>40 min</td><td>28</td><td>1 680</td><td>28</td><td>0</td></tr><tr><td>80 min</td><td>56</td><td>3 360</td><td>56</td><td>0</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set time on the packet = 8, wattage the packet assumes = 1 000, your microwave&#x27;s wattage = 700: <strong>Time in your microwave</strong> = 11.429 min, <strong>In seconds</strong> = 685.714 s, <strong>Minutes and seconds, whole minutes</strong> = 11 min, <strong>Minutes and seconds, seconds over</strong> = 26 s. The same food in a weaker oven takes 11.43 minutes, which is 11 minutes 26 seconds: the conversion works in both directions.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Scaling the time the wrong way round.</strong> A more powerful oven needs less time; putting your wattage on top of the fraction gives a longer one.</li><li><strong>Trusting the dial's numbers.</strong> A 10-setting dial is not linear, and the setting names a percentage of full power rather than a wattage.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One power level.</strong> A recipe that switches power halfway needs two passes, one per stage.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need time on the packet and wattage the packet assumes and your microwave's wattage. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time in your microwave and in seconds and minutes and seconds, whole minutes and minutes and seconds, seconds over should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Cooking a packet meal in a microwave that is not the one the packet assumes.</li></li><li><li>Converting an American recipe written for an 1 100 W oven.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/electricity-cost-single-usage">Electricity cost, single use</a> <a href="/conversion/celsius-to-fahrenheit">Celsius to Fahrenheit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Time on the packet</strong> ×10</td><td>5.6</td><td>56</td><td>ten times larger</td></tr><tr><td><strong>Wattage the packet assumes</strong> ×10</td><td>5.6</td><td>56</td><td>ten times larger</td></tr><tr><td><strong>Your microwave&#x27;s wattage</strong> ×10</td><td>5.6</td><td>0.56</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Microwave Wattage Converter calculator work out?', 'a' => <<<'TXT'
            It returns time in your microwave and in seconds and minutes and seconds, whole minutes and minutes and seconds, seconds over from time on the packet and wattage the packet assumes and your microwave's wattage. The relationship is Time on the packet × Wattage the packet assumes ÷ Your microwave's wattage.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Time on the packet (min), Wattage the packet assumes (W), Your microwave\'s wattage (W). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: time on the packet in min; wattage the packet assumes in W; your microwave's wattage in W. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Where do I find my microwave\'s wattage?', 'a' => 'On the rating plate, usually inside the door or on the back, and often in the model number: the first two digits of a Panasonic model are its wattage.'],
            ['q' => 'Why do packets say 700 W?', 'a' => 'Because that was the common European power when the conventions were set. American packets often assume 1 100 W.'],
            ['q' => 'Does the conversion hold for defrosting?', 'a' => 'No. Defrost runs at a fraction of full power and relies on the food resting between cycles, so the ratio is not the same.'],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/electricity-cost-single-usage', 'name' => 'Electricity cost, single use'],
            ['path' => '/conversion/celsius-to-fahrenheit', 'name' => 'Celsius to Fahrenheit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
