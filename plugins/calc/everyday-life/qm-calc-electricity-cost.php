<?php

/**
 * Electricity Cost Calculator
 * /everyday-life/electricity-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Electricity Cost Calculator',
    'meta' => ['title' => 'Electricity Cost Calculator — Watts to Bill', 'description' => 'Enter an appliance\'s wattage, how long it runs and your price per kWh, and the page returns the energy it uses and what that energy costs per day and per year.', 'h1' => 'Electricity Cost Calculator', 'updated' => '2026-10-23'],
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
                    'help' => 'The wattage on the label or in the manual.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours used per day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'help' => 'How long it runs on an average day.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days per year',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '365',
                    'help' => 'Use 365, or fewer for a seasonal appliance.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price of electricity',
                    'type' => 'number',
                    'suffix' => 'per kWh',
                    'default' => '0.28',
                    'help' => 'Your tariff, per kilowatt-hour. Check a recent bill rather than a memory.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'kwh_day',
                    'label' => 'Energy per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'kwh_year',
                    'label' => 'Energy per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'cost_day',
                    'label' => 'Cost per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Cost per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['kwh_day' => 'watts / 1000 * hours', 'kwh_year' => 'watts / 1000 * hours * days', 'cost_day' => 'watts / 1000 * hours * price', 'cost_year' => 'watts / 1000 * hours * days * price'],
    'article' => [
        'intro' => <<<'TXT'
        An appliance's cost is its power in kilowatts multiplied by the hours it runs, multiplied again by the price of a kilowatt-hour. The page does that in three steps and shows each one, so you can see whether the daily figure or the yearly one is the one that should worry you.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A kilowatt-hour is one kilowatt for one hour: a 1 000 W heater running for sixty minutes has used exactly one. Everything on this page follows from that sentence. The wattage is divided by a thousand to turn it into kilowatts, multiplied by the hours, and multiplied by the price.</p><p>The yearly figure is the one to compare against a bill. The daily figure is the one to compare against a habit.</p><p>The answer is <strong>energy per day and energy per year and cost per day and cost per year</strong>, worked out from power and hours used per day and days per year and price of electricity. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kwh_day</strong></td><td><code>Power ÷ 1000 × Hours used per day</code></td></tr><tr><td><strong>kwh_year</strong></td><td><code>Power ÷ 1000 × Hours used per day × Days per year</code></td></tr><tr><td><strong>cost_day</strong></td><td><code>Power ÷ 1000 × Hours used per day × Price of electricity</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Power ÷ 1000 × Hours used per day × Days per year × Price of electricity</code></td></tr></tbody></table><p>The two cost lines are the energy lines multiplied by the tariff, so cost per day is cost per year divided by the number of days. If those two disagree, a box has been typed in the wrong place.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports energy per day and energy per year and cost per day and cost per year.</p><ul><li><strong>Power</strong> — W. The wattage on the label or in the manual.</li><li><strong>Hours used per day</strong> — h. How long it runs on an average day.</li><li><strong>Days per year</strong> — days. Use 365, or fewer for a seasonal appliance.</li><li><strong>Price of electricity</strong> — per kWh. Your tariff, per kilowatt-hour. Check a recent bill rather than a memory.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Energy per day</strong> — kWh.</li><li><strong>Energy per year</strong> — kWh.</li><li><strong>Cost per day</strong>.</li><li><strong>Cost per year</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put power = 1 500 W, hours used per day = 2 h, days per year = 365 days, price of electricity = 0.28 per kWh into the form and the panel reads:</p><ul><li><strong>Energy per day</strong> = <code>Power ÷ 1000 × Hours used per day</code> = <strong>3 kWh</strong></li><li><strong>Energy per year</strong> = <code>Power ÷ 1000 × Hours used per day × Days per year</code> = <strong>1 095 kWh</strong></li><li><strong>Cost per day</strong> = <code>Power ÷ 1000 × Hours used per day × Price of electricity</code> = <strong>0.84</strong></li><li><strong>Cost per year</strong> = <code>Power ÷ 1000 × Hours used per day × Days per year × Price of electricity</code> = <strong>306.6</strong></li></ul><p>Standby power is the same arithmetic with a small wattage and 24 hours: 10 W left on all year is 87.6 kWh, which is real money for doing nothing.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 500 ÷ 1000 × 2</code>, which comes to <strong>3 kWh</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 1 500 W appliance for two hours a day is 3 kWh a day. At 0.28 per kWh that is 0.84 a day, or about 307 a year. Whether that is a lot depends on the appliance: a kettle used twice a day is not a tumble dryer used twice a day, even when the wattages are similar, because the hours are not.</p><table class="calc-table"><thead><tr><th>Range</th><th>What it usually means</th></tr></thead><tbody><tr><td><strong>Under 100 kWh a year</strong></td><td>A small always-on device.</td></tr><tr><td><strong>300–800 kWh a year</strong></td><td>A large appliance used daily.</td></tr><tr><td><strong>Over 2 000 kWh a year</strong></td><td>Heating, cooling or hot water.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy per day</th><th>Energy per year</th><th>Cost per day</th><th>Cost per year</th></tr></thead><tbody><tr><td><strong>Power</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours used per day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Days per year</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Price of electricity</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The hours box and the price box move the cost in the same proportion, which is why the table shows the same percentage twice.</p><p>The box the answer leans on hardest is <strong>Days per year</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Power</strong> opens at 1 500 W — The wattage on the label or in the manual.</li><li><strong>Hours used per day</strong> opens at 2 h — How long it runs on an average day.</li><li><strong>Days per year</strong> opens at 365 days — Use 365, or fewer for a seasonal appliance.</li><li><strong>Price of electricity</strong> opens at 0.28 per kWh — Your tariff, per kilowatt-hour. Check a recent bill rather than a memory.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Power</th><th>Energy per day</th><th>Energy per year</th><th>Cost per day</th><th>Cost per year</th></tr></thead><tbody><tr><td>750 W</td><td>1.5</td><td>547.5</td><td>0.42</td><td>153.3</td></tr><tr><td>1 500 W</td><td>3</td><td>1 095</td><td>0.84</td><td>306.6</td></tr><tr><td>3 000 W</td><td>6</td><td>2 190</td><td>1.68</td><td>613.2</td></tr><tr><td>7 500 W</td><td>15</td><td>5 475</td><td>4.2</td><td>1 533</td></tr><tr><td>15 000 W</td><td>30</td><td>10 950</td><td>8.4</td><td>3 066</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set power = 10, hours used per day = 24, days per year = 365, price of electricity = 0.28: <strong>Energy per day</strong> = 0.24 kWh, <strong>Energy per year</strong> = 87.6 kWh, <strong>Cost per day</strong> = 0.067, <strong>Cost per year</strong> = 24.528. Ten watts on all year: 87.6 kWh, about 25 a year for standby alone.</li><li>Set power = 2 000, hours used per day = 0.25, days per year = 365, price of electricity = 0.28: <strong>Energy per day</strong> = 0.5 kWh, <strong>Energy per year</strong> = 182.5 kWh, <strong>Cost per day</strong> = 0.14, <strong>Cost per year</strong> = 51.1. A 2 kW kettle boiled for a quarter of an hour a day: 45.6 a year.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>The label says 1 500 W, not 1 500 W every hour.</strong> A heater cycles. A fridge cycles more. Use the hours that reflect the duty cycle, not the hours it is plugged in.</li><li><strong>Price per unit, not the whole bill.</strong> A bill includes standing charges and taxes. The tariff per kWh is the number that multiplies energy.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>It models one appliance.</strong> Two appliances are two runs of this page, added by hand.</li></li><li><li><strong>It uses your tariff, not your bill.</strong> Standing charges, time-of-use rates and tax are outside the multiplication.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need power and hours used per day and days per year and price of electricity. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Energy per day and energy per year and cost per day and cost per year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a second-hand freezer is cheap.</li></li><li><li>Working out what an hour of heating costs.</li></li><li><li>Comparing an old appliance with its replacement.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/led-savings">LED savings</a> <a href="/everyday-life/shower-cost">Shower cost</a> <a href="/everyday-life/appliance-wattage">Appliance wattage</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Power</strong> ×10</td><td>3</td><td>30</td><td>ten times larger</td></tr><tr><td><strong>Hours used per day</strong> ×10</td><td>3</td><td>30</td><td>ten times larger</td></tr><tr><td><strong>Days per year</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr><tr><td><strong>Price of electricity</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Electricity Cost calculator work out?', 'a' => <<<'TXT'
            It returns energy per day and energy per year and cost per day and cost per year from power and hours used per day and days per year and price of electricity. The relationship is Power ÷ 1000 × Hours used per day.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Power (W), Hours used per day (h), Days per year (days), Price of electricity (per kWh). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: power in W; hours used per day in h; days per year in days; price of electricity in per kWh. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is a kilowatt the same as a kilowatt-hour?', 'a' => 'No. A kilowatt is a rate; a kilowatt-hour is an amount. A 1 000 W appliance running for one hour uses one kilowatt-hour; running for two hours uses two.'],
            ['q' => 'Why does the yearly figure assume 365 days?', 'a' => 'Because that is the default. A seasonal appliance should use the days it actually runs, or the yearly number will be an overestimate.'],
        ],
        'related' => [
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
            ['path' => '/everyday-life/shower-cost', 'name' => 'Shower cost'],
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
