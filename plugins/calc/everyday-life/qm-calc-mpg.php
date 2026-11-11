<?php

/**
 * MPG Calculator
 * /everyday-life/mpg
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'MPG Calculator',
    'meta' => ['title' => 'MPG Calculator — Miles per Gallon from One Fill', 'description' => 'Distance on the trip meter and gallons on the pump receipt give miles per gallon, the cost of a mile, and the same economy in litres per hundred kilometres.', 'h1' => 'MPG Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'miles',
                    'label' => 'Distance covered',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '320',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Fuel used',
                    'type' => 'number',
                    'suffix' => 'gal',
                    'default' => '10.5',
                    'help' => 'Refill to the same point both times. A pump that clicks off early can leave half a gallon in the neck.',
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
                    'name' => 'mpg',
                    'label' => 'Miles per gallon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mpg',
                ],
                [
                    'name' => 'l100',
                    'label' => 'Litres per 100 km',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/100km',
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
                    'name' => 'range',
                    'label' => 'Range on a 15-gallon tank',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
            ],
        ],
    ],
    'formula' => [
        'mpg' => 'miles / gallons',
        'l100' => '235.214583 / (miles / gallons)',
        'cost' => 'gallons * price',
        'cost_mile' => 'gallons * price / miles',
        'range' => '(miles / gallons) * 15',
    ],
    'article' => [
        'intro' => 'Miles per gallon for a tank of fuel, what the fuel cost and what each mile cost, with the same economy expressed as litres per hundred kilometres.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>One tank, one division. Three hundred and twenty miles on ten and a half gallons is 30.5 miles to the gallon, and the receipt says the tank cost 36.23, so a mile cost 11.3 cents.</p><p>Doing it per fill is the only honest version of the number. The trip computer in the dash resets when it feels like it and reads high on short runs, and the manufacturer's figure was measured on a rolling road with the air conditioning off.</p><p>The answer is <strong>miles per gallon and litres per 100 km and fuel cost and cost per mile and range on a 15-gallon tank</strong>, worked out from distance covered and fuel used and fuel price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>mpg</strong></td><td><code>Distance covered ÷ Fuel used</code></td></tr><tr><td><strong>l100</strong></td><td><code>235.214583 ÷ (Distance covered ÷ Fuel used)</code></td></tr><tr><td><strong>cost</strong></td><td><code>Fuel used × Fuel price</code></td></tr><tr><td><strong>cost_mile</strong></td><td><code>Fuel used × Fuel price ÷ Distance covered</code></td></tr><tr><td><strong>range</strong></td><td><code>(Distance covered ÷ Fuel used) × 15</code></td></tr></tbody></table><p>Miles over gallons for economy. Litres per hundred kilometres is 235.2 divided by miles per gallon — the constant is the number of litres in a gallon, 3.785, times the number of kilometres in a mile, 1.609, times 100.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports miles per gallon and litres per 100 km and fuel cost and cost per mile and range on a 15-gallon tank.</p><ul><li><strong>Distance covered</strong> — mi.</li><li><strong>Fuel used</strong> — gal. Refill to the same point both times. A pump that clicks off early can leave half a gallon in the neck.</li><li><strong>Fuel price</strong> — $/gal.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Miles per gallon</strong> — mpg.</li><li><strong>Litres per 100 km</strong> — L/100km.</li><li><strong>Fuel cost</strong> — $.</li><li><strong>Cost per mile</strong> — $/mi.</li><li><strong>Range on a 15-gallon tank</strong> — mi.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance covered = 320 mi, fuel used = 10.5 gal, fuel price = 3.45 $/gal into the form and the panel reads:</p><ul><li><strong>Miles per gallon</strong> = <code>Distance covered ÷ Fuel used</code> = <strong>30.476 mpg</strong></li><li><strong>Litres per 100 km</strong> = <code>235.214583 ÷ (Distance covered ÷ Fuel used)</code> = <strong>7.718 L/100km</strong></li><li><strong>Fuel cost</strong> = <code>Fuel used × Fuel price</code> = <strong>36.225 $</strong></li><li><strong>Cost per mile</strong> = <code>Fuel used × Fuel price ÷ Distance covered</code> = <strong>0.113 $/mi</strong></li><li><strong>Range on a 15-gallon tank</strong> = <code>(Distance covered ÷ Fuel used) × 15</code> = <strong>457.143 mi</strong></li></ul><p>The same miles on 9 gallons would be 35.6 mpg. Economy moves faster than people expect at the low end, because the divisor is small.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>320 ÷ 10.5</code>, which comes to <strong>30.476 mpg</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>320 miles on 10.5 gallons is 30.5 mpg, which is 7.7 litres per 100 km. The tank cost 36.23 and the cost per mile was 11.3 cents.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Miles per gallon</th><th>Litres per 100 km</th><th>Fuel cost</th><th>Cost per mile</th><th>Range on a 15-gallon tank</th></tr></thead><tbody><tr><td><strong>Distance covered</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Fuel used</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Fuel price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Distance covered</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance covered</strong> opens at 320 mi</li><li><strong>Fuel used</strong> opens at 10.5 gal — Refill to the same point both times. A pump that clicks off early can leave half a gallon in the neck.</li><li><strong>Fuel price</strong> opens at 3.45 $/gal</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance covered</th><th>Miles per gallon</th><th>Litres per 100 km</th><th>Fuel cost</th><th>Cost per mile</th><th>Range on a 15-gallon tank</th></tr></thead><tbody><tr><td>160 mi</td><td>15.238</td><td>15.436</td><td>36.225</td><td>0.226</td><td>228.571</td></tr><tr><td>320 mi</td><td>30.476</td><td>7.718</td><td>36.225</td><td>0.113</td><td>457.143</td></tr><tr><td>640 mi</td><td>60.952</td><td>3.859</td><td>36.225</td><td>0.057</td><td>914.286</td></tr><tr><td>1 600 mi</td><td>152.381</td><td>1.544</td><td>36.225</td><td>0.023</td><td>2 285.714</td></tr><tr><td>3 200 mi</td><td>304.762</td><td>0.772</td><td>36.225</td><td>0.011</td><td>4 571.429</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance covered = 320, fuel used = 8.5, fuel price = 3.45: <strong>Miles per gallon</strong> = 37.647 mpg, <strong>Litres per 100 km</strong> = 6.248 L/100km, <strong>Fuel cost</strong> = 29.325 $, <strong>Cost per mile</strong> = 0.092 $/mi, <strong>Range on a 15-gallon tank</strong> = 564.706 mi. The same 320 miles on 8.5 gallons is 37.6 mpg, a 23 per cent improvement that no tune-up usually delivers.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the tank size instead of the fuel used.</strong> A 15-gallon tank that you refill at a quarter full has had 11 gallons through it, not 15.</li><li><strong>Comparing tanks measured differently.</strong> Fill to the first click, at the same pump if you can. Two fills that stop at different points are not a controlled test.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One tank.</strong> A single fill includes a cold start and whatever hills the tank covered. Three tanks averaged is a figure worth quoting.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance covered and fuel used and fuel price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Miles per gallon and litres per 100 km and fuel cost and cost per mile and range on a 15-gallon tank should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking the dashboard figure against the receipt.</li></li><li><li>Measuring what a change — tyres, roof rack, driving style — actually did.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/fuel-mileage">Fuel mileage converter</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a> <a href="/everyday-life/miles-to-dollars">Miles to dollars</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance covered</strong> ×10</td><td>30.476</td><td>304.762</td><td>ten times larger</td></tr><tr><td><strong>Fuel used</strong> ×10</td><td>30.476</td><td>3.048</td><td>ten times smaller</td></tr><tr><td><strong>Fuel price</strong> ×10</td><td>30.476</td><td>30.476</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the MPG calculator work out?', 'a' => <<<'TXT'
            It returns miles per gallon and litres per 100 km and fuel cost and cost per mile and range on a 15-gallon tank from distance covered and fuel used and fuel price. The relationship is Distance covered ÷ Fuel used.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance covered (mi), Fuel used (gal), Fuel price ($/gal). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: distance covered in mi; fuel used in gal; fuel price in $/gal. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is my calculated mpg lower than the car\'s?', 'a' => 'Because the car\'s figure is optimistic and because city driving with a cold engine is the worst case. The receipt does not round in the manufacturer\'s favour.'],
            ['q' => 'What is a good mpg?', 'a' => 'For a petrol car, 30 to 40 mpg is ordinary in mixed driving; 50 is a hybrid. For a diesel, 45 to 55. The number that matters is your own last three tanks.'],
            ['q' => 'Does the 235.2 constant work for UK gallons?', 'a' => 'No. A UK gallon is 4.546 litres, so the constant becomes 282.5. This page uses US gallons, which is what a US pump delivers.'],
        ],
        'related' => [
            ['path' => '/everyday-life/fuel-mileage', 'name' => 'Fuel mileage converter'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
            ['path' => '/everyday-life/miles-to-dollars', 'name' => 'Miles to dollars'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
