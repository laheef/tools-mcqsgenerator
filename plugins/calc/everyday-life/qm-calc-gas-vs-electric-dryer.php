<?php

/**
 * Gas vs Electric Dryer Calculator
 * /everyday-life/gas-vs-electric-dryer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gas vs Electric Dryer Calculator',
    'meta' => ['title' => 'Gas vs Electric Dryer — Running Cost a Year', 'description' => 'The yearly running cost of a gas dryer against an electric one, from loads a week, the energy each uses per load and the two tariffs. The formula is shown.', 'h1' => 'Gas vs Electric Dryer Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'loads',
                    'label' => 'Loads a week',
                    'type' => 'number',
                    'suffix' => 'loads',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'electric_kwh',
                    'label' => 'Electric dryer, energy a load',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'default' => '3.3',
                    'help' => 'A vented electric dryer is 3 to 4 kWh a load; a heat-pump dryer about 1.5.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gas_therms',
                    'label' => 'Gas dryer, energy a load',
                    'type' => 'number',
                    'suffix' => 'therms',
                    'default' => '0.16',
                    'help' => 'About 0.15 to 0.2 therms a load for a standard gas dryer.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'electric_price',
                    'label' => 'Electricity price',
                    'type' => 'number',
                    'suffix' => '$/kWh',
                    'default' => '0.15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gas_price',
                    'label' => 'Gas price',
                    'type' => 'number',
                    'suffix' => '$/therm',
                    'default' => '1.1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'electric_year',
                    'label' => 'Electric, a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'gas_year',
                    'label' => 'Gas, a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cheaper',
                    'label' => 'Yearly saving of the cheaper one',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_load',
                    'label' => 'Difference per load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['electric_year' => 'loads * 52 * electric_kwh * electric_price', 'gas_year' => 'loads * 52 * gas_therms * gas_price', 'cheaper' => 'abs(loads * 52 * electric_kwh * electric_price - loads * 52 * gas_therms * gas_price)', 'per_load' => 'abs(loads * 52 * electric_kwh * electric_price - loads * 52 * gas_therms * gas_price) / (loads * 52)'],
    'article' => [
        'intro' => 'Two dryers, one household, a year each. Electric in kilowatt-hours, gas in therms, and the two priced so the comparison is honest.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A tumble dryer is one of the few appliances still sold in two fuels, and the comparison is not obvious. Electricity is the more expensive unit but an electric dryer uses it efficiently; gas is cheaper per unit and comes out of a different meter, and the pipe, the vent and the price all vary.</p><p>This page puts both on the same footing: a year of the household's actual loads, each dryer's energy per load, and each fuel's own tariff. The answer is two yearly costs and the difference between them.</p><p>The answer is <strong>electric, a year and gas, a year and yearly saving of the cheaper one and difference per load</strong>, worked out from loads a week and electric dryer, energy a load and gas dryer, energy a load and electricity price and gas price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>electric_year</strong></td><td><code>Loads a week × 52 × Electric dryer, energy a load × Electricity price</code></td></tr><tr><td><strong>gas_year</strong></td><td><code>Loads a week × 52 × Gas dryer, energy a load × Gas price</code></td></tr><tr><td><strong>cheaper</strong></td><td><code>abs(Loads a week × 52 × Electric dryer, energy a load × Electricity price - Loads a week × 52 × Gas dryer, energy a load × Gas price)</code></td></tr><tr><td><strong>per_load</strong></td><td><code>abs(Loads a week × 52 × Electric dryer, energy a load × Electricity price - Loads a week × 52 × Gas dryer, energy a load × Gas price) ÷ (Loads a week × 52)</code></td></tr></tbody></table><p>Loads a week times fifty-two gives the yearly count, which multiplies each dryer's energy a load and its price. The saving is the absolute difference, and the per-load figure divides it back down.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports electric, a year and gas, a year and yearly saving of the cheaper one and difference per load.</p><ul><li><strong>Loads a week</strong> — loads.</li><li><strong>Electric dryer, energy a load</strong> — kWh. A vented electric dryer is 3 to 4 kWh a load; a heat-pump dryer about 1.5.</li><li><strong>Gas dryer, energy a load</strong> — therms. About 0.15 to 0.2 therms a load for a standard gas dryer.</li><li><strong>Electricity price</strong> — $/kWh.</li><li><strong>Gas price</strong> — $/therm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Electric, a year</strong> — $.</li><li><strong>Gas, a year</strong> — $.</li><li><strong>Yearly saving of the cheaper one</strong> — $.</li><li><strong>Difference per load</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put loads a week = 4 loads, electric dryer, energy a load = 3.3 kWh, gas dryer, energy a load = 0.16 therms, electricity price = 0.15 $/kWh, gas price = 1.1 $/therm into the form and the panel reads:</p><ul><li><strong>Electric, a year</strong> = <code>Loads a week × 52 × Electric dryer, energy a load × Electricity price</code> = <strong>102.96 $</strong></li><li><strong>Gas, a year</strong> = <code>Loads a week × 52 × Gas dryer, energy a load × Gas price</code> = <strong>36.608 $</strong></li><li><strong>Yearly saving of the cheaper one</strong> = <code>abs(Loads a week × 52 × Electric dryer, energy a load × Electricity price - Loads a week × 52 × Gas dryer, energy a load × Gas price)</code> = <strong>66.352 $</strong></li><li><strong>Difference per load</strong> = <code>abs(Loads a week × 52 × Electric dryer, energy a load × Electricity price - Loads a week × 52 × Gas dryer, energy a load × Gas price) ÷ (Loads a week × 52)</code> = <strong>0.319 $</strong></li></ul><p>The per-load figure is the one that survives a change in laundry habits: 32 cents is 64 dollars over two hundred loads.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>4 × 52 × 3.3 × 0.15</code>, which comes to <strong>102.96 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Four loads a week at 3.3 kWh is 686 kWh a year, which at fifteen cents is 102.96. The gas dryer uses 33.3 therms, which at 1.10 is 36.61. Gas is 66 dollars a year cheaper, or 32 cents a load.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Electric, a year</th><th>Gas, a year</th><th>Yearly saving of the cheaper one</th><th>Difference per load</th></tr></thead><tbody><tr><td><strong>Loads a week</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−3.48 × 10<sup>-14</sup> %</td></tr><tr><td><strong>Electric dryer, energy a load</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+15.52 %</td><td>+15.52 %</td></tr><tr><td><strong>Gas dryer, energy a load</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−5.52 %</td><td>−5.52 %</td></tr><tr><td><strong>Electricity price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+15.52 %</td><td>+15.52 %</td></tr><tr><td><strong>Gas price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−5.52 %</td><td>−5.52 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Electricity price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Loads a week</strong> opens at 4 loads</li><li><strong>Electric dryer, energy a load</strong> opens at 3.3 kWh — A vented electric dryer is 3 to 4 kWh a load; a heat-pump dryer about 1.5.</li><li><strong>Gas dryer, energy a load</strong> opens at 0.16 therms — About 0.15 to 0.2 therms a load for a standard gas dryer.</li><li><strong>Electricity price</strong> opens at 0.15 $/kWh</li><li><strong>Gas price</strong> opens at 1.1 $/therm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Loads a week</th><th>Electric, a year</th><th>Gas, a year</th><th>Yearly saving of the cheaper one</th><th>Difference per load</th></tr></thead><tbody><tr><td>2 loads</td><td>51.48</td><td>18.304</td><td>33.176</td><td>0.319</td></tr><tr><td>4 loads</td><td>102.96</td><td>36.608</td><td>66.352</td><td>0.319</td></tr><tr><td>8 loads</td><td>205.92</td><td>73.216</td><td>132.704</td><td>0.319</td></tr><tr><td>20 loads</td><td>514.8</td><td>183.04</td><td>331.76</td><td>0.319</td></tr><tr><td>40 loads</td><td>1 029.6</td><td>366.08</td><td>663.52</td><td>0.319</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set loads a week = 7, electric dryer, energy a load = 3.3, gas dryer, energy a load = 0.16, electricity price = 0.25, gas price = 1.1: <strong>Electric, a year</strong> = 300.3 $, <strong>Gas, a year</strong> = 64.064 $, <strong>Yearly saving of the cheaper one</strong> = 236.236 $, <strong>Difference per load</strong> = 0.649 $. At an expensive electricity tariff and seven loads a week the gap widens to about 207 dollars a year.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing a heat-pump dryer with a gas one.</strong> A heat pump uses about 1.5 kWh a load and beats gas on running cost in most markets.</li><li><strong>Ignoring the connection.</strong> A gas dryer needs a gas point and a vent, and the installation can cost more than years of the difference.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Running cost only.</strong> The purchase price, the installation and the venting are separate decisions.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need loads a week and electric dryer, energy a load and gas dryer, energy a load and electricity price and gas price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Electric, a year and gas, a year and yearly saving of the cheaper one and difference per load should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing between two dryers in a new kitchen.</li></li><li><li>Checking whether a heat-pump dryer is worth the extra cost.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/tesla-charging-cost">EV charging cost</a> <a href="/everyday-life/electricity-cost">Electricity cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Loads a week</strong> ×10</td><td>102.96</td><td>1 029.6</td><td>ten times larger</td></tr><tr><td><strong>Electric dryer, energy a load</strong> ×10</td><td>102.96</td><td>1 029.6</td><td>ten times larger</td></tr><tr><td><strong>Gas dryer, energy a load</strong> ×10</td><td>102.96</td><td>102.96</td><td>unchanged</td></tr><tr><td><strong>Electricity price</strong> ×10</td><td>102.96</td><td>1 029.6</td><td>ten times larger</td></tr><tr><td><strong>Gas price</strong> ×10</td><td>102.96</td><td>102.96</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gas vs Electric Dryer calculator work out?', 'a' => <<<'TXT'
            It returns electric, a year and gas, a year and yearly saving of the cheaper one and difference per load from loads a week and electric dryer, energy a load and gas dryer, energy a load and electricity price and gas price. The relationship is Loads a week × 52 × Electric dryer, energy a load × Electricity price.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Loads a week (loads), Electric dryer, energy a load (kWh), Gas dryer, energy a load (therms), Electricity price ($/kWh), Gas price ($/therm). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: loads a week in loads; electric dryer, energy a load in kWh; gas dryer, energy a load in therms; electricity price in $/kWh; gas price in $/therm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is gas always cheaper to run?', 'a' => 'Not always. A heat-pump dryer on a cheap overnight tariff can beat gas, and gas prices vary more than electricity between markets.'],
            ['q' => 'What is a therm?', 'a' => 'A hundred thousand British thermal units, or about 29.3 kilowatt-hours. Gas is billed in therms in the United States and in cubic metres in most of Europe.'],
            ['q' => 'Does a gas dryer vent differently?', 'a' => 'Yes: it needs its own vent for the products of combustion, which is a separate duct from the moist air one.'],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/tesla-charging-cost', 'name' => 'EV charging cost'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
