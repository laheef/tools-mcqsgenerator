<?php

/**
 * Dilution Ratio Calculator
 * /everyday-life/dilution-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dilution Ratio Calculator',
    'meta' => ['title' => 'Dilution Ratio Calculator — Product and Water', 'description' => 'Split a bottle into product and water at a chosen dilution ratio, so a 1:4 mix in a 500 ml bottle gives the exact amounts of each rather than a guess.', 'h1' => 'Dilution Ratio Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'parts',
                    'label' => 'Parts water',
                    'type' => 'number',
                    'suffix' => 'parts',
                    'default' => '4',
                    'help' => 'The n in a 1:n dilution. Use 9 for 1:10.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'container',
                    'label' => 'Container size',
                    'type' => 'number',
                    'suffix' => 'ml',
                    'default' => '500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'product_price',
                    'label' => 'Price of the product per litre',
                    'type' => 'number',
                    'default' => '8.5',
                    'help' => 'Optional: used for the cost line.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'product',
                    'label' => 'Product',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ml',
                ],
                [
                    'name' => 'water',
                    'label' => 'Water',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ml',
                ],
                [
                    'name' => 'ratio_percent',
                    'label' => 'Product concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of product in this mix',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['product' => 'container / (parts + 1)', 'water' => 'container - container / (parts + 1)', 'ratio_percent' => '1 / (parts + 1) * 100', 'cost' => 'container / (parts + 1) / 1000 * product_price'],
    'article' => [
        'intro' => <<<'TXT'
        A dilution of 1 to n means one part product to n parts water. The page splits a container into those parts, so the bottle ends up the size you wanted rather than the size the arithmetic happened to produce.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A ratio of 1:4 is five parts in total, not four. That single fact is behind most diluted bottles that come out too strong, because adding 100 ml of product to 400 ml of water gives 500 ml, while filling a 500 ml bottle with 100 ml and then topping it up gives the same thing and is easier to do.</p><p>The page works from the container size backwards, which is how a bottle is actually filled.</p><p>The answer is <strong>product and water and product concentration and cost of product in this mix</strong>, worked out from parts water and container size and price of the product per litre. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>product</strong></td><td><code>Container size ÷ (Parts water + 1)</code></td></tr><tr><td><strong>water</strong></td><td><code>Container size - Container size ÷ (Parts water + 1)</code></td></tr><tr><td><strong>ratio_percent</strong></td><td><code>1 ÷ (Parts water + 1) × 100</code></td></tr><tr><td><strong>cost</strong></td><td><code>Container size ÷ (Parts water + 1) ÷ 1000 × Price of the product per litre</code></td></tr></tbody></table><p>The container is divided by the parts plus one, because the product itself makes up the extra part. The concentration line is that same fraction as a percentage.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports product and water and product concentration and cost of product in this mix.</p><ul><li><strong>Parts water</strong> — parts. The n in a 1:n dilution. Use 9 for 1:10.</li><li><strong>Container size</strong> — ml.</li><li><strong>Price of the product per litre</strong>. Optional: used for the cost line.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Product</strong> — ml.</li><li><strong>Water</strong> — ml.</li><li><strong>Product concentration</strong> — %.</li><li><strong>Cost of product in this mix</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put parts water = 4 parts, container size = 500 ml, price of the product per litre = 8.5 into the form and the panel reads:</p><ul><li><strong>Product</strong> = <code>Container size ÷ (Parts water + 1)</code> = <strong>100 ml</strong></li><li><strong>Water</strong> = <code>Container size - Container size ÷ (Parts water + 1)</code> = <strong>400 ml</strong></li><li><strong>Product concentration</strong> = <code>1 ÷ (Parts water + 1) × 100</code> = <strong>20 %</strong></li><li><strong>Cost of product in this mix</strong> = <code>Container size ÷ (Parts water + 1) ÷ 1000 × Price of the product per litre</code> = <strong>0.85</strong></li></ul><p>For a 1:10 mix, put 9 in the parts box. Ten parts in total, so a 500 ml bottle takes 45 ml of product.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>500 ÷ (4 + 1)</code>, which comes to <strong>100 ml</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 1:4 mix in 500 ml is 100 ml of product and 400 ml of water, which is 20 % product. At 8.50 a litre, the product in that bottle costs 0.85.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Product</th><th>Water</th><th>Product concentration</th><th>Cost of product in this mix</th></tr></thead><tbody><tr><td><strong>Parts water</strong> +10 %</td><td>−7.41 %</td><td>+1.85 %</td><td>−7.41 %</td><td>−7.41 %</td></tr><tr><td><strong>Container size</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Price of the product per litre</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Price of the product per litre</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Parts water</strong> opens at 4 parts — The n in a 1:n dilution. Use 9 for 1:10.</li><li><strong>Container size</strong> opens at 500 ml</li><li><strong>Price of the product per litre</strong> opens at 8.5 — Optional: used for the cost line.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Parts water</th><th>Product</th><th>Water</th><th>Product concentration</th><th>Cost of product in this mix</th></tr></thead><tbody><tr><td>2 parts</td><td>166.667</td><td>333.333</td><td>33.333</td><td>1.417</td></tr><tr><td>4 parts</td><td>100</td><td>400</td><td>20</td><td>0.85</td></tr><tr><td>8 parts</td><td>55.556</td><td>444.444</td><td>11.111</td><td>0.472</td></tr><tr><td>20 parts</td><td>23.81</td><td>476.19</td><td>4.762</td><td>0.202</td></tr><tr><td>40 parts</td><td>12.195</td><td>487.805</td><td>2.439</td><td>0.104</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set parts water = 9, container size = 500, price of the product per litre = 8.5: <strong>Product</strong> = 50 ml, <strong>Water</strong> = 450 ml, <strong>Product concentration</strong> = 10 %, <strong>Cost of product in this mix</strong> = 0.425. A 1:10 mix: 45 ml of product and 455 ml of water.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading 1:4 as 4 parts total.</strong> It is five, and the page divides by the total.</li><li><strong>Mixing by eye.</strong> A mark on the bottle is worth more than a judgement; measure the product, then fill to the line.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Volume only.</strong> Some products are mixed by weight, and this page assumes millilitres throughout.</li></li><li><li><strong>No manufacturer's instructions.</strong> The ratio is yours to type; the label always wins.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need parts water and container size and price of the product per litre. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Product and water and product concentration and cost of product in this mix should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Filling a spray bottle at the label's ratio.</li></li><li><li>Working out how much concentrate a job needs.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/cleaning-cost">Cleaning cost</a> <a href="/everyday-life/pool-shock">Pool shock</a> <a href="/chemistry/dilution-factor">Dilution factor</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Parts water</strong> ×10</td><td>100</td><td>12.195</td><td>×0.122</td></tr><tr><td><strong>Container size</strong> ×10</td><td>100</td><td>1 000</td><td>ten times larger</td></tr><tr><td><strong>Price of the product per litre</strong> ×10</td><td>100</td><td>100</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dilution Ratio calculator work out?', 'a' => <<<'TXT'
            It returns product and water and product concentration and cost of product in this mix from parts water and container size and price of the product per litre. The relationship is Container size ÷ (Parts water + 1).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Parts water (parts), Container size (ml), Price of the product per litre. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: parts water in parts; container size in ml. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is 1:4 the same as 25 % product?', 'a' => 'No. 1:4 is one part in five, which is 20 %. 25 % would be 1:3.'],
            ['q' => 'Can I mix a larger batch at the same ratio?', 'a' => 'Yes: the ratio does not change with the container, and the page scales with it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cleaning-cost', 'name' => 'Cleaning cost'],
            ['path' => '/everyday-life/pool-shock', 'name' => 'Pool shock'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
