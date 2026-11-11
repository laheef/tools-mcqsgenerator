<?php

/**
 * Fuel for a Budget Calculator
 * /everyday-life/fuel-distance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuel for a Budget Calculator',
    'meta' => ['title' => 'Fuel for a Budget — How Far Forty Dollars Goes', 'description' => 'A set amount of money, the pump price and the car\'s economy: the gallons you can buy, the miles they cover, and the miles each further ten dollars adds.', 'h1' => 'Fuel for a Budget Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'budget',
                    'label' => 'Money for fuel',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '40',
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
                    'label' => 'Fuel economy',
                    'type' => 'number',
                    'suffix' => 'mpg',
                    'default' => '28',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Gallons bought',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'miles',
                    'label' => 'Miles covered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
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
                    'name' => 'per_10',
                    'label' => 'Miles per $10',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'empty_tank',
                    'label' => 'Cost to fill a 13-gallon tank',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'gallons' => 'budget / price',
        'miles' => 'budget / price * mpg',
        'cost_mile' => 'price / mpg',
        'per_10' => '10 / price * mpg',
        'empty_tank' => '13 * price',
    ],
    'article' => [
        'intro' => 'How many gallons a budget buys at the current price, how far the car will go on them, and the marginal miles that each extra ten dollars of fuel delivers.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Forty dollars at 3.45 buys 11.59 gallons, and at 28 mpg those gallons cover 324 miles. That is the whole arithmetic of a fuel budget, and it turns an abstract tank level into a distance you can plot.</p><p>The miles-per-ten-dollars line is the one to remember, because it does not change with the size of the fill: 81 miles. Everything above that is multiplication.</p><p>The answer is <strong>gallons bought and miles covered and cost per mile and miles per $10 and cost to fill a 13-gallon tank</strong>, worked out from money for fuel and fuel price and fuel economy. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gallons</strong></td><td><code>Money for fuel ÷ Fuel price</code></td></tr><tr><td><strong>miles</strong></td><td><code>Money for fuel ÷ Fuel price × Fuel economy</code></td></tr><tr><td><strong>cost_mile</strong></td><td><code>Fuel price ÷ Fuel economy</code></td></tr><tr><td><strong>per_10</strong></td><td><code>10 ÷ Fuel price × Fuel economy</code></td></tr><tr><td><strong>empty_tank</strong></td><td><code>13 × Fuel price</code></td></tr></tbody></table><p>Money over price gives gallons; gallons times economy gives miles. The ten-dollar figure is the same division with ten on top, so it is independent of the budget and useful for the next twenty dollars.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports gallons bought and miles covered and cost per mile and miles per $10 and cost to fill a 13-gallon tank.</p><ul><li><strong>Money for fuel</strong> — $.</li><li><strong>Fuel price</strong> — $/gal.</li><li><strong>Fuel economy</strong> — mpg.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Gallons bought</strong> — gal.</li><li><strong>Miles covered</strong> — mi.</li><li><strong>Cost per mile</strong> — $/mi.</li><li><strong>Miles per $10</strong> — mi.</li><li><strong>Cost to fill a 13-gallon tank</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put money for fuel = 40 $, fuel price = 3.45 $/gal, fuel economy = 28 mpg into the form and the panel reads:</p><ul><li><strong>Gallons bought</strong> = <code>Money for fuel ÷ Fuel price</code> = <strong>11.594 gal</strong></li><li><strong>Miles covered</strong> = <code>Money for fuel ÷ Fuel price × Fuel economy</code> = <strong>324.638 mi</strong></li><li><strong>Cost per mile</strong> = <code>Fuel price ÷ Fuel economy</code> = <strong>0.123 $/mi</strong></li><li><strong>Miles per $10</strong> = <code>10 ÷ Fuel price × Fuel economy</code> = <strong>81.159 mi</strong></li><li><strong>Cost to fill a 13-gallon tank</strong> = <code>13 × Fuel price</code> = <strong>44.85 $</strong></li></ul><p>At 45 mpg the same forty dollars covers 521 miles. The budget did not change; the car did.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>40 ÷ 3.45</code>, which comes to <strong>11.594 gal</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>40 dollars at 3.45 is 11.59 gallons, which at 28 mpg is 324.6 miles, at 12.3 cents a mile. Every further 10 dollars buys 81.2 miles, and filling a 13-gallon tank from empty costs 44.85.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Gallons bought</th><th>Miles covered</th><th>Cost per mile</th><th>Miles per $10</th><th>Cost to fill a 13-gallon tank</th></tr></thead><tbody><tr><td><strong>Money for fuel</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Fuel price</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Fuel economy</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Fuel price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Money for fuel</strong> opens at 40 $</li><li><strong>Fuel price</strong> opens at 3.45 $/gal</li><li><strong>Fuel economy</strong> opens at 28 mpg</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Money for fuel</th><th>Gallons bought</th><th>Miles covered</th><th>Cost per mile</th><th>Miles per $10</th><th>Cost to fill a 13-gallon tank</th></tr></thead><tbody><tr><td>20 $</td><td>5.797</td><td>162.319</td><td>0.123</td><td>81.159</td><td>44.85</td></tr><tr><td>40 $</td><td>11.594</td><td>324.638</td><td>0.123</td><td>81.159</td><td>44.85</td></tr><tr><td>80 $</td><td>23.188</td><td>649.275</td><td>0.123</td><td>81.159</td><td>44.85</td></tr><tr><td>200 $</td><td>57.971</td><td>1 623.188</td><td>0.123</td><td>81.159</td><td>44.85</td></tr><tr><td>400 $</td><td>115.942</td><td>3 246.377</td><td>0.123</td><td>81.159</td><td>44.85</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set money for fuel = 40, fuel price = 3.45, fuel economy = 45: <strong>Gallons bought</strong> = 11.594 gal, <strong>Miles covered</strong> = 521.739 mi, <strong>Cost per mile</strong> = 0.077 $/mi, <strong>Miles per $10</strong> = 130.435 mi, <strong>Cost to fill a 13-gallon tank</strong> = 44.85 $. At 45 mpg forty dollars covers 521.7 miles, and each further ten dollars buys 130 miles.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Spending the budget and calling it a full tank.</strong> Forty dollars is rarely a full tank on a large car and always a full tank on a small one. The gallons line is what the engine gets.</li><li><strong>Assuming the price holds.</strong> The miles figure is priced at today's pump. A ten per cent rise in price cuts the distance by the same ten per cent.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Road miles only.</strong> Idling, a cold start and a traffic jam all burn fuel without moving, and none of them appear in a distance over economy.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need money for fuel and fuel price and fuel economy. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Gallons bought and miles covered and cost per mile and miles per $10 and cost to fill a 13-gallon tank should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding how far a last twenty dollars will take you.</li></li><li><li>Comparing the cost of a trip in two different cars.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/miles-to-dollars">Miles to dollars</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Money for fuel</strong> ×10</td><td>11.594</td><td>115.942</td><td>ten times larger</td></tr><tr><td><strong>Fuel price</strong> ×10</td><td>11.594</td><td>1.159</td><td>ten times smaller</td></tr><tr><td><strong>Fuel economy</strong> ×10</td><td>11.594</td><td>11.594</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fuel for a Budget calculator work out?', 'a' => <<<'TXT'
            It returns gallons bought and miles covered and cost per mile and miles per $10 and cost to fill a 13-gallon tank from money for fuel and fuel price and fuel economy. The relationship is Money for fuel ÷ Fuel price.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Money for fuel ($), Fuel price ($/gal), Fuel economy (mpg). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: money for fuel in $; fuel price in $/gal; fuel economy in mpg. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does filling up with a set amount rather than a full tank change the mpg?', 'a' => 'No. Economy is measured over the miles between fills, and the size of the fill is irrelevant as long as the tank was filled to the same point both times.'],
            ['q' => 'Why is miles per ten dollars a better rule than miles per tank?', 'a' => <<<'TXT'
            Because a tank is 11 gallons in one car and 18 in another, and ten dollars is ten dollars. The rule transfers between cars and between countries with a price change.
            TXT],
            ['q' => 'Should I round up to the next gallon?', 'a' => <<<'TXT'
            Fuel is sold to the cent, so the exact gallons are fractions. If you are planning a remote stretch, round the miles down by ten per cent and you will not be walking.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/miles-to-dollars', 'name' => 'Miles to dollars'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
