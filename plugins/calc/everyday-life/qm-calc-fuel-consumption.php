<?php

/**
 * Fuel Consumption Calculator
 * /everyday-life/fuel-consumption
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuel Consumption Calculator',
    'meta' => ['title' => 'Fuel Consumption Calculator — L/100 km and MPG', 'description' => 'Turn a distance and the litres it took into litres per hundred kilometres, miles per gallon and kilometres per litre, so two cars can be compared in one unit.', 'h1' => 'Fuel Consumption Calculator', 'updated' => '2026-10-23'],
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
                    'name' => 'litres',
                    'label' => 'Fuel used',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '32.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'l100',
                    'label' => 'Consumption',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/100 km',
                ],
                [
                    'name' => 'mpg',
                    'label' => 'Consumption',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mpg (US)',
                ],
                [
                    'name' => 'kmpl',
                    'label' => 'Consumption',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'km/L',
                ],
                [
                    'name' => 'range',
                    'label' => 'Range on a 50-litre tank',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'km',
                ],
            ],
        ],
    ],
    'formula' => ['l100' => 'litres / distance * 100', 'mpg' => '235.214583 / (litres / distance * 100)', 'kmpl' => 'distance / litres', 'range' => '50 / (litres / distance) '],
    'article' => [
        'intro' => <<<'TXT'
        Consumption is fuel divided by distance, and the unit you divide into decides the number. The page returns the three units people actually quote, from the same two boxes.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Three units describe the same car and none of them agree on which way is better. Litres per hundred kilometres falls as the car improves; miles per gallon rises. Converting between them is the only way to read a foreign review without guessing.</p><p>The range line turns the same consumption into a distance, which is what matters on a long drive with a small tank.</p><p>The answer is <strong>consumption and consumption and consumption and range on a 50-litre tank</strong>, worked out from distance and fuel used. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>l100</strong></td><td><code>Fuel used ÷ Distance × 100</code></td></tr><tr><td><strong>mpg</strong></td><td><code>235.214583 ÷ (Fuel used ÷ Distance × 100)</code></td></tr><tr><td><strong>kmpl</strong></td><td><code>Distance ÷ Fuel used</code></td></tr><tr><td><strong>range</strong></td><td><code>50 ÷ (Fuel used ÷ Distance)</code></td></tr></tbody></table><p>235.214 583 is 100 divided by 0.425 143 848, the number of US gallons in a litre times the kilometres in a mile. It is the constant that turns L/100 km into US mpg, and it is exact to the definition.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports consumption and consumption and consumption and range on a 50-litre tank.</p><ul><li><strong>Distance</strong> — km.</li><li><strong>Fuel used</strong> — L.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Consumption</strong> — L/100 km.</li><li><strong>Consumption</strong> — mpg (US).</li><li><strong>Consumption</strong> — km/L.</li><li><strong>Range on a 50-litre tank</strong> — km.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put distance = 500 km, fuel used = 32.5 L into the form and the panel reads:</p><ul><li><strong>Consumption</strong> = <code>Fuel used ÷ Distance × 100</code> = <strong>6.5 L/100 km</strong></li><li><strong>Consumption</strong> = <code>235.214583 ÷ (Fuel used ÷ Distance × 100)</code> = <strong>36.187 mpg (US)</strong></li><li><strong>Consumption</strong> = <code>Distance ÷ Fuel used</code> = <strong>15.385 km/L</strong></li><li><strong>Range on a 50-litre tank</strong> = <code>50 ÷ (Fuel used ÷ Distance)</code> = <strong>769.231 km</strong></li></ul><p>Imperial gallons are larger than US ones, so a UK mpg figure is about twenty per cent higher for the same car. Check which gallon a review means.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>32.5 ÷ 500 × 100</code>, which comes to <strong>6.5 L/100 km</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>500 km on 32.5 litres is 6.5 L/100 km, which is 36.2 US mpg, or 15.4 km/L. A 50-litre tank at that consumption covers 769 km.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Consumption</th><th>Consumption</th><th>Consumption</th><th>Range on a 50-litre tank</th></tr></thead><tbody><tr><td><strong>Distance</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Fuel used</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Distance</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Distance</strong> opens at 500 km</li><li><strong>Fuel used</strong> opens at 32.5 L</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Distance</th><th>Consumption</th><th>Consumption</th><th>Consumption</th><th>Range on a 50-litre tank</th></tr></thead><tbody><tr><td>250 km</td><td>13</td><td>18.093</td><td>7.692</td><td>384.615</td></tr><tr><td>500 km</td><td>6.5</td><td>36.187</td><td>15.385</td><td>769.231</td></tr><tr><td>1 000 km</td><td>3.25</td><td>72.374</td><td>30.769</td><td>1 538.462</td></tr><tr><td>2 500 km</td><td>1.3</td><td>180.934</td><td>76.923</td><td>3 846.154</td></tr><tr><td>5 000 km</td><td>0.65</td><td>361.869</td><td>153.846</td><td>7 692.308</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set distance = 100, fuel used = 6.5: <strong>Consumption</strong> = 6.5 L/100 km, <strong>Consumption</strong> = 36.187 mpg (US), <strong>Consumption</strong> = 15.385 km/L, <strong>Range on a 50-litre tank</strong> = 769.231 km. The same car over a hundred kilometres: 6.5 L/100 km, 36.2 mpg.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing US and imperial gallons.</strong> The page uses US gallons, the common figure in reviews.</li><li><strong>Filling once.</strong> One tank is not a measurement; average three fills for a figure worth quoting.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No driving mix.</strong> Town and motorway consumption differ, and this page reports the average of what you entered.</li></li><li><li><strong>No trip computer correction.</strong> Most overstate by a few per cent.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need distance and fuel used. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Consumption and consumption and consumption and range on a 50-litre tank should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a car's real consumption against its claim.</li></li><li><li>Converting a foreign review into units you know.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/fuel-cost">Fuel cost</a> <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Distance</strong> ×10</td><td>6.5</td><td>0.65</td><td>ten times smaller</td></tr><tr><td><strong>Fuel used</strong> ×10</td><td>6.5</td><td>65</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fuel Consumption calculator work out?', 'a' => <<<'TXT'
            It returns consumption and consumption and consumption and range on a 50-litre tank from distance and fuel used. The relationship is Fuel used ÷ Distance × 100.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Distance (km), Fuel used (L). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: distance in km; fuel used in L. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Which unit is best for comparing cars?', 'a' => 'One unit at a time. Litres per hundred kilometres is the easiest to reason about because it is linear in fuel used.'],
            ['q' => 'Why is mpg inverted?', 'a' => 'Because it measures distance per fuel rather than fuel per distance. Higher is better, which is why the two figures move in opposite directions.'],
        ],
        'related' => [
            ['path' => '/everyday-life/fuel-cost', 'name' => 'Fuel cost'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
