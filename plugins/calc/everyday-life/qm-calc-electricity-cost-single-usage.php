<?php

/**
 * Electricity Cost — Single Use Calculator
 * /everyday-life/electricity-cost-single-usage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Electricity Cost — Single Use Calculator',
    'meta' => ['title' => 'Electricity Cost of One Use — Watts, Hours, Money', 'description' => 'What a single use of a device costs: its wattage and the time it runs turned into kilowatt-hours and into money at your own rate, with the rate per use and per.', 'h1' => 'Electricity Cost — Single Use Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'watts',
                    'label' => 'Power',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '1500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Time it runs for',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per kilowatt-hour',
                    'type' => 'number',
                    'suffix' => '$/kWh',
                    'default' => '0.15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'kwh',
                    'label' => 'Energy used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of this use',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_hour',
                    'label' => 'Cost per hour of running',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['kwh' => 'watts * hours / 1000', 'cost' => 'watts * hours / 1000 * price', 'cost_hour' => 'watts / 1000 * price'],
    'article' => [
        'intro' => <<<'TXT'
        One run of one device, priced. The kettle, the iron, the tumble dryer: things that run for minutes and cost pennies, which is exactly why nobody estimates them well.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>One use is the honest unit for most appliances. A kettle runs for four minutes, an iron for twenty, a dryer for ninety, and none of them is best described by a monthly figure that assumes a pattern the household does not have.</p><p>The cost-per-hour line is the one to carry away. Once you know a device costs fifteen cents an hour to run, every other duration is a multiplication you can do in your head.</p><p>The answer is <strong>energy used and cost of this use and cost per hour of running</strong>, worked out from power and time it runs for and price per kilowatt-hour. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kwh</strong></td><td><code>Power × Time it runs for ÷ 1000</code></td></tr><tr><td><strong>cost</strong></td><td><code>Power × Time it runs for ÷ 1000 × Price per kilowatt-hour</code></td></tr><tr><td><strong>cost_hour</strong></td><td><code>Power ÷ 1000 × Price per kilowatt-hour</code></td></tr></tbody></table><p>Watts times hours over a thousand is the energy in kilowatt-hours; multiplied by the price it is the money. The per-hour line drops the hours box entirely, which is why it stays the same whatever duration you type.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports energy used and cost of this use and cost per hour of running.</p><ul><li><strong>Power</strong> — W.</li><li><strong>Time it runs for</strong> — h.</li><li><strong>Price per kilowatt-hour</strong> — $/kWh.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Energy used</strong> — kWh.</li><li><strong>Cost of this use</strong> — $.</li><li><strong>Cost per hour of running</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put power = 1 500 W, time it runs for = 3 h, price per kilowatt-hour = 0.15 $/kWh into the form and the panel reads:</p><ul><li><strong>Energy used</strong> = <code>Power × Time it runs for ÷ 1000</code> = <strong>4.5 kWh</strong></li><li><strong>Cost of this use</strong> = <code>Power × Time it runs for ÷ 1000 × Price per kilowatt-hour</code> = <strong>0.675 $</strong></li><li><strong>Cost per hour of running</strong> = <code>Power ÷ 1000 × Price per kilowatt-hour</code> = <strong>0.225 $</strong></li></ul><p>For a kettle, put 0.07 in the hours box: four minutes is seven hundredths of an hour, and the answer is about a cent and a half.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 500 × 3 ÷ 1000</code>, which comes to <strong>4.5 kWh</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 1 500 W appliance for three hours uses 4.5 kWh and costs 67.5 cents at 15 cents a unit. The per-hour line says 22.5 cents, and three hours of it is the same 67.5.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy used</th><th>Cost of this use</th><th>Cost per hour of running</th></tr></thead><tbody><tr><td><strong>Power</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Time it runs for</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Price per kilowatt-hour</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Power</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Power</strong> opens at 1 500 W</li><li><strong>Time it runs for</strong> opens at 3 h</li><li><strong>Price per kilowatt-hour</strong> opens at 0.15 $/kWh</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Power</th><th>Energy used</th><th>Cost of this use</th><th>Cost per hour of running</th></tr></thead><tbody><tr><td>750 W</td><td>2.25</td><td>0.337</td><td>0.112</td></tr><tr><td>1 500 W</td><td>4.5</td><td>0.675</td><td>0.225</td></tr><tr><td>3 000 W</td><td>9</td><td>1.35</td><td>0.45</td></tr><tr><td>7 500 W</td><td>22.5</td><td>3.375</td><td>1.125</td></tr><tr><td>15 000 W</td><td>45</td><td>6.75</td><td>2.25</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set power = 3 000, time it runs for = 0.07, price per kilowatt-hour = 0.15: <strong>Energy used</strong> = 0.21 kWh, <strong>Cost of this use</strong> = 0.032 $, <strong>Cost per hour of running</strong> = 0.45 $. A three-kilowatt kettle for four minutes is 0.21 kWh, about three cents: the reason kettles are not the problem.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Typing minutes into the hours box.</strong> Twenty minutes is 0.33, not 20. The result is otherwise sixty times too large.</li><li><strong>Using the peak rating for a cycling appliance.</strong> An oven that cycles at half duty uses half the energy its rating implies.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No standing charge.</strong> The page prices the energy, not the daily connection fee on the bill.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need power and time it runs for and price per kilowatt-hour. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Energy used and cost of this use and cost per hour of running should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Costing a single wash or a single bake.</li></li><li><li>Comparing two appliances at the same task.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/electricity-cost">Electricity cost</a> <a href="/everyday-life/hot-tub-cost">Hot tub cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Power</strong> ×10</td><td>4.5</td><td>45</td><td>ten times larger</td></tr><tr><td><strong>Time it runs for</strong> ×10</td><td>4.5</td><td>45</td><td>ten times larger</td></tr><tr><td><strong>Price per kilowatt-hour</strong> ×10</td><td>4.5</td><td>4.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Electricity Cost — Single Use calculator work out?', 'a' => <<<'TXT'
            It returns energy used and cost of this use and cost per hour of running from power and time it runs for and price per kilowatt-hour. The relationship is Power × Time it runs for ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Power (W), Time it runs for (h), Price per kilowatt-hour ($/kWh). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: power in W; time it runs for in h; price per kilowatt-hour in $/kWh. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How do I put minutes into the hours box?', 'a' => 'Divide by sixty. Ten minutes is 0.1667, half an hour is 0.5, and a quarter of an hour is 0.25.'],
            ['q' => 'Does this include tax and standing charges?', 'a' => 'No. Put the all-in price per kilowatt-hour from the bill in the price box and the answer carries the tax.'],
            ['q' => 'Why does the per-hour figure not change?', 'a' => 'Because it does not depend on the duration. It is the price of an hour of running, which is a property of the device and the tariff.'],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
            ['path' => '/everyday-life/hot-tub-cost', 'name' => 'Hot tub cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
