<?php

/**
 * Cord of Wood Calculator
 * /everyday-life/cord-wood
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cord of Wood Calculator',
    'meta' => ['title' => 'Cord of Wood Calculator — Stack Volume — Free Tool', 'description' => 'Work out the volume of a stack of firewood in cubic feet and in cords, from its length, height and depth, with the loose volume in cubic metres beside it.', 'h1' => 'Cord of Wood Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Stack length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Stack height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Log length (stack depth)',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'The length of the logs themselves, which is how deep the stack is.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per cord',
                    'type' => 'number',
                    'default' => '320',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Stack volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'cords',
                    'label' => 'Cords',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cords',
                ],
                [
                    'name' => 'cubic_metres',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm³',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of this stack',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['volume' => 'length * height * depth', 'cords' => 'length * height * depth / 128', 'cubic_metres' => 'length * height * depth * 0.0283168', 'cost' => 'length * height * depth / 128 * price'],
    'article' => [
        'intro' => 'A cord of firewood is a stack 8 feet long, 4 feet high and 4 feet deep, which is 128 cubic feet. The page measures your stack and says how many cords it holds.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Firewood is sold in cords, and a cord is a volume rather than a weight: 128 cubic feet of stacked wood. Because logs are round, a stack of that size holds rather less solid wood, which is why the same cord can look different at two suppliers.</p><p>The page measures the stack you have, not the one you were promised. A stack 8 by 4 by 4 is one cord; a stack 8 by 4 by 2 is half a cord, and the arithmetic is three multiplications.</p><p>The answer is <strong>stack volume and cords and volume and cost of this stack</strong>, worked out from stack length and stack height and log length (stack depth) and price per cord. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>volume</strong></td><td><code>Stack length × Stack height × Log length (stack depth)</code></td></tr><tr><td><strong>cords</strong></td><td><code>Stack length × Stack height × Log length (stack depth) ÷ 128</code></td></tr><tr><td><strong>cubic_metres</strong></td><td><code>Stack length × Stack height × Log length (stack depth) × 0.0283168</code></td></tr><tr><td><strong>cost</strong></td><td><code>Stack length × Stack height × Log length (stack depth) ÷ 128 × Price per cord</code></td></tr></tbody></table><p>128 is eight times four times four: the definition of a cord written as a number. The cubic metre line uses 0.028 316 8, the exact conversion from cubic feet.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports stack volume and cords and volume and cost of this stack.</p><ul><li><strong>Stack length</strong> — ft.</li><li><strong>Stack height</strong> — ft.</li><li><strong>Log length (stack depth)</strong> — ft. The length of the logs themselves, which is how deep the stack is.</li><li><strong>Price per cord</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Stack volume</strong> — ft³.</li><li><strong>Cords</strong> — cords.</li><li><strong>Volume</strong> — m³.</li><li><strong>Cost of this stack</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put stack length = 8 ft, stack height = 4 ft, log length (stack depth) = 4 ft, price per cord = 320 into the form and the panel reads:</p><ul><li><strong>Stack volume</strong> = <code>Stack length × Stack height × Log length (stack depth)</code> = <strong>128 ft³</strong></li><li><strong>Cords</strong> = <code>Stack length × Stack height × Log length (stack depth) ÷ 128</code> = <strong>1 cords</strong></li><li><strong>Volume</strong> = <code>Stack length × Stack height × Log length (stack depth) × 0.0283168</code> = <strong>3.625 m³</strong></li><li><strong>Cost of this stack</strong> = <code>Stack length × Stack height × Log length (stack depth) ÷ 128 × Price per cord</code> = <strong>320</strong></li></ul><p>A face cord is a stack 8 feet long and 4 feet high but only one log deep. If a supplier quotes face cords, ask for the depth: the page cannot guess it.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>8 × 4 × 4</code>, which comes to <strong>128 ft³</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A full cord is 8 × 4 × 4 ft, so 128 ft³, or 3.62 m³. At 320 a cord, a stack half that size is 160.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Stack volume</th><th>Cords</th><th>Volume</th><th>Cost of this stack</th></tr></thead><tbody><tr><td><strong>Stack length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Stack height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Log length (stack depth)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price per cord</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Stack length</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Stack length</strong> opens at 8 ft</li><li><strong>Stack height</strong> opens at 4 ft</li><li><strong>Log length (stack depth)</strong> opens at 4 ft — The length of the logs themselves, which is how deep the stack is.</li><li><strong>Price per cord</strong> opens at 320</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Stack length</th><th>Stack volume</th><th>Cords</th><th>Volume</th><th>Cost of this stack</th></tr></thead><tbody><tr><td>4 ft</td><td>64</td><td>0.5</td><td>1.812</td><td>160</td></tr><tr><td>8 ft</td><td>128</td><td>1</td><td>3.625</td><td>320</td></tr><tr><td>16 ft</td><td>256</td><td>2</td><td>7.249</td><td>640</td></tr><tr><td>40 ft</td><td>640</td><td>5</td><td>18.123</td><td>1 600</td></tr><tr><td>80 ft</td><td>1 280</td><td>10</td><td>36.246</td><td>3 200</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set stack length = 8, stack height = 4, log length (stack depth) = 2, price per cord = 320: <strong>Stack volume</strong> = 64 ft³, <strong>Cords</strong> = 0.5 cords, <strong>Volume</strong> = 1.812 m³, <strong>Cost of this stack</strong> = 160. Half a cord: 64 ft³, 1.81 m³, and 160 at the same price per cord.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring the logs, not the stack.</strong> Depth is the length of the log plus the gaps in the stack, so measure the whole depth.</li><li><strong>Buying by the truckload.</strong> A loose cubic metre and a stacked one are different quantities; this page measures stacked volume.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Stacked volume, not solid wood.</strong> Gaps between logs mean a cord is roughly 70 to 80 per cent solid timber.</li></li><li><li><strong>No moisture.</strong> Seasoned and green wood occupy the same space and burn very differently.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need stack length and stack height and log length (stack depth) and price per cord. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Stack volume and cords and volume and cost of this stack should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a delivery against what was paid for.</li></li><li><li>Working out how much wood a stove will need for a winter.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/well-volume">Well volume</a> <a href="/everyday-life/bean-bag-filling">Bean bag filling</a> <a href="/everyday-life/bag">Bag size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Stack length</strong> ×10</td><td>128</td><td>1 280</td><td>ten times larger</td></tr><tr><td><strong>Stack height</strong> ×10</td><td>128</td><td>1 280</td><td>ten times larger</td></tr><tr><td><strong>Log length (stack depth)</strong> ×10</td><td>128</td><td>1 280</td><td>ten times larger</td></tr><tr><td><strong>Price per cord</strong> ×10</td><td>128</td><td>128</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cord of Wood calculator work out?', 'a' => <<<'TXT'
            It returns stack volume and cords and volume and cost of this stack from stack length and stack height and log length (stack depth) and price per cord. The relationship is Stack length × Stack height × Log length (stack depth).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Stack length (ft), Stack height (ft), Log length (stack depth) (ft), Price per cord. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: stack length in ft; stack height in ft; log length (stack depth) in ft. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a cord of wood?', 'a' => '128 cubic feet of stacked firewood: a stack 8 ft long, 4 ft high and 4 ft deep. It is a volume, not a weight.'],
            ['q' => 'Is a face cord the same as a cord?', 'a' => 'No. A face cord is one log deep, so its volume depends on the log length. A full cord needs the depth to be 4 feet.'],
        ],
        'related' => [
            ['path' => '/everyday-life/well-volume', 'name' => 'Well volume'],
            ['path' => '/everyday-life/bean-bag-filling', 'name' => 'Bean bag filling'],
            ['path' => '/everyday-life/bag', 'name' => 'Bag size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
