<?php

/**
 * Appliance Wattage Calculator
 * /everyday-life/appliance-wattage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Appliance Wattage Calculator',
    'meta' => ['title' => 'Appliance Wattage — Daily and Monthly Running Cost', 'description' => 'What one appliance costs to run: its wattage and the hours it runs turned into kilowatt-hours a day, a month and a year, and the money each of those costs.', 'h1' => 'Appliance Wattage Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'watts',
                    'label' => 'Appliance rating',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '2000',
                    'help' => 'The figure on the label or the plug. A kettle is about 2 000 W, a fridge compressor 150 W.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours used each day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'help' => 'Two hours a day for a heater, ten minutes for a kettle.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days used each month',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Electricity price',
                    'type' => 'number',
                    'suffix' => '$/kWh',
                    'default' => '0.15',
                    'help' => 'From the bill: the total divided by the kilowatt-hours.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'kwh_day',
                    'label' => 'Energy a day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'kwh_month',
                    'label' => 'Energy a month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'cost_day',
                    'label' => 'Cost a day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['kwh_day' => 'watts * hours / 1000', 'kwh_month' => 'watts * hours * days / 1000', 'cost_day' => 'watts * hours / 1000 * price', 'cost_year' => 'watts * hours * days * 12 / 1000 * price'],
    'article' => [
        'intro' => <<<'TXT'
        Watts and hours converted into kilowatt-hours, then into money. The unit on the bill is the kilowatt-hour, and an appliance rating is in watts, so a conversion always stands between the label and the cost.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The number on the appliance is watts. The number on the bill is kilowatt-hours. The gap between them is where most estimates go wrong, because a two-kilowatt heater run for one hour uses two kilowatt-hours and a two-kilowatt heater run for a quarter of an hour uses half of one.</p><p>This page does the conversion and puts a price on it. Two thousand watts for two hours is four kilowatt-hours a day, which is a hundred and twenty a month, which at fifteen cents is eighteen dollars.</p><p>The answer is <strong>energy a day and energy a month and cost a day and cost a year</strong>, worked out from appliance rating and hours used each day and days used each month and electricity price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kwh_day</strong></td><td><code>Appliance rating × Hours used each day ÷ 1000</code></td></tr><tr><td><strong>kwh_month</strong></td><td><code>Appliance rating × Hours used each day × Days used each month ÷ 1000</code></td></tr><tr><td><strong>cost_day</strong></td><td><code>Appliance rating × Hours used each day ÷ 1000 × Electricity price</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Appliance rating × Hours used each day × Days used each month × 12 ÷ 1000 × Electricity price</code></td></tr></tbody></table><p>Watts times hours divided by a thousand gives kilowatt-hours, because a kilowatt is a thousand watts and an hour is the unit of time the energy is counted over. The yearly line multiplies the month by twelve rather than by 365, so it matches the day count in the form.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports energy a day and energy a month and cost a day and cost a year.</p><ul><li><strong>Appliance rating</strong> — W. The figure on the label or the plug. A kettle is about 2 000 W, a fridge compressor 150 W.</li><li><strong>Hours used each day</strong> — h. Two hours a day for a heater, ten minutes for a kettle.</li><li><strong>Days used each month</strong> — days.</li><li><strong>Electricity price</strong> — $/kWh. From the bill: the total divided by the kilowatt-hours.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Energy a day</strong> — kWh.</li><li><strong>Energy a month</strong> — kWh.</li><li><strong>Cost a day</strong> — $.</li><li><strong>Cost a year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put appliance rating = 2 000 W, hours used each day = 2 h, days used each month = 30 days, electricity price = 0.15 $/kWh into the form and the panel reads:</p><ul><li><strong>Energy a day</strong> = <code>Appliance rating × Hours used each day ÷ 1000</code> = <strong>4 kWh</strong></li><li><strong>Energy a month</strong> = <code>Appliance rating × Hours used each day × Days used each month ÷ 1000</code> = <strong>120 kWh</strong></li><li><strong>Cost a day</strong> = <code>Appliance rating × Hours used each day ÷ 1000 × Electricity price</code> = <strong>0.6 $</strong></li><li><strong>Cost a year</strong> = <code>Appliance rating × Hours used each day × Days used each month × 12 ÷ 1000 × Electricity price</code> = <strong>216 $</strong></li></ul><p>Change the hours box to a quarter of an hour and watch the day figure fall to a kilowatt-hour while the yearly figure stays worth knowing.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2 000 × 2 ÷ 1000</code>, which comes to <strong>4 kWh</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>2 000 W for 2 hours a day is 4 kWh a day and 120 kWh a month. At 15 cents a kilowatt-hour that is 60 cents a day and 216 dollars a year: the same appliance, three very different numbers.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy a day</th><th>Energy a month</th><th>Cost a day</th><th>Cost a year</th></tr></thead><tbody><tr><td><strong>Appliance rating</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours used each day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Days used each month</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Electricity price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Electricity price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Appliance rating</strong> opens at 2 000 W — The figure on the label or the plug. A kettle is about 2 000 W, a fridge compressor 150 W.</li><li><strong>Hours used each day</strong> opens at 2 h — Two hours a day for a heater, ten minutes for a kettle.</li><li><strong>Days used each month</strong> opens at 30 days</li><li><strong>Electricity price</strong> opens at 0.15 $/kWh — From the bill: the total divided by the kilowatt-hours.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Appliance rating</th><th>Energy a day</th><th>Energy a month</th><th>Cost a day</th><th>Cost a year</th></tr></thead><tbody><tr><td>1 000 W</td><td>2</td><td>60</td><td>0.3</td><td>108</td></tr><tr><td>2 000 W</td><td>4</td><td>120</td><td>0.6</td><td>216</td></tr><tr><td>4 000 W</td><td>8</td><td>240</td><td>1.2</td><td>432</td></tr><tr><td>10 000 W</td><td>20</td><td>600</td><td>3</td><td>1 080</td></tr><tr><td>20 000 W</td><td>40</td><td>1 200</td><td>6</td><td>2 160</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set appliance rating = 150, hours used each day = 24, days used each month = 30, electricity price = 0.15: <strong>Energy a day</strong> = 3.6 kWh, <strong>Energy a month</strong> = 108 kWh, <strong>Cost a day</strong> = 0.54 $, <strong>Cost a year</strong> = 194.4 $. A fridge compressor at 150 W that runs all day costs about 54 cents a day: the hours matter more than the watts.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the wattage on the box as a running figure.</strong> An oven rated at 2 400 W cycles on and off; the energy used is lower than the rating suggests.</li><li><strong>Forgetting standby.</strong> A television that draws 12 W in standby for twenty-two hours a day uses more than it does while it is on.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One appliance.</strong> A whole house is the sum of these lines, one pass per appliance.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need appliance rating and hours used each day and days used each month and electricity price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Energy a day and energy a month and cost a day and cost a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a second-hand freezer is worth running.</li></li><li><li>Working out what an electric heater costs over a winter.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/electricity-cost-single-usage">Electricity cost, single use</a> <a href="/everyday-life/electricity-cost">Electricity cost</a> <a href="/everyday-life/led-savings">LED savings</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Appliance rating</strong> ×10</td><td>4</td><td>40</td><td>ten times larger</td></tr><tr><td><strong>Hours used each day</strong> ×10</td><td>4</td><td>40</td><td>ten times larger</td></tr><tr><td><strong>Days used each month</strong> ×10</td><td>4</td><td>4</td><td>unchanged</td></tr><tr><td><strong>Electricity price</strong> ×10</td><td>4</td><td>4</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Appliance Wattage calculator work out?', 'a' => <<<'TXT'
            It returns energy a day and energy a month and cost a day and cost a year from appliance rating and hours used each day and days used each month and electricity price. The relationship is Appliance rating × Hours used each day ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Appliance rating (W), Hours used each day (h), Days used each month (days), Electricity price ($/kWh). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: appliance rating in W; hours used each day in h; days used each month in days; electricity price in $/kWh. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why divide by 1 000?', 'a' => 'Because a kilowatt is a thousand watts and the bill counts kilowatts. Two thousand watts is two kilowatts, not two hundred.'],
            ['q' => 'Does the page know that appliances cycle?', 'a' => 'No. It assumes the appliance draws its rating for the hours you give. For anything with a thermostat, use the average draw rather than the peak.'],
            ['q' => 'What about a 12-volt appliance?', 'a' => 'The same arithmetic applies once the wattage is known. Amps times volts gives watts, and the page takes it from there.'],
        ],
        'related' => [
            ['path' => '/everyday-life/electricity-cost-single-usage', 'name' => 'Electricity cost, single use'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
