<?php

/**
 * Shower Cost Calculator
 * /everyday-life/shower-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shower Cost Calculator',
    'meta' => ['title' => 'Shower Cost — Heating Water, per Shower and a Year', 'description' => 'What a shower costs in energy: flow rate, duration and the rise from cold to hot, turned into kilowatt-hours and money for one shower and for a household year.', 'h1' => 'Shower Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'flow',
                    'label' => 'Shower flow rate',
                    'type' => 'number',
                    'suffix' => 'L/min',
                    'default' => '9',
                    'help' => 'A modern head is 8 to 10; an old one is 15 or more.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Shower length',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'people',
                    'label' => 'People showering a day',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Temperature rise',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '30',
                    'help' => 'Mains comes in at about 10 to 15 degrees and a shower runs at 38 to 40.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'heater',
                    'label' => 'Water heating',
                    'type' => 'select',
                    'options' => ['Electric immersion, 100 %' => 100, 'Gas boiler, 90 %' => 90, 'Heat pump, 300 %' => 300],
                    'control' => 'SELECT',
                    'default' => 'Electric immersion, 100 %',
                ],
                [
                    'name' => 'price',
                    'label' => 'Price of a unit',
                    'type' => 'number',
                    'suffix' => '$/kWh',
                    'default' => '0.15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'litres',
                    'label' => 'Litres a shower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'kwh',
                    'label' => 'Energy a shower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'cost_shower',
                    'label' => 'Cost of one shower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Household, a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['litres' => 'flow * minutes', 'kwh' => 'flow * minutes * 4.186 * rise / (3600 * heater / 100)', 'cost_shower' => 'flow * minutes * 4.186 * rise / (3600 * heater / 100) * price', 'cost_year' => 'flow * minutes * people * 4.186 * rise / (3600 * heater / 100) * price * 365'],
    'article' => [
        'intro' => <<<'TXT'
        The physics of heating water, priced. Litres a minute times minutes gives litres; litres times degrees of rise times 4.186 gives kilojoules; and the answer needs a boiler efficiency and a tariff.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A shower costs almost nothing but the water heating, and the water heating is a real amount of energy. Raising a litre of water by one degree takes 4.186 kilojoules, which is why a kilogram of water is the definition the calorie was built on.</p><p>Nine litres a minute for eight minutes is seventy-two litres. Thirty degrees of rise on seventy-two litres is about nine megajoules, which is 2.5 kilowatt-hours, which is about 37 cents. The rest of the page is that multiplication at other durations and other boiler efficiencies.</p><p>The answer is <strong>litres a shower and energy a shower and cost of one shower and household, a year</strong>, worked out from shower flow rate and shower length and people showering a day and temperature rise and water heating and price of a unit. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>litres</strong></td><td><code>Shower flow rate × Shower length</code></td></tr><tr><td><strong>kwh</strong></td><td><code>Shower flow rate × Shower length × 4.186 × Temperature rise ÷ (3600 × Water heating ÷ 100)</code></td></tr><tr><td><strong>cost_shower</strong></td><td><code>Shower flow rate × Shower length × 4.186 × Temperature rise ÷ (3600 × Water heating ÷ 100) × Price of a unit</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Shower flow rate × Shower length × People showering a day × 4.186 × Temperature rise ÷ (3600 × Water heating ÷ 100) × Price of a unit × 365</code></td></tr></tbody></table><p>Litres times 4.186 kilojoules per kilogram-degree times the rise gives kilojoules; dividing by 3 600 gives kilowatt-hours. The boiler efficiency divides in, because a heat pump moves more heat than the electricity it uses and a gas boiler loses some up the flue.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports litres a shower and energy a shower and cost of one shower and household, a year.</p><ul><li><strong>Shower flow rate</strong> — L/min. A modern head is 8 to 10; an old one is 15 or more.</li><li><strong>Shower length</strong> — min.</li><li><strong>People showering a day</strong> — people.</li><li><strong>Temperature rise</strong> — °C. Mains comes in at about 10 to 15 degrees and a shower runs at 38 to 40.</li><li><strong>Water heating</strong>. A choice: Electric immersion, 100 %, Gas boiler, 90 %, Heat pump, 300 %.</li><li><strong>Price of a unit</strong> — $/kWh.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Litres a shower</strong> — L.</li><li><strong>Energy a shower</strong> — kWh.</li><li><strong>Cost of one shower</strong> — $.</li><li><strong>Household, a year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put shower flow rate = 9 L/min, shower length = 8 min, people showering a day = 2 people, temperature rise = 30 °C, water heating = 100, price of a unit = 0.15 $/kWh into the form and the panel reads:</p><ul><li><strong>Litres a shower</strong> = <code>Shower flow rate × Shower length</code> = <strong>72 L</strong></li><li><strong>Energy a shower</strong> = <code>Shower flow rate × Shower length × 4.186 × Temperature rise ÷ (3600 × Water heating ÷ 100)</code> = <strong>2.512 kWh</strong></li><li><strong>Cost of one shower</strong> = <code>Shower flow rate × Shower length × 4.186 × Temperature rise ÷ (3600 × Water heating ÷ 100) × Price of a unit</code> = <strong>0.377 $</strong></li><li><strong>Household, a year</strong> = <code>Shower flow rate × Shower length × People showering a day × 4.186 × Temperature rise ÷ (3600 × Water heating ÷ 100) × Price of a unit × 365</code> = <strong>275.02 $</strong></li></ul><p>Cutting the shower to five minutes saves the household about a third of that yearly figure, which is more than most tariff switching.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Nine litres a minute for eight minutes is 72 litres at 38 per cent of the energy of a kilogram each. Thirty degrees of rise and an immersion heater gives 2.51 kWh and 37.7 cents a shower; two people daily is 275 dollars a year.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Litres a shower</th><th>Energy a shower</th><th>Cost of one shower</th><th>Household, a year</th></tr></thead><tbody><tr><td><strong>Shower flow rate</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Shower length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>People showering a day</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Temperature rise</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Water heating</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Price of a unit</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Shower flow rate</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Shower flow rate</strong> opens at 9 L/min — A modern head is 8 to 10; an old one is 15 or more.</li><li><strong>Shower length</strong> opens at 8 min</li><li><strong>People showering a day</strong> opens at 2 people</li><li><strong>Temperature rise</strong> opens at 30 °C — Mains comes in at about 10 to 15 degrees and a shower runs at 38 to 40.</li><li><strong>Water heating</strong> opens at 100</li><li><strong>Price of a unit</strong> opens at 0.15 $/kWh</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Shower flow rate</th><th>Litres a shower</th><th>Energy a shower</th><th>Cost of one shower</th><th>Household, a year</th></tr></thead><tbody><tr><td>4.5 L/min</td><td>36</td><td>1.256</td><td>0.188</td><td>137.51</td></tr><tr><td>9 L/min</td><td>72</td><td>2.512</td><td>0.377</td><td>275.02</td></tr><tr><td>18 L/min</td><td>144</td><td>5.023</td><td>0.753</td><td>550.04</td></tr><tr><td>45 L/min</td><td>360</td><td>12.558</td><td>1.884</td><td>1 375.101</td></tr><tr><td>90 L/min</td><td>720</td><td>25.116</td><td>3.767</td><td>2 750.202</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set shower flow rate = 9, shower length = 5, people showering a day = 2, temperature rise = 30, water heating = 100, price of a unit = 0.15: <strong>Litres a shower</strong> = 45 L, <strong>Energy a shower</strong> = 1.57 kWh, <strong>Cost of one shower</strong> = 0.235 $, <strong>Household, a year</strong> = 171.888 $. Five minutes instead of eight is 1.57 kWh and 23.6 cents a shower: a third off for three minutes of the day.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ignoring the rise.</strong> Adding three litres a minute of cold water to make the shower comfortable does not remove the energy needed to heat the rest.</li><li><strong>Assuming the boiler is 100 per cent.</strong> A condensing gas boiler is about 90 and a heat pump about 300, and the tariff is per kilowatt-hour either way, so the two give very different bills.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Heating energy only.</strong> The water itself, the sewerage and the standing charge are not in the price box.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need shower flow rate and shower length and people showering a day and temperature rise and water heating and price of a unit. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Litres a shower and energy a shower and cost of one shower and household, a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a lower-flow head is worth fitting.</li></li><li><li>Working out what a long shower costs the household over a year.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hot-tub-cost">Hot tub cost</a> <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/electricity-cost">Electricity cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Shower flow rate</strong> ×10</td><td>72</td><td>720</td><td>ten times larger</td></tr><tr><td><strong>Shower length</strong> ×10</td><td>72</td><td>720</td><td>ten times larger</td></tr><tr><td><strong>People showering a day</strong> ×10</td><td>72</td><td>72</td><td>unchanged</td></tr><tr><td><strong>Temperature rise</strong> ×10</td><td>72</td><td>72</td><td>unchanged</td></tr><tr><td><strong>Water heating</strong> ×10</td><td>72</td><td>72</td><td>unchanged</td></tr><tr><td><strong>Price of a unit</strong> ×10</td><td>72</td><td>72</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Shower Cost calculator work out?', 'a' => <<<'TXT'
            It returns litres a shower and energy a shower and cost of one shower and household, a year from shower flow rate and shower length and people showering a day and temperature rise and water heating and price of a unit. The relationship is Shower flow rate × Shower length.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Shower flow rate (L/min), Shower length (min), People showering a day (people), Temperature rise (°C), Water heating, Price of a unit ($/kWh). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: shower flow rate in L/min; shower length in min; people showering a day in people; temperature rise in °C; price of a unit in $/kWh. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why 4.186?', 'a' => 'Because it takes 4.186 kilojoules to raise one kilogram of water by one degree Celsius. A litre of water is a kilogram, near enough.'],
            ['q' => 'What temperature does mains water come in at?', 'a' => 'About 10 to 15 degrees in a temperate climate and colder in winter, which is why the rise box is worth changing with the season.'],
            ['q' => 'Is a heat pump really 300 per cent?', 'a' => <<<'TXT'
            It moves heat rather than making it, so a kilowatt-hour of electricity delivers about three kilowatt-hours of heat to the water. The tariff is per unit of electricity, which is why the answer falls.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/hot-tub-cost', 'name' => 'Hot tub cost'],
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
