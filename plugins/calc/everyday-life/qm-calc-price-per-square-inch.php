<?php

/**
 * Price per Square Inch Calculator
 * /everyday-life/price-per-square-inch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Square Inch Calculator',
    'meta' => ['title' => 'Price per Square Inch — Pizza, Panels and Sheets', 'description' => 'Two sizes at two prices, reduced to the price of one square inch and of one square foot, so a big baking tray and a small roasting tin can be compared fairly.', 'h1' => 'Price per Square Inch Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cost_a',
                    'label' => 'Item A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'w_a',
                    'label' => 'Item A width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h_a',
                    'label' => 'Item A height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Item B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '18.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'w_b',
                    'label' => 'Item B width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h_b',
                    'label' => 'Item B height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_a',
                    'label' => 'Item A area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq in',
                ],
                [
                    'name' => 'area_b',
                    'label' => 'Item B area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq in',
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Item A, per square inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/sq in',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Item B, per square inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/sq in',
                ],
                [
                    'name' => 'pct',
                    'label' => 'B saves',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'sqft_a',
                    'label' => 'Item A, per square foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/sq ft',
                ],
                [
                    'name' => 'sqft_b',
                    'label' => 'Item B, per square foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/sq ft',
                ],
            ],
        ],
    ],
    'formula' => [
        'area_a' => 'w_a * h_a',
        'area_b' => 'w_b * h_b',
        'unit_a' => 'cost_a / (w_a * h_a)',
        'unit_b' => 'cost_b / (w_b * h_b)',
        'pct' => '(cost_a / (w_a * h_a) - cost_b / (w_b * h_b)) / (cost_a / (w_a * h_a)) * 100',
        'sqft_a' => 'cost_a / (w_a * h_a) * 144',
        'sqft_b' => 'cost_b / (w_b * h_b) * 144',
    ],
    'article' => [
        'intro' => 'The price of a square inch of each of two rectangular things, the difference, and the price per square foot, which is how sheet goods are quoted.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A sixteen-inch pizza is not twice a twelve-inch pizza. Area goes as the square of the width, so sixteen inches is 201 square inches against 113, which is seventy-eight per cent more pizza for a price that is usually forty per cent higher.</p><p>The same arithmetic prices sheet metal, acrylic, plywood and cake. Put the width and height of each into the boxes and the two prices land on one scale: cents per square inch, and dollars per square foot, which is how the trade quotes.</p><p>The answer is <strong>item A area and item B area and item A, per square inch and item B, per square inch and b saves and item A, per square foot and item B, per square foot</strong>, worked out from item A price and item A width and item A height and item B price and item B width and item B height. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>area_a</strong></td><td><code>Item A width × Item A height</code></td></tr><tr><td><strong>area_b</strong></td><td><code>Item B width × Item B height</code></td></tr><tr><td><strong>unit_a</strong></td><td><code>Item A price ÷ (Item A width × Item A height)</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Item B price ÷ (Item B width × Item B height)</code></td></tr><tr><td><strong>pct</strong></td><td><code>(Item A price ÷ (Item A width × Item A height) - Item B price ÷ (Item B width × Item B height)) ÷ (Item A price ÷ (Item A width × Item A height)) × 100</code></td></tr><tr><td><strong>sqft_a</strong></td><td><code>Item A price ÷ (Item A width × Item A height) × 144</code></td></tr><tr><td><strong>sqft_b</strong></td><td><code>Item B price ÷ (Item B width × Item B height) × 144</code></td></tr></tbody></table><p>Width times height gives the area in square inches. Price over area gives the unit price, and multiplying that by 144 converts square inches to square feet without going back to the shop's numbers.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports item A area and item B area and item A, per square inch and item B, per square inch and b saves and item A, per square foot and item B, per square foot.</p><ul><li><strong>Item A price</strong> — $.</li><li><strong>Item A width</strong> — in.</li><li><strong>Item A height</strong> — in.</li><li><strong>Item B price</strong> — $.</li><li><strong>Item B width</strong> — in.</li><li><strong>Item B height</strong> — in.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Item A area</strong> — sq in.</li><li><strong>Item B area</strong> — sq in.</li><li><strong>Item A, per square inch</strong> — $/sq in.</li><li><strong>Item B, per square inch</strong> — $/sq in.</li><li><strong>B saves</strong> — %.</li><li><strong>Item A, per square foot</strong> — $/sq ft.</li><li><strong>Item B, per square foot</strong> — $/sq ft.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put item A price = 12 $, item A width = 10 in, item A height = 8 in, item B price = 18.5 $, item B width = 12 in, item B height = 10 in into the form and the panel reads:</p><ul><li><strong>Item A area</strong> = <code>Item A width × Item A height</code> = <strong>80 sq in</strong></li><li><strong>Item B area</strong> = <code>Item B width × Item B height</code> = <strong>120 sq in</strong></li><li><strong>Item A, per square inch</strong> = <code>Item A price ÷ (Item A width × Item A height)</code> = <strong>0.15 $/sq in</strong></li><li><strong>Item B, per square inch</strong> = <code>Item B price ÷ (Item B width × Item B height)</code> = <strong>0.154 $/sq in</strong></li><li><strong>B saves</strong> = <code>(Item A price ÷ (Item A width × Item A height) - Item B price ÷ (Item B width × Item B height)) ÷ (Item A price ÷ (Item A width × Item A height)) × 100</code> = <strong>-2.778 %</strong></li><li><strong>Item A, per square foot</strong> = <code>Item A price ÷ (Item A width × Item A height) × 144</code> = <strong>21.6 $/sq ft</strong></li><li><strong>Item B, per square foot</strong> = <code>Item B price ÷ (Item B width × Item B height) × 144</code> = <strong>22.2 $/sq ft</strong></li></ul><p>A negative percentage means B costs more per square inch. On sheet goods that is often worth paying for, because cutting a bigger sheet wastes less.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>10 × 8</code>, which comes to <strong>80 sq in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Ten by eight is 80 square inches for 12, which is 15 cents a square inch or 21.60 a square foot. Twelve by ten is 120 square inches for 18.50, which is 15.4 cents, so the larger sheet is 2.8 per cent dearer per square inch and 22.20 a square foot.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Item A area</th><th>Item B area</th><th>Item A, per square inch</th><th>Item B, per square inch</th><th>B saves</th><th>Item A, per square foot</th><th>Item B, per square foot</th></tr></thead><tbody><tr><td><strong>Item A price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+336.36 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Item A width</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−370 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Item A height</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−370 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Item B price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>−370 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Item B width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+336.36 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Item B height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+336.36 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Item A width</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Item A price</strong> opens at 12 $</li><li><strong>Item A width</strong> opens at 10 in</li><li><strong>Item A height</strong> opens at 8 in</li><li><strong>Item B price</strong> opens at 18.5 $</li><li><strong>Item B width</strong> opens at 12 in</li><li><strong>Item B height</strong> opens at 10 in</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Item A price</th><th>Item A area</th><th>Item B area</th><th>Item A, per square inch</th><th>Item B, per square inch</th><th>B saves</th><th>Item A, per square foot</th><th>Item B, per square foot</th></tr></thead><tbody><tr><td>6 $</td><td>80</td><td>120</td><td>0.075</td><td>0.154</td><td>-105.556</td><td>10.8</td><td>22.2</td></tr><tr><td>12 $</td><td>80</td><td>120</td><td>0.15</td><td>0.154</td><td>-2.778</td><td>21.6</td><td>22.2</td></tr><tr><td>24 $</td><td>80</td><td>120</td><td>0.3</td><td>0.154</td><td>48.611</td><td>43.2</td><td>22.2</td></tr><tr><td>60 $</td><td>80</td><td>120</td><td>0.75</td><td>0.154</td><td>79.444</td><td>108</td><td>22.2</td></tr><tr><td>120 $</td><td>80</td><td>120</td><td>1.5</td><td>0.154</td><td>89.722</td><td>216</td><td>22.2</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set item A price = 12, item A width = 10, item A height = 8, item B price = 22, item B width = 12, item B height = 10: <strong>Item A area</strong> = 80 sq in, <strong>Item B area</strong> = 120 sq in, <strong>Item A, per square inch</strong> = 0.15 $/sq in, <strong>Item B, per square inch</strong> = 0.183 $/sq in, <strong>B saves</strong> = -22.222 %, <strong>Item A, per square foot</strong> = 21.6 $/sq ft, <strong>Item B, per square foot</strong> = 26.4 $/sq ft. At 22 the larger sheet is 18.3 cents a square inch against 15, so the smaller one wins the comparison.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing the diagonal.</strong> A sixteen-inch round pan and a sixteen-inch square pan have the same stated size and different areas, because a circle is 79 per cent of its bounding square. This page multiplies width by height, so it is for rectangles.</li><li><strong>Ignoring the offcut.</strong> The price per square inch assumes every square inch gets used. A sheet cut for three parts leaves a skeleton of waste.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rectangles only.</strong> A round pizza needs a different formula, which the pizza size page has. Here the boxes are width and height.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need item A price and item A width and item A height and item B price and item B width and item B height. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Item a area and item b area and item a, per square inch and item b, per square inch and b saves and item a, per square foot and item b, per square foot should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Pizza trays and baking tins.</li></li><li><li>Sheet goods: acrylic, aluminium, plywood, foam board.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-linear-foot">Price per linear foot</a> <a href="/everyday-life/price-per-acre">Price per acre</a> <a href="/everyday-life/price-per-ounce">Price per ounce</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Item A price</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Item A width</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Item A height</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Item B price</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Item B width</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Item B height</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Square Inch calculator work out?', 'a' => <<<'TXT'
            It returns item A area and item B area and item A, per square inch and item B, per square inch and b saves and item A, per square foot and item B, per square foot from item A price and item A width and item A height and item B price and item B width and item B height. The relationship is Item A width × Item A height.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Item A price ($), Item A width (in), Item A height (in), Item B price ($), Item B width (in), Item B height (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: item A price in $; item A width in in; item A height in in; item B price in $; item B width in in; item B height in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does a sixteen-inch pizza cost so much less per inch than a twelve?', 'a' => <<<'TXT'
            Because the area grew faster than the price. Materials, labour and rent are roughly the same per pizza, so the larger one carries them across more square inches.
            TXT],
            ['q' => 'Is price per square inch ever the wrong measure?', 'a' => 'For anything sold by the piece where the piece is not a rectangle. For round things use the diameter; for irregular shapes use the weight.'],
            ['q' => 'How do I get from square inches to square feet?', 'a' => 'Divide by 144, or let the page do it: the last two results are the same prices in the unit the trade uses.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-linear-foot', 'name' => 'Price per linear foot'],
            ['path' => '/everyday-life/price-per-acre', 'name' => 'Price per acre'],
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
