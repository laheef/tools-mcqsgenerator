<?php

/**
 * Commute Calculator
 * /everyday-life/commute
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Commute Calculator',
    'meta' => ['title' => 'Commute Calculator — Annual Miles, Hours and Fuel', 'description' => 'Estimate yearly commute distance, time and fuel cost from one-way distance, average speed, workdays, weeks, fuel economy and price. The trip is counted as a.', 'h1' => 'Commute Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'one_way',
                    'label' => 'One-way distance',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '18',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Average driving speed',
                    'type' => 'number',
                    'suffix' => 'mph',
                    'default' => '36',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days_week',
                    'label' => 'Commute days per week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weeks_year',
                    'label' => 'Working weeks per year',
                    'type' => 'number',
                    'suffix' => 'weeks',
                    'default' => '48',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mpg',
                    'label' => 'Fuel economy',
                    'type' => 'number',
                    'suffix' => 'mpg',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fuel_price',
                    'label' => 'Fuel price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'daily',
                    'label' => 'Round-trip miles per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'annual_miles',
                    'label' => 'Annual commute miles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'annual_hours',
                    'label' => 'Hours driving per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'fuel_gallons',
                    'label' => 'Fuel per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'annual_cost',
                    'label' => 'Fuel cost per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'weekly_cost',
                    'label' => 'Fuel cost per working week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'daily' => '2 * one_way',
        'annual_miles' => '2 * one_way * days_week * weeks_year',
        'annual_hours' => '2 * one_way * days_week * weeks_year / speed',
        'fuel_gallons' => '2 * one_way * days_week * weeks_year / mpg',
        'annual_cost' => '2 * one_way * days_week * weeks_year / mpg * fuel_price',
        'weekly_cost' => '2 * one_way * days_week / mpg * fuel_price',
    ],
    'article' => [
        'intro' => 'A commute\'s yearly cost depends on more than distance. Enter the one-way route, average speed and work schedule to estimate miles, hours and fuel.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A route that looks short each morning accumulates across a working year. The estimate needs a round trip, the days actually driven and a realistic number of working weeks. Fuel economy and price turn that distance into a cost, while average speed gives a simple driving-time estimate.<p>The answer is <strong>round-trip miles per day and annual commute miles and hours driving per year and fuel per year and fuel cost per year and fuel cost per working week</strong>, worked out from one-way distance and average driving speed and commute days per week and working weeks per year and fuel economy and fuel price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>daily</strong></td><td><code>2 × One-way distance</code></td></tr><tr><td><strong>annual_miles</strong></td><td><code>2 × One-way distance × Commute days per week × Working weeks per year</code></td></tr><tr><td><strong>annual_hours</strong></td><td><code>2 × One-way distance × Commute days per week × Working weeks per year ÷ Average driving speed</code></td></tr><tr><td><strong>fuel_gallons</strong></td><td><code>2 × One-way distance × Commute days per week × Working weeks per year ÷ Fuel economy</code></td></tr><tr><td><strong>annual_cost</strong></td><td><code>2 × One-way distance × Commute days per week × Working weeks per year ÷ Fuel economy × Fuel price</code></td></tr><tr><td><strong>weekly_cost</strong></td><td><code>2 × One-way distance × Commute days per week ÷ Fuel economy × Fuel price</code></td></tr></tbody></table><p>The one-way distance is doubled for a return journey. Annual distance multiplies that daily total by workdays and weeks; time divides by speed, and fuel cost divides miles by mpg then multiplies by price.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports round-trip miles per day and annual commute miles and hours driving per year and fuel per year and fuel cost per year and fuel cost per working week.</p><ul><li><strong>One-way distance</strong> — mi.</li><li><strong>Average driving speed</strong> — mph.</li><li><strong>Commute days per week</strong> — days.</li><li><strong>Working weeks per year</strong> — weeks.</li><li><strong>Fuel economy</strong> — mpg.</li><li><strong>Fuel price</strong> — $/gal.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Round-trip miles per day</strong> — mi.</li><li><strong>Annual commute miles</strong> — mi.</li><li><strong>Hours driving per year</strong> — h.</li><li><strong>Fuel per year</strong> — gal.</li><li><strong>Fuel cost per year</strong> — $.</li><li><strong>Fuel cost per working week</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put one-way distance = 18 mi, average driving speed = 36 mph, commute days per week = 5 days, working weeks per year = 48 weeks, fuel economy = 30 mpg, fuel price = 3.5 $/gal into the form and the panel reads:</p><ul><li><strong>Round-trip miles per day</strong> = <code>2 × One-way distance</code> = <strong>36 mi</strong></li><li><strong>Annual commute miles</strong> = <code>2 × One-way distance × Commute days per week × Working weeks per year</code> = <strong>8 640 mi</strong></li><li><strong>Hours driving per year</strong> = <code>2 × One-way distance × Commute days per week × Working weeks per year ÷ Average driving speed</code> = <strong>240 h</strong></li><li><strong>Fuel per year</strong> = <code>2 × One-way distance × Commute days per week × Working weeks per year ÷ Fuel economy</code> = <strong>288 gal</strong></li><li><strong>Fuel cost per year</strong> = <code>2 × One-way distance × Commute days per week × Working weeks per year ÷ Fuel economy × Fuel price</code> = <strong>1 008 $</strong></li><li><strong>Fuel cost per working week</strong> = <code>2 × One-way distance × Commute days per week ÷ Fuel economy × Fuel price</code> = <strong>21 $</strong></li></ul><p>Traffic rarely holds one average speed all year. The time figure is an estimate from a single speed value and excludes parking, walking, tolls and delays. Fuel cost assumes one fuel price and one fuel-economy figure; cold starts, congestion, terrain and vehicle load can change consumption. The weeks field is how many weeks you commute, not necessarily 52. For a hybrid schedule, choose the average number of commute days per week. The answer is a budgeting aid, not a reimbursement or tax calculation; verify any official mileage rate separately.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2 × 18</code>, which comes to <strong>36 mi</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>An 18-mile one-way commute, five days a week for 48 weeks, is 8,640 miles a year. At 36 mph average speed that is 240 hours; at 30 mpg and 3.50 per gallon, estimated fuel costs 1,008 for the year.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Round-trip miles per day</th><th>Annual commute miles</th><th>Hours driving per year</th><th>Fuel per year</th><th>Fuel cost per year</th><th>Fuel cost per working week</th></tr></thead><tbody><tr><td><strong>One-way distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Average driving speed</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Commute days per week</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Working weeks per year</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Fuel economy</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Fuel price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Fuel price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>One-way distance</strong> opens at 18 mi</li><li><strong>Average driving speed</strong> opens at 36 mph</li><li><strong>Commute days per week</strong> opens at 5 days</li><li><strong>Working weeks per year</strong> opens at 48 weeks</li><li><strong>Fuel economy</strong> opens at 30 mpg</li><li><strong>Fuel price</strong> opens at 3.5 $/gal</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>One-way distance</th><th>Round-trip miles per day</th><th>Annual commute miles</th><th>Hours driving per year</th><th>Fuel per year</th><th>Fuel cost per year</th><th>Fuel cost per working week</th></tr></thead><tbody><tr><td>9 mi</td><td>18</td><td>4 320</td><td>120</td><td>144</td><td>504</td><td>10.5</td></tr><tr><td>18 mi</td><td>36</td><td>8 640</td><td>240</td><td>288</td><td>1 008</td><td>21</td></tr><tr><td>36 mi</td><td>72</td><td>17 280</td><td>480</td><td>576</td><td>2 016</td><td>42</td></tr><tr><td>90 mi</td><td>180</td><td>43 200</td><td>1 200</td><td>1 440</td><td>5 040</td><td>105</td></tr><tr><td>180 mi</td><td>360</td><td>86 400</td><td>2 400</td><td>2 880</td><td>10 080</td><td>210</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Changing the period without changing its unit.</strong> A weekly figure and a yearly figure are comparable only after the number of weeks in the year is stated.</li><li><strong>Treating an estimate as a live clock.</strong> The page calculates from the dates and rates entered; it does not watch the calendar or update a deadline in real time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Inputs define the result.</strong> The page does not fetch calendars, prices or personal records from another service.</li></li><li><li><strong>Local rules can differ.</strong> Holidays, leap years, time zones and contract definitions may change how a real deadline is counted.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The assumptions behind the estimate', 'html' => <<<'TXT'
            Traffic rarely holds one average speed all year. The time figure is an estimate from a single speed value and excludes parking, walking, tolls and delays. Fuel cost assumes one fuel price and one fuel-economy figure; cold starts, congestion, terrain and vehicle load can change consumption. The weeks field is how many weeks you commute, not necessarily 52. For a hybrid schedule, choose the average number of commute days per week. The answer is a budgeting aid, not a reimbursement or tax calculation; verify any official mileage rate separately.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need one-way distance and average driving speed and commute days per week and working weeks per year and fuel economy and fuel price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Round-trip miles per day and annual commute miles and hours driving per year and fuel per year and fuel cost per year and fuel cost per working week should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/miles-per-year">Miles per year</a> <a href="/everyday-life/fuel-cost">Fuel cost</a> <a href="/everyday-life/drive-time">Drive time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>One-way distance</strong> ×10</td><td>36</td><td>360</td><td>ten times larger</td></tr><tr><td><strong>Average driving speed</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Commute days per week</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Working weeks per year</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Fuel economy</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Fuel price</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Commute calculator work out?', 'a' => <<<'TXT'
            It returns round-trip miles per day and annual commute miles and hours driving per year and fuel per year and fuel cost per year and fuel cost per working week from one-way distance and average driving speed and commute days per week and working weeks per year and fuel economy and fuel price. The relationship is 2 × One-way distance.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            One-way distance (mi), Average driving speed (mph), Commute days per week (days), Working weeks per year (weeks), Fuel economy (mpg), Fuel price ($/gal). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: one-way distance in mi; average driving speed in mph; commute days per week in days; working weeks per year in weeks; fuel economy in mpg; fuel price in $/gal. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is the route round trip?', 'a' => 'Yes. The one-way distance is doubled in daily and annual totals.'],
            ['q' => 'Does it include traffic delays?', 'a' => 'Only through the average speed you enter; it has no live traffic data.'],
            ['q' => 'How many work weeks should I use?', 'a' => 'Enter the weeks you actually expect to commute, accounting for leave or remote work.'],
            ['q' => 'Does it calculate wear and tear?', 'a' => 'No. Only fuel is priced.'],
        ],
        'related' => [
            ['path' => '/everyday-life/miles-per-year', 'name' => 'Miles per year'],
            ['path' => '/everyday-life/fuel-cost', 'name' => 'Fuel cost'],
            ['path' => '/everyday-life/drive-time', 'name' => 'Drive time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
