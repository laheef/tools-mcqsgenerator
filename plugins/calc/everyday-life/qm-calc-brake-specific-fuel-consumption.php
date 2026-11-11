<?php

/**
 * BSFC Calculator
 * /everyday-life/brake-specific-fuel-consumption
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BSFC Calculator',
    'meta' => ['title' => 'BSFC — Fuel per Horsepower per Hour — Free Tool', 'description' => 'Pounds of fuel an hour divided by horsepower is brake-specific fuel consumption: 0.50 is an ordinary petrol engine and 0.40 is a good one, in two units.', 'h1' => 'BSFC Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hp',
                    'label' => 'Power',
                    'type' => 'number',
                    'suffix' => 'hp',
                    'default' => '300',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fuel',
                    'label' => 'Fuel flow',
                    'type' => 'number',
                    'suffix' => 'lb/h',
                    'default' => '150',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Fuel density',
                    'type' => 'number',
                    'suffix' => 'lb/gal',
                    'default' => '6.07',
                    'help' => 'Petrol is 6.0 to 6.3 pounds a gallon and diesel about 7.1.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bsfc',
                    'label' => 'BSFC',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb/hp·h',
                ],
                [
                    'name' => 'g_kwh',
                    'label' => 'BSFC',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/kWh',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Fuel flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal/h',
                ],
                [
                    'name' => 'litres',
                    'label' => 'Fuel flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/h',
                ],
            ],
        ],
    ],
    'formula' => ['bsfc' => 'fuel / hp', 'g_kwh' => 'fuel / hp * 608.277', 'gallons' => 'fuel / density', 'litres' => 'fuel / density * 3.78541'],
    'article' => [
        'intro' => 'The fuel an engine burns per horsepower per hour, from its fuel flow and its output, in pounds per horsepower-hour and in grams per kilowatt-hour.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Brake-specific fuel consumption is the honest measure of an engine's efficiency: how much fuel it burns for each horsepower it makes. 0.50 pounds per horsepower-hour is ordinary, 0.45 is good, and 0.40 is a modern direct-injection engine at its best point.</p><p>The unit looks strange until it is converted. Multiply by 608.277 and the same figure is in grams per kilowatt-hour, which is how European engines are quoted: 0.50 is 304 g/kWh, and the best diesels get under 200.</p><p>The answer is <strong>bSFC and bSFC and fuel flow and fuel flow</strong>, worked out from power and fuel flow and fuel density. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>bsfc</strong></td><td><code>Fuel flow ÷ Power</code></td></tr><tr><td><strong>g_kwh</strong></td><td><code>Fuel flow ÷ Power × 608.277</code></td></tr><tr><td><strong>gallons</strong></td><td><code>Fuel flow ÷ Fuel density</code></td></tr><tr><td><strong>litres</strong></td><td><code>Fuel flow ÷ Fuel density × 3.78541</code></td></tr></tbody></table><p>Fuel flow over power gives the figure directly. Multiply by 608.277 for grams per kilowatt-hour, and divide the flow by the fuel density for gallons an hour and by 3.785 for litres.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports bSFC and bSFC and fuel flow and fuel flow.</p><ul><li><strong>Power</strong> — hp.</li><li><strong>Fuel flow</strong> — lb/h.</li><li><strong>Fuel density</strong> — lb/gal. Petrol is 6.0 to 6.3 pounds a gallon and diesel about 7.1.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>BSFC</strong> — lb/hp·h.</li><li><strong>BSFC</strong> — g/kWh.</li><li><strong>Fuel flow</strong> — gal/h.</li><li><strong>Fuel flow</strong> — L/h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put power = 300 hp, fuel flow = 150 lb/h, fuel density = 6.07 lb/gal into the form and the panel reads:</p><ul><li><strong>BSFC</strong> = <code>Fuel flow ÷ Power</code> = <strong>0.5 lb/hp·h</strong></li><li><strong>BSFC</strong> = <code>Fuel flow ÷ Power × 608.277</code> = <strong>304.139 g/kWh</strong></li><li><strong>Fuel flow</strong> = <code>Fuel flow ÷ Fuel density</code> = <strong>24.712 gal/h</strong></li><li><strong>Fuel flow</strong> = <code>Fuel flow ÷ Fuel density × 3.78541</code> = <strong>93.544 L/h</strong></li></ul><p>The same 300 horsepower at 0.42 needs 126 pounds an hour — 24 pounds less, or ten per cent of the fuel, for the same output.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>150 ÷ 300</code>, which comes to <strong>0.5 lb/hp·h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>150 pounds an hour at 300 horsepower is 0.50 lb/hp·h, or 304 g/kWh. That is 24.7 gallons an hour, which is 93.5 litres.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>BSFC</th><th>BSFC</th><th>Fuel flow</th><th>Fuel flow</th></tr></thead><tbody><tr><td><strong>Power</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Fuel flow</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Fuel density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Fuel flow</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Power</strong> opens at 300 hp</li><li><strong>Fuel flow</strong> opens at 150 lb/h</li><li><strong>Fuel density</strong> opens at 6.07 lb/gal — Petrol is 6.0 to 6.3 pounds a gallon and diesel about 7.1.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Power</th><th>BSFC</th><th>BSFC</th><th>Fuel flow</th><th>Fuel flow</th></tr></thead><tbody><tr><td>150 hp</td><td>1</td><td>608.277</td><td>24.712</td><td>93.544</td></tr><tr><td>300 hp</td><td>0.5</td><td>304.139</td><td>24.712</td><td>93.544</td></tr><tr><td>600 hp</td><td>0.25</td><td>152.069</td><td>24.712</td><td>93.544</td></tr><tr><td>1 500 hp</td><td>0.1</td><td>60.828</td><td>24.712</td><td>93.544</td></tr><tr><td>3 000 hp</td><td>0.05</td><td>30.414</td><td>24.712</td><td>93.544</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set power = 300, fuel flow = 126, fuel density = 6.07: <strong>BSFC</strong> = 0.42 lb/hp·h, <strong>BSFC</strong> = 255.476 g/kWh, <strong>Fuel flow</strong> = 20.758 gal/h, <strong>Fuel flow</strong> = 78.577 L/h. 126 pounds an hour is 0.42 lb/hp·h and 255 g/kWh — a modern engine at its best point rather than a rich one.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using peak power.</strong> BSFC is a curve with a best point in the middle of the range. Quoting the figure at the redline flatters nothing and hides the efficiency.</li><li><strong>Forgetting that rich is safe and wasteful.</strong> A turbo engine at 0.55 is being cooled by fuel. The number is a design choice as well as a measure.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Brake power only.</strong> Indicated efficiency, which includes friction and pumping losses, is higher and less useful for a vehicle.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need power and fuel flow and fuel density. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Bsfc and bsfc and fuel flow and fuel flow should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out the injector size an engine needs.</li></li><li><li>Comparing two engines of different ages honestly.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/horsepower">Horsepower</a> <a href="/everyday-life/turbo-size">Turbo size</a> <a href="/everyday-life/mpg">MPG calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Power</strong> ×10</td><td>0.5</td><td>0.05</td><td>ten times smaller</td></tr><tr><td><strong>Fuel flow</strong> ×10</td><td>0.5</td><td>5</td><td>ten times larger</td></tr><tr><td><strong>Fuel density</strong> ×10</td><td>0.5</td><td>0.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BSFC calculator work out?', 'a' => 'It returns bSFC and bSFC and fuel flow and fuel flow from power and fuel flow and fuel density. The relationship is Fuel flow ÷ Power.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Power (hp), Fuel flow (lb/h), Fuel density (lb/gal). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: power in hp; fuel flow in lb/h; fuel density in lb/gal. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What does brake mean in brake-specific?', 'a' => 'Measured at the flywheel with a brake, which is what a dynamometer is. It distinguishes usable output from the indicated power inside the cylinders.'],
            ['q' => 'What is a good BSFC?', 'a' => '0.45 to 0.50 for a petrol engine at full load, 0.40 for the best, and 0.33 to 0.38 for a diesel. Numbers above 0.6 mean a rich mixture.'],
            ['q' => 'Why 608.277?', 'a' => 'It converts pounds per horsepower-hour to grams per kilowatt-hour: 453.59 grams a pound and 0.7457 kilowatts a horsepower.'],
        ],
        'related' => [
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
            ['path' => '/everyday-life/turbo-size', 'name' => 'Turbo size'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
