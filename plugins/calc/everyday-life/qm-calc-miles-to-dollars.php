<?php

/**
 * Miles to Dollars Calculator
 * /everyday-life/miles-to-dollars
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Miles to Dollars Calculator',
    'meta' => ['title' => 'Miles to Dollars — What a Trip Costs in Fuel', 'description' => 'Distance, economy and the pump price turned into gallons and money: what a drive costs before you set off, and what each extra mile of it adds to the bill.', 'h1' => 'Miles to Dollars Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Journey distance',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '250',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mpg',
                    'label' => 'Fuel economy',
                    'type' => 'number',
                    'suffix' => 'mpg',
                    'default' => '28',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Fuel price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '3.45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Fuel needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Fuel cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_mile',
                    'label' => 'Cost per mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/mi',
                ],
                [
                    'name' => 'per_100',
                    'label' => 'Cost per 100 miles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'return_cost',
                    'label' => 'There and back',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'gallons' => 'distance / mpg',
        'cost' => 'distance / mpg * price',
        'cost_mile' => 'price / mpg',
        'per_100' => 'price / mpg * 100',
        'return_cost' => 'distance / mpg * price * 2',
    ],
    'article' => [
        'intro' => 'The fuel a journey needs and what it costs, from the distance, the car\'s economy and the price at the pump, with the per-mile rate for a change of plan.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Two hundred and fifty miles at 28 mpg is 8.93 gallons, which at 3.45 is 30.80. The number is small enough to dismiss and large enough to matter on the third trip of the month.</p><p>The per-mile figure is the useful one because it scales: 12.3 cents a mile means every extra twenty miles is 2.46, and a change of destination becomes arithmetic rather than a shrug.</p><p>The answer is <strong>fuel needed and fuel cost and cost per mile and cost per 100 miles and there and back</strong>, worked out from journey distance and fuel economy and fuel price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gallons</strong></td><td><code>Journey distance ÷ Fuel economy</code></td></tr><tr><td><strong>cost</strong></td><td><code>Journey distance ÷ Fuel economy × Fuel price</code></td></tr><tr><td><strong>cost_mile</strong></td><td><code>Fuel price ÷ Fuel economy</code></td></tr><tr><td><strong>per_100</strong></td><td><code>Fuel price ÷ Fuel economy × 100</code></td></tr><tr><td><strong>return_cost</strong></td><td><code>Journey distance ÷ Fuel economy × Fuel price × 2</code></td></tr></tbody></table><p>Distance over economy gives gallons; gallons times price gives money. The per-mile rate is simply price over miles per gallon, which is why it does not depend on the length of the trip at all.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports fuel needed and fuel cost and cost per mile and cost per 100 miles and there and back.</p><ul><li><strong>Journey distance</strong> — mi.</li><li><strong>Fuel economy</strong> — mpg.</li><li><strong>Fuel price</strong> — $/gal.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Fuel needed</strong> — gal.</li><li><strong>Fuel cost</strong> — $.</li><li><strong>Cost per mile</strong> — $/mi.</li><li><strong>Cost per 100 miles</strong> — $.</li><li><strong>There and back</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put journey distance = 250 mi, fuel economy = 28 mpg, fuel price = 3.45 $/gal into the form and the panel reads:</p><ul><li><strong>Fuel needed</strong> = <code>Journey distance ÷ Fuel economy</code> = <strong>8.929 gal</strong></li><li><strong>Fuel cost</strong> = <code>Journey distance ÷ Fuel economy × Fuel price</code> = <strong>30.804 $</strong></li><li><strong>Cost per mile</strong> = <code>Fuel price ÷ Fuel economy</code> = <strong>0.123 $/mi</strong></li><li><strong>Cost per 100 miles</strong> = <code>Fuel price ÷ Fuel economy × 100</code> = <strong>12.321 $</strong></li><li><strong>There and back</strong> = <code>Journey distance ÷ Fuel economy × Fuel price × 2</code> = <strong>61.607 $</strong></li></ul><p>A car at 40 mpg does the same trip for 21.56. The difference between the two cars on this one journey is 9.24, which is a coffee and a reminder that economy compounds over a year.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>250 ÷ 28</code>, which comes to <strong>8.929 gal</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>250 miles at 28 mpg needs 8.93 gallons, costing 30.80, or 12.3 cents a mile and 12.32 per hundred. The return trip is 61.61.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Fuel needed</th><th>Fuel cost</th><th>Cost per mile</th><th>Cost per 100 miles</th><th>There and back</th></tr></thead><tbody><tr><td><strong>Journey distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Fuel economy</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Fuel price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Fuel price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Journey distance</strong> opens at 250 mi</li><li><strong>Fuel economy</strong> opens at 28 mpg</li><li><strong>Fuel price</strong> opens at 3.45 $/gal</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Journey distance</th><th>Fuel needed</th><th>Fuel cost</th><th>Cost per mile</th><th>Cost per 100 miles</th><th>There and back</th></tr></thead><tbody><tr><td>125 mi</td><td>4.464</td><td>15.402</td><td>0.123</td><td>12.321</td><td>30.804</td></tr><tr><td>250 mi</td><td>8.929</td><td>30.804</td><td>0.123</td><td>12.321</td><td>61.607</td></tr><tr><td>500 mi</td><td>17.857</td><td>61.607</td><td>0.123</td><td>12.321</td><td>123.214</td></tr><tr><td>1 250 mi</td><td>44.643</td><td>154.018</td><td>0.123</td><td>12.321</td><td>308.036</td></tr><tr><td>2 500 mi</td><td>89.286</td><td>308.036</td><td>0.123</td><td>12.321</td><td>616.071</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set journey distance = 250, fuel economy = 40, fuel price = 3.45: <strong>Fuel needed</strong> = 6.25 gal, <strong>Fuel cost</strong> = 21.562 $, <strong>Cost per mile</strong> = 0.086 $/mi, <strong>Cost per 100 miles</strong> = 8.625 $, <strong>There and back</strong> = 43.125 $. At 40 mpg the trip is 6.25 gallons and 21.56, which is nine dollars less than the 28 mpg car on the same road.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Costing the tank instead of the trip.</strong> Filling up costs 60 whatever the journey; the journey uses part of it. Use the distance, not the fill.</li><li><strong>Assuming motorway economy.</strong> The car's best figure is at a steady 60. A trip with a cold start, a town and a hill gets less, so add five to ten per cent for a real journey.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Fuel only.</strong> Tolls, parking and the wear the trip puts on tyres and oil are not in the figure. The cost per mile page has a line for them.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need journey distance and fuel economy and fuel price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Fuel needed and fuel cost and cost per mile and cost per 100 miles and there and back should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a drive or a train is cheaper for one person.</li></li><li><li>Splitting fuel in a carpool.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a> <a href="/everyday-life/fuel-distance">Fuel for a budget</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Journey distance</strong> ×10</td><td>8.929</td><td>89.286</td><td>ten times larger</td></tr><tr><td><strong>Fuel economy</strong> ×10</td><td>8.929</td><td>0.893</td><td>ten times smaller</td></tr><tr><td><strong>Fuel price</strong> ×10</td><td>8.929</td><td>8.929</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Miles to Dollars calculator work out?', 'a' => <<<'TXT'
            It returns fuel needed and fuel cost and cost per mile and cost per 100 miles and there and back from journey distance and fuel economy and fuel price. The relationship is Journey distance ÷ Fuel economy.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Journey distance (mi), Fuel economy (mpg), Fuel price ($/gal). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: journey distance in mi; fuel economy in mpg; fuel price in $/gal. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Should I use the car\'s claimed mpg or my own?', 'a' => <<<'TXT'
            Your own, from the last three fills. The claimed figure is measured without passengers, wind or a cold morning, and it is usually ten to twenty per cent better than real driving.
            TXT],
            ['q' => 'How do I split fuel between passengers?', 'a' => 'Divide the cost by the number of people in the car, which is what the return figure and a division do. The driver\'s own share counts like anyone else\'s.'],
            ['q' => 'Does air conditioning change the answer much?', 'a' => <<<'TXT'
            By five to fifteen per cent on a small engine in town, and very little at a steady motorway speed. It is worth knowing that the gap is smaller than the gap between two driving styles.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
            ['path' => '/everyday-life/fuel-distance', 'name' => 'Fuel for a budget'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
