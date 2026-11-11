<?php

/**
 * Hot Tub Cost Calculator
 * /everyday-life/hot-tub-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hot Tub Cost Calculator',
    'meta' => ['title' => 'Hot Tub Cost — Electricity a Month and a Year', 'description' => 'What a hot tub costs to run: its heater\'s power, the hours it runs a day and the price of a unit, as a daily, monthly and yearly figure. The formula is shown.', 'h1' => 'Hot Tub Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'power',
                    'label' => 'Heater power',
                    'type' => 'number',
                    'suffix' => 'kW',
                    'default' => '2.5',
                    'help' => 'A 2.5 kW heater is typical for a four-person tub; check the plate on the control box.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours the heater runs a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3',
                    'help' => 'Not the hours the tub is on: the hours the heater is actually heating.',
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
                    'name' => 'days',
                    'label' => 'Days a month',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '30',
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
                    'name' => 'cost_month',
                    'label' => 'Cost a month',
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
    'formula' => ['kwh_day' => 'power * hours', 'cost_month' => 'power * hours * days * price', 'cost_year' => 'power * hours * days * 12 * price'],
    'article' => [
        'intro' => 'A hot tub\'s electricity, three ways. The heater is the load, the hours are what the thermostat decides, and the monthly figure is the one that surprises people.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A hot tub is a heater in a bucket, and a heater in a bucket runs more than people expect. The pump is a few hundred watts; the heater is two or three kilowatts, and it holds the water at thirty-eight degrees whether anybody is in it or not.</p><p>The hours box is the honest input and the hard one. A covered tub in a warm month might heat for an hour a day and an uncovered one in January for six. The page does the multiplication once you have the figure.</p><p>The answer is <strong>energy a day and cost a month and cost a year</strong>, worked out from heater power and hours the heater runs a day and electricity price and days a month. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kwh_day</strong></td><td><code>Heater power × Hours the heater runs a day</code></td></tr><tr><td><strong>cost_month</strong></td><td><code>Heater power × Hours the heater runs a day × Days a month × Electricity price</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Heater power × Hours the heater runs a day × Days a month × 12 × Electricity price</code></td></tr></tbody></table><p>Kilowatts times hours is kilowatt-hours, which is the unit the bill counts. The month is that times the days and the price; the year is the month times twelve.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports energy a day and cost a month and cost a year.</p><ul><li><strong>Heater power</strong> — kW. A 2.5 kW heater is typical for a four-person tub; check the plate on the control box.</li><li><strong>Hours the heater runs a day</strong> — h. Not the hours the tub is on: the hours the heater is actually heating.</li><li><strong>Electricity price</strong> — $/kWh.</li><li><strong>Days a month</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Energy a day</strong> — kWh.</li><li><strong>Cost a month</strong> — $.</li><li><strong>Cost a year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put heater power = 2.5 kW, hours the heater runs a day = 3 h, electricity price = 0.15 $/kWh, days a month = 30 days into the form and the panel reads:</p><ul><li><strong>Energy a day</strong> = <code>Heater power × Hours the heater runs a day</code> = <strong>7.5 kWh</strong></li><li><strong>Cost a month</strong> = <code>Heater power × Hours the heater runs a day × Days a month × Electricity price</code> = <strong>33.75 $</strong></li><li><strong>Cost a year</strong> = <code>Heater power × Hours the heater runs a day × Days a month × 12 × Electricity price</code> = <strong>405 $</strong></li></ul><p>Halve the hours and the yearly cost halves with them. A cover is cheaper than a tariff change.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2.5 × 3</code>, which comes to <strong>7.5 kWh</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>2.5 kW for three hours a day is 7.5 kWh a day, which at fifteen cents is 33.75 a month and 405 a year. The heater is the whole cost; the pump adds a few dollars.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy a day</th><th>Cost a month</th><th>Cost a year</th></tr></thead><tbody><tr><td><strong>Heater power</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours the heater runs a day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Electricity price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Days a month</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Heater power</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Heater power</strong> opens at 2.5 kW — A 2.5 kW heater is typical for a four-person tub; check the plate on the control box.</li><li><strong>Hours the heater runs a day</strong> opens at 3 h — Not the hours the tub is on: the hours the heater is actually heating.</li><li><strong>Electricity price</strong> opens at 0.15 $/kWh</li><li><strong>Days a month</strong> opens at 30 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Heater power</th><th>Energy a day</th><th>Cost a month</th><th>Cost a year</th></tr></thead><tbody><tr><td>1.25 kW</td><td>3.75</td><td>16.875</td><td>202.5</td></tr><tr><td>2.5 kW</td><td>7.5</td><td>33.75</td><td>405</td></tr><tr><td>5 kW</td><td>15</td><td>67.5</td><td>810</td></tr><tr><td>12.5 kW</td><td>37.5</td><td>168.75</td><td>2 025</td></tr><tr><td>25 kW</td><td>75</td><td>337.5</td><td>4 050</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set heater power = 2.5, hours the heater runs a day = 6, electricity price = 0.15, days a month = 30: <strong>Energy a day</strong> = 15 kWh, <strong>Cost a month</strong> = 67.5 $, <strong>Cost a year</strong> = 810 $. A winter month at six hours a day doubles the bill to 67.50, which is the figure people actually meet.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the tub's total rating.</strong> Heater, pump and blower together are not all running at once; only the heater matters for the bill.</li><li><strong>Forgetting the winter.</strong> The average hides a winter of six hours a day behind a summer of one.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Heater only.</strong> The circulating pump adds a small continuous load that this page does not count.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need heater power and hours the heater runs a day and electricity price and days a month. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Energy a day and cost a month and cost a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether to run a tub through winter.</li></li><li><li>Comparing a cover's effect on a bill.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/electricity-cost-single-usage">Electricity cost, single use</a> <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/shower-cost">Shower cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Heater power</strong> ×10</td><td>7.5</td><td>75</td><td>ten times larger</td></tr><tr><td><strong>Hours the heater runs a day</strong> ×10</td><td>7.5</td><td>75</td><td>ten times larger</td></tr><tr><td><strong>Electricity price</strong> ×10</td><td>7.5</td><td>7.5</td><td>unchanged</td></tr><tr><td><strong>Days a month</strong> ×10</td><td>7.5</td><td>7.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hot Tub Cost calculator work out?', 'a' => <<<'TXT'
            It returns energy a day and cost a month and cost a year from heater power and hours the heater runs a day and electricity price and days a month. The relationship is Heater power × Hours the heater runs a day.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Heater power (kW), Hours the heater runs a day (h), Electricity price ($/kWh), Days a month (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: heater power in kW; hours the heater runs a day in h; electricity price in $/kWh; days a month in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the heater on when nobody is in the tub?', 'a' => 'Because the thermostat holds the temperature. Some owners schedule lower temperatures for the working week, which cuts the hours box.'],
            ['q' => 'Does a cover make a difference?', 'a' => 'A large one: an uncovered tub loses heat from the surface and the heater runs far more hours to hold the same temperature.'],
            ['q' => 'Is this the whole bill?', 'a' => 'No. It is the heater. The pump, the light and the ozone generator are separate small loads.'],
        ],
        'related' => [
            ['path' => '/everyday-life/electricity-cost-single-usage', 'name' => 'Electricity cost, single use'],
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/shower-cost', 'name' => 'Shower cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
