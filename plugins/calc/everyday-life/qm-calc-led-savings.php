<?php

/**
 * LED Savings Calculator
 * /everyday-life/led-savings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'LED Savings Calculator',
    'meta' => ['title' => 'LED Savings — What Switching Bulbs Actually Saves', 'description' => 'The yearly cost of a filament bulb against an LED at the same brightness, including the bulbs you have to buy, with the saving and the payback period in years.', 'h1' => 'LED Savings Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'old_watts',
                    'label' => 'Old bulb power',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'new_watts',
                    'label' => 'LED power for the same light',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '9',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours lit each day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Electricity price',
                    'type' => 'number',
                    'suffix' => '$/kWh',
                    'default' => '0.15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'old_bulb_price',
                    'label' => 'Price of an old bulb',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'old_bulb_life',
                    'label' => 'Life of an old bulb',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'led_price',
                    'label' => 'Price of the LED',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'led_life',
                    'label' => 'Life of the LED',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '15000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'old_year',
                    'label' => 'Old bulb, cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'led_year',
                    'label' => 'LED, cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'saving',
                    'label' => 'Saved a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'payback',
                    'label' => 'Payback',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['old_year' => 'old_watts * hours * 365 / 1000 * price + old_bulb_price * hours * 365 / old_bulb_life', 'led_year' => 'new_watts * hours * 365 / 1000 * price + led_price * hours * 365 / led_life', 'saving' => <<<'TXT'
    (old_watts * hours * 365 / 1000 * price + old_bulb_price * hours * 365 / old_bulb_life) - (new_watts * hours * 365 / 1000 * price + led_price * hours * 365 / led_life)
    TXT, 'payback' => <<<'TXT'
    led_price / ((old_watts * hours * 365 / 1000 * price + old_bulb_price * hours * 365 / old_bulb_life) - (new_watts * hours * 365 / 1000 * price + led_price * hours * 365 / led_life))
    TXT],
    'article' => [
        'intro' => 'Two bulbs, one socket, a year of running. Energy, replacement bulbs, the total, the difference, and how long the LED takes to pay for itself.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The energy saving is the easy half and it is real: sixty watts against nine, at the same brightness, is eighty-five per cent less. The half people forget is the bulbs. A filament bulb is cheap and dies every thousand hours; an LED costs several times as much and lasts ten or fifteen times longer, and in a year of evening use you buy one or two of the first and a fraction of the second.</p><p>This page adds both halves and divides the price of the LED by the yearly difference. That quotient is the payback: the number of years before the saving has paid for the bulb.</p><p>The answer is <strong>old bulb, cost a year and lED, cost a year and saved a year and payback</strong>, worked out from old bulb power and lED power for the same light and hours lit each day and electricity price and price of an old bulb and life of an old bulb and price of the LED and life of the LED. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>old_year</strong></td><td><code>Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb</code></td></tr><tr><td><strong>led_year</strong></td><td><code>LED power for the same light × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of the LED × Hours lit each day × 365 ÷ Life of the LED</code></td></tr><tr><td><strong>saving</strong></td><td><code>(Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb) - (LED power for the same light × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of the LED × Hours lit each day × 365 ÷ Life of the LED)</code></td></tr><tr><td><strong>payback</strong></td><td><code>Price of the LED ÷ ((Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb) - (LED power for the same light × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of the LED × Hours lit each day × 365 ÷ Life of the LED))</code></td></tr></tbody></table><p>Both yearly lines are energy plus bulbs: watts times hours over a thousand times the price, plus the bulb price times the hours in a year divided by the bulb's life. The payback divides the LED price by the difference between the two lines.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill. It reports old bulb, cost a year and lED, cost a year and saved a year and payback.</p><ul><li><strong>Old bulb power</strong> — W.</li><li><strong>LED power for the same light</strong> — W.</li><li><strong>Hours lit each day</strong> — h.</li><li><strong>Electricity price</strong> — $/kWh.</li><li><strong>Price of an old bulb</strong> — $.</li><li><strong>Life of an old bulb</strong> — h.</li><li><strong>Price of the LED</strong> — $.</li><li><strong>Life of the LED</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Old bulb, cost a year</strong> — $.</li><li><strong>LED, cost a year</strong> — $.</li><li><strong>Saved a year</strong> — $.</li><li><strong>Payback</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put old bulb power = 60 W, lED power for the same light = 9 W, hours lit each day = 5 h, electricity price = 0.15 $/kWh, price of an old bulb = 1 $, life of an old bulb = 1 000 h, price of the LED = 4 $, life of the LED = 15 000 h into the form and the panel reads:</p><ul><li><strong>Old bulb, cost a year</strong> = <code>Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb</code> = <strong>18.25 $</strong></li><li><strong>LED, cost a year</strong> = <code>LED power for the same light × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of the LED × Hours lit each day × 365 ÷ Life of the LED</code> = <strong>2.95 $</strong></li><li><strong>Saved a year</strong> = <code>(Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb) - (LED power for the same light × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of the LED × Hours lit each day × 365 ÷ Life of the LED)</code> = <strong>15.3 $</strong></li><li><strong>Payback</strong> = <code>Price of the LED ÷ ((Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb) - (LED power for the same light × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of the LED × Hours lit each day × 365 ÷ Life of the LED))</code> = <strong>0.261 years</strong></li></ul><p>Halve the hours and the saving halves with them, but the payback doubles: the bulb price is fixed and the energy saving is not.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>60 × 5 × 365 ÷ 1000 × 0.15 + 1 × 5 × 365 ÷ 1 000</code>, which comes to <strong>18.25 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 60 W bulb for five hours a day is 109.5 kWh a year, which is 16.43 dollars at 15 cents, plus 1.83 bulbs at a dollar. The LED uses 16.4 kWh, 2.46 dollars, plus a twelfth of a bulb. The saving is 15.30 a year and the four-dollar LED pays for itself in a quarter of a year.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Old bulb, cost a year</th><th>LED, cost a year</th><th>Saved a year</th><th>Payback</th></tr></thead><tbody><tr><td><strong>Old bulb power</strong> +10 %</td><td>+9 %</td><td>+0 %</td><td>+10.74 %</td><td>−9.69 %</td></tr><tr><td><strong>LED power for the same light</strong> +10 %</td><td>+0 %</td><td>+8.35 %</td><td>−1.61 %</td><td>+1.64 %</td></tr><tr><td><strong>Hours lit each day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Electricity price</strong> +10 %</td><td>+9 %</td><td>+8.35 %</td><td>+9.13 %</td><td>−8.36 %</td></tr><tr><td><strong>Price of an old bulb</strong> +10 %</td><td>+1 %</td><td>+0 %</td><td>+1.19 %</td><td>−1.18 %</td></tr><tr><td><strong>Life of an old bulb</strong> +10 %</td><td>−0.91 %</td><td>+0 %</td><td>−1.08 %</td><td>+1.1 %</td></tr><tr><td><strong>Price of the LED</strong> +10 %</td><td>+0 %</td><td>+1.65 %</td><td>−0.32 %</td><td>+10.35 %</td></tr><tr><td><strong>Life of the LED</strong> +10 %</td><td>+0 %</td><td>−1.5 %</td><td>+0.29 %</td><td>−0.29 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Old bulb power</strong>. <strong>Life of an old bulb</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Old bulb power</strong> opens at 60 W</li><li><strong>LED power for the same light</strong> opens at 9 W</li><li><strong>Hours lit each day</strong> opens at 5 h</li><li><strong>Electricity price</strong> opens at 0.15 $/kWh</li><li><strong>Price of an old bulb</strong> opens at 1 $</li><li><strong>Life of an old bulb</strong> opens at 1 000 h</li><li><strong>Price of the LED</strong> opens at 4 $</li><li><strong>Life of the LED</strong> opens at 15 000 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Old bulb power</th><th>Old bulb, cost a year</th><th>LED, cost a year</th><th>Saved a year</th><th>Payback</th></tr></thead><tbody><tr><td>30 W</td><td>10.037</td><td>2.95</td><td>7.087</td><td>0.564</td></tr><tr><td>60 W</td><td>18.25</td><td>2.95</td><td>15.3</td><td>0.261</td></tr><tr><td>120 W</td><td>34.675</td><td>2.95</td><td>31.725</td><td>0.126</td></tr><tr><td>300 W</td><td>83.95</td><td>2.95</td><td>81</td><td>0.049</td></tr><tr><td>600 W</td><td>166.075</td><td>2.95</td><td>163.125</td><td>0.025</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set old bulb power = 60, lED power for the same light = 9, hours lit each day = 10, electricity price = 0.15, price of an old bulb = 1, life of an old bulb = 1 000, price of the LED = 4, life of the LED = 15 000: <strong>Old bulb, cost a year</strong> = 36.5 $, <strong>LED, cost a year</strong> = 5.901 $, <strong>Saved a year</strong> = 30.599 $, <strong>Payback</strong> = 0.131 years. Doubling the hours doubles the yearly saving and halves the payback to about six weeks.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing watts without comparing light.</strong> A 9 W LED is not equivalent to a 60 W bulb by accident; the lumens are what match.</li><li><strong>Ignoring the bulbs.</strong> In a hallway used ten minutes a day, the energy saving is small and most of the LED's advantage is the bulb you do not replace.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One socket.</strong> A house is this multiplied by the number of sockets on the same pattern.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need old bulb power and lED power for the same light and hours lit each day and electricity price and price of an old bulb and life of an old bulb and price of the LED and life of the LED. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Old bulb, cost a year and led, cost a year and saved a year and payback should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether to replace working bulbs or wait for them to fail.</li></li><li><li>Costing a whole-floor switch to LED.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/lighting">Lighting calculator</a> <a href="/everyday-life/electricity-cost">Electricity cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Old bulb power</strong> ×10</td><td>18.25</td><td>166.075</td><td>×9.1</td></tr><tr><td><strong>LED power for the same light</strong> ×10</td><td>18.25</td><td>18.25</td><td>unchanged</td></tr><tr><td><strong>Hours lit each day</strong> ×10</td><td>18.25</td><td>182.5</td><td>ten times larger</td></tr><tr><td><strong>Electricity price</strong> ×10</td><td>18.25</td><td>166.075</td><td>×9.1</td></tr><tr><td><strong>Price of an old bulb</strong> ×10</td><td>18.25</td><td>34.675</td><td>×1.9</td></tr><tr><td><strong>Life of an old bulb</strong> ×10</td><td>18.25</td><td>16.608</td><td>×0.91</td></tr><tr><td><strong>Price of the LED</strong> ×10</td><td>18.25</td><td>18.25</td><td>unchanged</td></tr><tr><td><strong>Life of the LED</strong> ×10</td><td>18.25</td><td>18.25</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the LED Savings calculator work out?', 'a' => <<<'TXT'
            It returns old bulb, cost a year and lED, cost a year and saved a year and payback from old bulb power and lED power for the same light and hours lit each day and electricity price and price of an old bulb and life of an old bulb and price of the LED and life of the LED. The relationship is Old bulb power × Hours lit each day × 365 ÷ 1000 × Electricity price + Price of an old bulb × Hours lit each day × 365 ÷ Life of an old bulb.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Old bulb power (W), LED power for the same light (W), Hours lit each day (h), Electricity price ($/kWh), Price of an old bulb ($), Life of an old bulb (h), Price of the LED ($), Life of the LED (h). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: old bulb power in W; lED power for the same light in W; hours lit each day in h; electricity price in $/kWh; price of an old bulb in $; life of an old bulb in h; price of the LED in $; life of the LED in h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is the payback really under a year?', 'a' => 'For a bulb that runs several hours a day, yes. The payback is the LED\'s price divided by the yearly saving, and both numbers are small.'],
            ['q' => 'What about the heat a filament bulb gives off?', 'a' => 'In winter it is not entirely wasted and in summer it is. The page counts energy, which is the figure on the meter either way.'],
            ['q' => 'Do I need to know lumens?', 'a' => 'Not for this page. Put the LED wattage that matches the old bulb\'s light output; a 9 W LED typically replaces a 60 W filament.'],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/lighting', 'name' => 'Lighting calculator'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
