<?php

/**
 * EV Charging Cost Calculator
 * /everyday-life/tesla-charging-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EV Charging Cost Calculator',
    'meta' => ['title' => 'EV Charging Cost — Cost to Charge and Cost per', 'description' => 'What charging an electric car costs for a distance, from its consumption, the price of a unit and the losses of charging, with the cost per kilometre beside it.', 'h1' => 'EV Charging Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Distance',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '1000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'consumption',
                    'label' => 'Consumption',
                    'type' => 'number',
                    'suffix' => 'kWh/100 km',
                    'default' => '15',
                    'help' => 'A compact EV is about 15; a large one 20 to 25.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price of electricity',
                    'type' => 'number',
                    'suffix' => '$/kWh',
                    'default' => '0.15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Charging losses',
                    'type' => 'select',
                    'options' => ['10 % lost, home AC' => 90, '5 % lost, modern AC' => 95, '2 % lost, DC fast' => 98],
                    'control' => 'SELECT',
                    'default' => '10 % lost, home AC',
                ],
                [
                    'name' => 'kwh',
                    'label' => 'Energy needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'kwh_charged',
                    'label' => 'Energy to buy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of the distance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_km',
                    'label' => 'Cost per kilometre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['kwh' => 'distance * consumption / 100', 'kwh_charged' => 'distance * consumption / 100 / (efficiency / 100)', 'cost' => 'distance * consumption / 100 / (efficiency / 100) * price', 'cost_km' => 'consumption / 100 / (efficiency / 100) * price'],
    'article' => [
        'intro' => <<<'TXT'
        Distance, consumption in kilowatt-hours per hundred kilometres, and the tariff, turned into the cost of the drive. Charging losses are a box of their own because they are real and easily forgotten.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An electric car's running cost is a multiplication and a division. Consumption in kilowatt-hours per hundred kilometres says how much energy the car takes from the battery to go a hundred; the tariff says what a unit costs; and charging efficiency says how many units have to come out of the wall to put those into the battery.</p><p>The cost-per-kilometre line is the one that compares with a petrol car, and it is the figure that stays right whatever distance you type.</p><p>The answer is <strong>energy needed and energy to buy and cost of the distance and cost per kilometre</strong>, worked out from distance and consumption and price of electricity and charging losses. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kwh</strong></td><td><code>Distance × Consumption ÷ 100</code></td></tr><tr><td><strong>kwh_charged</strong></td><td><code>Distance × Consumption ÷ 100 ÷ (Charging losses ÷ 100)</code></td></tr><tr><td><strong>cost</strong></td><td><code>Distance × Consumption ÷ 100 ÷ (Charging losses ÷ 100) × Price of electricity</code></td></tr><tr><td><strong>cost_km</strong></td><td><code>Consumption ÷ 100 ÷ (Charging losses ÷ 100) × Price of electricity</code></td></tr></tbody></table><p>Distance times consumption over a hundred gives the energy the car uses. Dividing by the charging efficiency adds the losses, and multiplying by the price gives the money. The per-kilometre line drops the distance entirely.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports energy needed and energy to buy and cost of the distance and cost per kilometre.</p><ul><li><strong>Distance</strong> — km.</li><li><strong>Consumption</strong> — kWh/100 km. A compact EV is about 15; a large one 20 to 25.</li><li><strong>Price of electricity</strong> — $/kWh.</li><li><strong>Charging losses</strong>. A choice: 10 % lost, home AC, 5 % lost, modern AC, 2 % lost, DC fast.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Energy needed</strong> — kWh.</li><li><strong>Energy to buy</strong> — kWh.</li><li><strong>Cost of the distance</strong> — $.</li><li><strong>Cost per kilometre</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 1 000 km, consumption = 15 kWh/100 km, price of electricity = 0.15 $/kWh, charging losses = 90 into the form and the panel reads:</p><ul><li><strong>Energy needed</strong> = <code>Distance × Consumption ÷ 100</code> = <strong>150 kWh</strong></li><li><strong>Energy to buy</strong> = <code>Distance × Consumption ÷ 100 ÷ (Charging losses ÷ 100)</code> = <strong>166.667 kWh</strong></li><li><strong>Cost of the distance</strong> = <code>Distance × Consumption ÷ 100 ÷ (Charging losses ÷ 100) × Price of electricity</code> = <strong>25 $</strong></li><li><strong>Cost per kilometre</strong> = <code>Consumption ÷ 100 ÷ (Charging losses ÷ 100) × Price of electricity</code> = <strong>0.025 $</strong></li></ul><p>Public rapid charging costs two to three times a home tariff, so put the public price in the same box to see the difference.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 000 × 15 ÷ 100</code>, which comes to <strong>150 kWh</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A thousand kilometres at 15 kWh per hundred is 150 kWh from the battery, or 166.7 kWh bought at 90 per cent efficiency, which at fifteen cents is 25 dollars, or 2.5 cents a kilometre.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy needed</th><th>Energy to buy</th><th>Cost of the distance</th><th>Cost per kilometre</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Consumption</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price of electricity</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Charging losses</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Distance</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 1 000 km</li><li><strong>Consumption</strong> opens at 15 kWh/100 km — A compact EV is about 15; a large one 20 to 25.</li><li><strong>Price of electricity</strong> opens at 0.15 $/kWh</li><li><strong>Charging losses</strong> opens at 90</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Energy needed</th><th>Energy to buy</th><th>Cost of the distance</th><th>Cost per kilometre</th></tr></thead><tbody><tr><td>500 km</td><td>75</td><td>83.333</td><td>12.5</td><td>0.025</td></tr><tr><td>1 000 km</td><td>150</td><td>166.667</td><td>25</td><td>0.025</td></tr><tr><td>2 000 km</td><td>300</td><td>333.333</td><td>50</td><td>0.025</td></tr><tr><td>5 000 km</td><td>750</td><td>833.333</td><td>125</td><td>0.025</td></tr><tr><td>10 000 km</td><td>1 500</td><td>1 666.667</td><td>250</td><td>0.025</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 1 000, consumption = 15, price of electricity = 0.15, charging losses = 98: <strong>Energy needed</strong> = 150 kWh, <strong>Energy to buy</strong> = 153.061 kWh, <strong>Cost of the distance</strong> = 22.959 $, <strong>Cost per kilometre</strong> = 0.023 $. A DC fast charger loses less, so the same drive costs 22.96 rather than 25: a small difference that compounds over a year.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ignoring charging losses.</strong> A tenth of the energy is lost as heat in the charger and the battery, and it is paid for at the meter.</li><li><strong>Mixing units.</strong> Consumption is per hundred kilometres and distance is in kilometres; per mile figures need the distance converted first.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No idle fees or connection charges.</strong> The page prices energy, not the parking.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and consumption and price of electricity and charging losses. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Energy needed and energy to buy and cost of the distance and cost per kilometre should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing an electric commute with a petrol one.</li></li><li><li>Costing a long drive on public rapid chargers.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/battery-charge-time">Battery charge time</a> <a href="/everyday-life/fuel-cost">Fuel cost</a> <a href="/everyday-life/gas-vs-electric-dryer">Gas vs electric dryer</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>150</td><td>1 500</td><td>ten times larger</td></tr><tr><td><strong>Consumption</strong> ×10</td><td>150</td><td>1 500</td><td>ten times larger</td></tr><tr><td><strong>Price of electricity</strong> ×10</td><td>150</td><td>150</td><td>unchanged</td></tr><tr><td><strong>Charging losses</strong> ×10</td><td>150</td><td>150</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EV Charging Cost calculator work out?', 'a' => <<<'TXT'
            It returns energy needed and energy to buy and cost of the distance and cost per kilometre from distance and consumption and price of electricity and charging losses. The relationship is Distance × Consumption ÷ 100.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (km), Consumption (kWh/100 km), Price of electricity ($/kWh), Charging losses. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: distance in km; consumption in kWh/100 km; price of electricity in $/kWh. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the energy to buy more than the energy used?', 'a' => 'Because charging is not free of losses. About a tenth goes as heat in an AC charge, and it is measured at the meter rather than at the battery.'],
            ['q' => 'What consumption should I use?', 'a' => 'The car\'s own figure for mixed driving, or the winter figure if the question is about the worst month. Cold weather adds twenty per cent or more.'],
            ['q' => 'Does this work for a plug-in hybrid?', 'a' => 'For the electric part of its driving, yes. The petrol side needs its own arithmetic.'],
        ],
        'related' => [
            ['path' => '/everyday-life/battery-charge-time', 'name' => 'Battery charge time'],
            ['path' => '/everyday-life/fuel-cost', 'name' => 'Fuel cost'],
            ['path' => '/everyday-life/gas-vs-electric-dryer', 'name' => 'Gas vs electric dryer'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
