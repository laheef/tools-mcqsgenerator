<?php

/**
 * Hexagon Quilt Calculator
 * /everyday-life/hexagon-quilt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hexagon Quilt Calculator',
    'meta' => ['title' => 'Hexagon Quilt — Pieces, Area and What It Covers', 'description' => 'Hexagons tessellate, so a quilt is a count of pieces: the area of one from its side length, the pieces in your layout, and the finished area in square feet.', 'h1' => 'Hexagon Quilt Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'side',
                    'label' => 'Hexagon side',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'For a hexagon cut from a 4-inch strip, the side is 4 inches and the width across the flats is 6.93.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rows',
                    'label' => 'Rows',
                    'type' => 'number',
                    'suffix' => 'rows',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_row',
                    'label' => 'Hexagons a row',
                    'type' => 'number',
                    'suffix' => 'hexagons',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hex_area',
                    'label' => 'Area of one hexagon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq in',
                ],
                [
                    'name' => 'pieces',
                    'label' => 'Pieces',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hexagons',
                ],
                [
                    'name' => 'total_in2',
                    'label' => 'Quilt area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq in',
                ],
                [
                    'name' => 'total_sqft',
                    'label' => 'Quilt area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq ft',
                ],
            ],
        ],
    ],
    'formula' => ['hex_area' => '2.598076 * side * side', 'pieces' => 'rows * per_row', 'total_in2' => 'rows * per_row * 2.598076 * side * side', 'total_sqft' => 'rows * per_row * 2.598076 * side * side / 144'],
    'article' => [
        'intro' => 'The area of one hexagon from its side length, the pieces a grid of rows and columns needs, and the finished quilt area in square inches and square feet.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A regular hexagon's area is 2.598 times the square of its side, because it is six equilateral triangles of side <em>s</em> and each of those is 0.433 <em>s</em>². A 4-inch hexagon is 41.57 square inches.</p><p>Eighty of them is 3 326 square inches, or 23 square feet — a lap quilt. The count is exact because hexagons tessellate; nothing is lost between them the way it is between circles.</p><p>The answer is <strong>area of one hexagon and pieces and quilt area and quilt area</strong>, worked out from hexagon side and rows and hexagons a row. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hex_area</strong></td><td><code>2.598076 × Hexagon side × Hexagon side</code></td></tr><tr><td><strong>pieces</strong></td><td><code>Rows × Hexagons a row</code></td></tr><tr><td><strong>total_in2</strong></td><td><code>Rows × Hexagons a row × 2.598076 × Hexagon side × Hexagon side</code></td></tr><tr><td><strong>total_sqft</strong></td><td><code>Rows × Hexagons a row × 2.598076 × Hexagon side × Hexagon side ÷ 144</code></td></tr></tbody></table><p>Side squared times 2.598 gives the area. Rows times hexagons a row gives the pieces, and the total divides the product by the 144 square inches in a square foot.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports area of one hexagon and pieces and quilt area and quilt area.</p><ul><li><strong>Hexagon side</strong> — in. For a hexagon cut from a 4-inch strip, the side is 4 inches and the width across the flats is 6.93.</li><li><strong>Rows</strong> — rows.</li><li><strong>Hexagons a row</strong> — hexagons.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Area of one hexagon</strong> — sq in.</li><li><strong>Pieces</strong> — hexagons.</li><li><strong>Quilt area</strong> — sq in.</li><li><strong>Quilt area</strong> — sq ft.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hexagon side = 4 in, rows = 8 rows, hexagons a row = 10 hexagons into the form and the panel reads:</p><ul><li><strong>Area of one hexagon</strong> = <code>2.598076 × Hexagon side × Hexagon side</code> = <strong>41.569 sq in</strong></li><li><strong>Pieces</strong> = <code>Rows × Hexagons a row</code> = <strong>80 hexagons</strong></li><li><strong>Quilt area</strong> = <code>Rows × Hexagons a row × 2.598076 × Hexagon side × Hexagon side</code> = <strong>3 325.537 sq in</strong></li><li><strong>Quilt area</strong> = <code>Rows × Hexagons a row × 2.598076 × Hexagon side × Hexagon side ÷ 144</code> = <strong>23.094 sq ft</strong></li></ul><p>A 5-inch hexagon is 64.95 square inches, so the same 80 pieces cover 36 square feet — half as much again for a side that grew a quarter.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2.598076 × 4 × 4</code>, which comes to <strong>41.569 sq in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 4-inch hexagon is 41.57 square inches. Eight rows of ten is 80 pieces, 3 326 square inches and 23.1 square feet.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Area of one hexagon</th><th>Pieces</th><th>Quilt area</th><th>Quilt area</th></tr></thead><tbody><tr><td><strong>Hexagon side</strong> +10 %</td><td>+21 %</td><td>+0 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Rows</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hexagons a row</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hexagon side</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hexagon side</strong> opens at 4 in — For a hexagon cut from a 4-inch strip, the side is 4 inches and the width across the flats is 6.93.</li><li><strong>Rows</strong> opens at 8 rows</li><li><strong>Hexagons a row</strong> opens at 10 hexagons</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hexagon side</th><th>Area of one hexagon</th><th>Pieces</th><th>Quilt area</th><th>Quilt area</th></tr></thead><tbody><tr><td>2 in</td><td>10.392</td><td>80</td><td>831.384</td><td>5.774</td></tr><tr><td>4 in</td><td>41.569</td><td>80</td><td>3 325.537</td><td>23.094</td></tr><tr><td>8 in</td><td>166.277</td><td>80</td><td>13 302.149</td><td>92.376</td></tr><tr><td>20 in</td><td>1 039.23</td><td>80</td><td>83 138.432</td><td>577.35</td></tr><tr><td>40 in</td><td>4 156.922</td><td>80</td><td>332 553.728</td><td>2 309.401</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hexagon side = 5, rows = 8, hexagons a row = 10: <strong>Area of one hexagon</strong> = 64.952 sq in, <strong>Pieces</strong> = 80 hexagons, <strong>Quilt area</strong> = 5 196.152 sq in, <strong>Quilt area</strong> = 36.084 sq ft. A 5-inch hexagon is 64.95 square inches, so 80 of them cover 5 196 square inches — 36 square feet.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Confusing side with width.</strong> A hexagon that is 4 inches across the flats has a side of 2.31, not 4. Templates are usually made to the side, and English paper piecing goes by the side.</li><li><strong>Forgetting the seams.</strong> Each piece loses a quarter inch on every edge when sewn, which shrinks a 4-inch hexagon to about 3.8 and costs six per cent of the area.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Perfect tessellation.</strong> A quilt with gaps between the pieces, or a border, has an area larger than the pieces add up to. This counts the pieces only.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hexagon side and rows and hexagons a row. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Area of one hexagon and pieces and quilt area and quilt area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out how many hexagons a quilt of a given size needs.</li></li><li><li>Buying papers or acrylic templates by count.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/half-square-triangle">Half-square triangles</a> <a href="/everyday-life/quilt">Quilt size</a> <a href="/everyday-life/rug-size">Rug size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hexagon side</strong> ×10</td><td>41.569</td><td>4 156.922</td><td>×100</td></tr><tr><td><strong>Rows</strong> ×10</td><td>41.569</td><td>41.569</td><td>unchanged</td></tr><tr><td><strong>Hexagons a row</strong> ×10</td><td>41.569</td><td>41.569</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hexagon Quilt calculator work out?', 'a' => <<<'TXT'
            It returns area of one hexagon and pieces and quilt area and quilt area from hexagon side and rows and hexagons a row. The relationship is 2.598076 × Hexagon side × Hexagon side.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Hexagon side (in), Rows (rows), Hexagons a row (hexagons). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hexagon side in in; rows in rows; hexagons a row in hexagons. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why 2.598?', 'a' => 'It is three times the square root of three over two, the constant in the area of a regular hexagon. It comes from six equilateral triangles each of 0.433 s².'],
            ['q' => 'How do hexagons fit together?', 'a' => <<<'TXT'
            Edge to edge with no gaps, which is why they are used in honeycomb quilts and in English paper piecing. The columns offset by half a hexagon, so the rows interlock.
            TXT],
            ['q' => 'How many hexagons for a queen quilt?', 'a' => 'About 400 at 3 inches a side, or 200 at 4. The area is what matters, and the side length is the lever.'],
        ],
        'related' => [
            ['path' => '/everyday-life/half-square-triangle', 'name' => 'Half-square triangles'],
            ['path' => '/everyday-life/quilt', 'name' => 'Quilt size'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
