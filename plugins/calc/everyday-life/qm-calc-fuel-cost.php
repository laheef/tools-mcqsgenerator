<?php

/**
 * Fuel Cost Calculator
 * /everyday-life/fuel-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuel Cost Calculator',
    'meta' => ['title' => 'Fuel Cost Calculator — Trip Cost from Consumption', 'description' => 'Work out what a journey costs in fuel from the distance, the car\'s consumption and the price at the pump, with the cost per hundred kilometres beside it.', 'h1' => 'Fuel Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Distance',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'consumption',
                    'label' => 'Fuel consumption',
                    'type' => 'number',
                    'suffix' => 'L/100 km',
                    'default' => '6.5',
                    'help' => 'Use the car\'s real average, not the brochure figure.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Fuel price',
                    'type' => 'number',
                    'suffix' => 'per litre',
                    'default' => '1.75',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'litres',
                    'label' => 'Fuel used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of the trip',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_km',
                    'label' => 'Cost per kilometre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_100',
                    'label' => 'Cost per 100 km',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['litres' => 'distance / 100 * consumption', 'cost' => 'distance / 100 * consumption * price', 'per_km' => 'consumption / 100 * price', 'per_100' => 'consumption * price'],
    'article' => [
        'intro' => <<<'TXT'
        A trip's fuel cost is the litres it burns times the price. The page returns the litres, the cost of the trip and the cost of a hundred kilometres, which is the figure that compares two cars.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Fuel cost is two multiplications: litres used, then litres times the price. The useful part is knowing the litres, because that is the number that changes when the route changes and stays the same when the price does.</p><p>The cost per hundred kilometres is the comparison figure. Two cars with different consumption can be compared on one number, whatever the length of the trip.</p><p>The answer is <strong>fuel used and cost of the trip and cost per kilometre and cost per 100 km</strong>, worked out from distance and fuel consumption and fuel price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>litres</strong></td><td><code>Distance ÷ 100 × Fuel consumption</code></td></tr><tr><td><strong>cost</strong></td><td><code>Distance ÷ 100 × Fuel consumption × Fuel price</code></td></tr><tr><td><strong>per_km</strong></td><td><code>Fuel consumption ÷ 100 × Fuel price</code></td></tr><tr><td><strong>per_100</strong></td><td><code>Fuel consumption × Fuel price</code></td></tr></tbody></table><p>Consumption in litres per hundred kilometres is divided by a hundred to get litres per kilometre. A car quoted in miles per gallon needs converting first; the fuel-consumption page does that.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports fuel used and cost of the trip and cost per kilometre and cost per 100 km.</p><ul><li><strong>Distance</strong> — km.</li><li><strong>Fuel consumption</strong> — L/100 km. Use the car&#x27;s real average, not the brochure figure.</li><li><strong>Fuel price</strong> — per litre.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Fuel used</strong> — L.</li><li><strong>Cost of the trip</strong>.</li><li><strong>Cost per kilometre</strong>.</li><li><strong>Cost per 100 km</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 500 km, fuel consumption = 6.5 L/100 km, fuel price = 1.75 per litre into the form and the panel reads:</p><ul><li><strong>Fuel used</strong> = <code>Distance ÷ 100 × Fuel consumption</code> = <strong>32.5 L</strong></li><li><strong>Cost of the trip</strong> = <code>Distance ÷ 100 × Fuel consumption × Fuel price</code> = <strong>56.875</strong></li><li><strong>Cost per kilometre</strong> = <code>Fuel consumption ÷ 100 × Fuel price</code> = <strong>0.114</strong></li><li><strong>Cost per 100 km</strong> = <code>Fuel consumption × Fuel price</code> = <strong>11.375</strong></li></ul><p>The per-kilometre line is the one to keep for a mileage claim, because it does not change with the length of the journey.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>500 ÷ 100 × 6.5</code>, which comes to <strong>32.5 L</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>500 km at 6.5 L/100 km is 32.5 litres. At 1.75 a litre the trip costs 56.88, which is 11.38 per hundred kilometres, or 11 cents a kilometre.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Fuel used</th><th>Cost of the trip</th><th>Cost per kilometre</th><th>Cost per 100 km</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Fuel consumption</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Fuel price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Fuel price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 500 km</li><li><strong>Fuel consumption</strong> opens at 6.5 L/100 km — Use the car&#x27;s real average, not the brochure figure.</li><li><strong>Fuel price</strong> opens at 1.75 per litre</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Fuel used</th><th>Cost of the trip</th><th>Cost per kilometre</th><th>Cost per 100 km</th></tr></thead><tbody><tr><td>250 km</td><td>16.25</td><td>28.438</td><td>0.114</td><td>11.375</td></tr><tr><td>500 km</td><td>32.5</td><td>56.875</td><td>0.114</td><td>11.375</td></tr><tr><td>1 000 km</td><td>65</td><td>113.75</td><td>0.114</td><td>11.375</td></tr><tr><td>2 500 km</td><td>162.5</td><td>284.375</td><td>0.114</td><td>11.375</td></tr><tr><td>5 000 km</td><td>325</td><td>568.75</td><td>0.114</td><td>11.375</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 100, fuel consumption = 6.5, fuel price = 1.75: <strong>Fuel used</strong> = 6.5 L, <strong>Cost of the trip</strong> = 11.375, <strong>Cost per kilometre</strong> = 0.114, <strong>Cost per 100 km</strong> = 11.375. A hundred kilometres: 6.5 litres, 11.38.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>The brochure figure.</strong> Real consumption is usually ten to twenty per cent higher, especially on short trips.</li><li><strong>Rounding the litres.</strong> Cost is computed from the unrounded figure, so multiplying the printed litres by the price by hand can differ by a cent.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Fuel only.</strong> Tyres, depreciation and tolls are outside the multiplication.</li></li><li><li><strong>One consumption figure.</strong> A trip with a loaded roof box burns more, and the page cannot know.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and fuel consumption and fuel price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Fuel used and cost of the trip and cost per kilometre and cost per 100 km should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Splitting the fuel cost of a shared drive.</li></li><li><li>Comparing a route with a detour.</li></li><li><li>Budgeting a holiday by distance.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/fuel-consumption">Fuel consumption</a> <a href="/everyday-life/drive-time">Drive time</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>32.5</td><td>325</td><td>ten times larger</td></tr><tr><td><strong>Fuel consumption</strong> ×10</td><td>32.5</td><td>325</td><td>ten times larger</td></tr><tr><td><strong>Fuel price</strong> ×10</td><td>32.5</td><td>32.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fuel Cost calculator work out?', 'a' => <<<'TXT'
            It returns fuel used and cost of the trip and cost per kilometre and cost per 100 km from distance and fuel consumption and fuel price. The relationship is Distance ÷ 100 × Fuel consumption.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (km), Fuel consumption (L/100 km), Fuel price (per litre). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: distance in km; fuel consumption in L/100 km; fuel price in per litre. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does it work in miles per gallon?', 'a' => 'Not directly. Convert mpg to L/100 km first, or use the fuel-consumption page, which returns both.'],
            ['q' => 'Why is the per-kilometre cost so small?', 'a' => 'Because it is one kilometre. Multiply by the distance and it matches the trip cost.'],
        ],
        'related' => [
            ['path' => '/everyday-life/fuel-consumption', 'name' => 'Fuel consumption'],
            ['path' => '/everyday-life/drive-time', 'name' => 'Drive time'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
