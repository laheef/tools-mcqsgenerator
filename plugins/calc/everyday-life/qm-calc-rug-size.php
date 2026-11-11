<?php

/**
 * Rug Size Calculator
 * /everyday-life/rug-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rug Size Calculator',
    'meta' => ['title' => 'Rug Size — the Border You Leave Around It — Free Tool', 'description' => 'Room size and the band of bare floor you want left visible give the rug that fits, the floor it covers, and what it costs at the price you were quoted.', 'h1' => 'Rug Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'room_length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '14',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'room_width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '11',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'border',
                    'label' => 'Bare floor at each wall',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '2',
                    'help' => 'Eighteen inches to two feet is the usual margin on long sides, more if the rug stops short of a fireplace.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per square foot',
                    'type' => 'number',
                    'suffix' => '$/sq ft',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rug_length',
                    'label' => 'Rug length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'rug_width',
                    'label' => 'Rug width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'area',
                    'label' => 'Rug area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq ft',
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Share of floor covered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Rug cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'rug_length' => 'room_length - 2 * border',
        'rug_width' => 'room_width - 2 * border',
        'area' => '(room_length - 2 * border) * (room_width - 2 * border)',
        'coverage' => '(room_length - 2 * border) * (room_width - 2 * border) / (room_length * room_width) * 100',
        'cost' => '(room_length - 2 * border) * (room_width - 2 * border) * price',
    ],
    'article' => [
        'intro' => 'The rug dimensions that leave an even margin of floor around them, the rug\'s area, what share of the floor it covers, and the cost at the price you are quoted.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The rug is not the room. A rug that touches all four walls makes a small room look smaller, and a rug in the middle of a large one leaves the furniture floating. What most rooms want is an even band of bare floor, and the band is the input.</p><p>Fourteen feet by eleven with two feet at each wall gives a ten by seven rug, 70 square feet, which is 45 per cent of the floor. At eight dollars a square foot that is 560, and now the sizes on the shop page mean something.</p><p>The answer is <strong>rug length and rug width and rug area and share of floor covered and rug cost</strong>, worked out from room length and room width and bare floor at each wall and price per square foot. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>rug_length</strong></td><td><code>Room length - 2 × Bare floor at each wall</code></td></tr><tr><td><strong>rug_width</strong></td><td><code>Room width - 2 × Bare floor at each wall</code></td></tr><tr><td><strong>area</strong></td><td><code>(Room length - 2 × Bare floor at each wall) × (Room width - 2 × Bare floor at each wall)</code></td></tr><tr><td><strong>coverage</strong></td><td><code>(Room length - 2 × Bare floor at each wall) × (Room width - 2 × Bare floor at each wall) ÷ (Room length × Room width) × 100</code></td></tr><tr><td><strong>cost</strong></td><td><code>(Room length - 2 × Bare floor at each wall) × (Room width - 2 × Bare floor at each wall) × Price per square foot</code></td></tr></tbody></table><p>The border comes off both ends of each dimension, so the rug length is the room length minus twice the border. Area is the product of the two, and the cost is that area times the price per square foot.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports rug length and rug width and rug area and share of floor covered and rug cost.</p><ul><li><strong>Room length</strong> — ft.</li><li><strong>Room width</strong> — ft.</li><li><strong>Bare floor at each wall</strong> — ft. Eighteen inches to two feet is the usual margin on long sides, more if the rug stops short of a fireplace.</li><li><strong>Price per square foot</strong> — $/sq ft.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Rug length</strong> — ft.</li><li><strong>Rug width</strong> — ft.</li><li><strong>Rug area</strong> — sq ft.</li><li><strong>Share of floor covered</strong> — %.</li><li><strong>Rug cost</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put room length = 14 ft, room width = 11 ft, bare floor at each wall = 2 ft, price per square foot = 8 $/sq ft into the form and the panel reads:</p><ul><li><strong>Rug length</strong> = <code>Room length - 2 × Bare floor at each wall</code> = <strong>10 ft</strong></li><li><strong>Rug width</strong> = <code>Room width - 2 × Bare floor at each wall</code> = <strong>7 ft</strong></li><li><strong>Rug area</strong> = <code>(Room length - 2 × Bare floor at each wall) × (Room width - 2 × Bare floor at each wall)</code> = <strong>70 sq ft</strong></li><li><strong>Share of floor covered</strong> = <code>(Room length - 2 × Bare floor at each wall) × (Room width - 2 × Bare floor at each wall) ÷ (Room length × Room width) × 100</code> = <strong>45.455 %</strong></li><li><strong>Rug cost</strong> = <code>(Room length - 2 × Bare floor at each wall) × (Room width - 2 × Bare floor at each wall) × Price per square foot</code> = <strong>560 $</strong></li></ul><p>Standard rug sizes are 5 by 8, 8 by 10 and 9 by 12. A 10 by 7 answer means an 8 by 10 rug with more floor at the ends or a 9 by 12 that covers the border entirely.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>14 - 2 × 2</code>, which comes to <strong>10 ft</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 14 by 11 room with a 2-foot border takes a 10 by 7 rug, 70 square feet and 45.5 per cent of the floor, which costs 560 at 8 a square foot.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Rug length</th><th>Rug width</th><th>Rug area</th><th>Share of floor covered</th><th>Rug cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+14 %</td><td>+0 %</td><td>+14 %</td><td>+3.64 %</td><td>+14 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+0 %</td><td>+15.71 %</td><td>+15.71 %</td><td>+5.19 %</td><td>+15.71 %</td></tr><tr><td><strong>Bare floor at each wall</strong> +10 %</td><td>−4 %</td><td>−5.71 %</td><td>−9.49 %</td><td>−9.49 %</td><td>−9.49 %</td></tr><tr><td><strong>Price per square foot</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Room width</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Room length</strong> opens at 14 ft</li><li><strong>Room width</strong> opens at 11 ft</li><li><strong>Bare floor at each wall</strong> opens at 2 ft — Eighteen inches to two feet is the usual margin on long sides, more if the rug stops short of a fireplace.</li><li><strong>Price per square foot</strong> opens at 8 $/sq ft</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Room length</th><th>Rug length</th><th>Rug width</th><th>Rug area</th><th>Share of floor covered</th><th>Rug cost</th></tr></thead><tbody><tr><td>7 ft</td><td>3</td><td>7</td><td>21</td><td>27.273</td><td>168</td></tr><tr><td>14 ft</td><td>10</td><td>7</td><td>70</td><td>45.455</td><td>560</td></tr><tr><td>28 ft</td><td>24</td><td>7</td><td>168</td><td>54.545</td><td>1 344</td></tr><tr><td>70 ft</td><td>66</td><td>7</td><td>462</td><td>60</td><td>3 696</td></tr><tr><td>140 ft</td><td>136</td><td>7</td><td>952</td><td>61.818</td><td>7 616</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set room length = 14, room width = 11, bare floor at each wall = 1, price per square foot = 8: <strong>Rug length</strong> = 12 ft, <strong>Rug width</strong> = 9 ft, <strong>Rug area</strong> = 108 sq ft, <strong>Share of floor covered</strong> = 70.13 %, <strong>Rug cost</strong> = 864 $. A one-foot border gives a 12 by 9 rug, 108 square feet and 69 per cent coverage, which costs 864 — the border is the expensive input.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Fitting the rug to the furniture instead of the room.</strong> A sofa and two chairs need to sit on the rug, front legs at least. Measure the group, then check the room.</li><li><strong>Ignoring the door swing.</strong> A rug that reaches a door becomes a trip hazard and a folded corner. Cut the border on that side instead of keeping it even.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rectangular rooms and rugs.</strong> An L-shaped room or a round rug needs a different sum, and this page assumes right angles.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need room length and room width and bare floor at each wall and price per square foot. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Rug length and rug width and rug area and share of floor covered and rug cost should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing between 8 by 10 and 9 by 12 for a living room.</li></li><li><li>Budgeting a rug for a bedroom before the sales.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tablecloth-size">Tablecloth size</a> <a href="/everyday-life/garbage-bag-size">Garbage bag size</a> <a href="/everyday-life/price-per-acre">Price per acre</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>10</td><td>136</td><td>×13.6</td></tr><tr><td><strong>Room width</strong> ×10</td><td>10</td><td>10</td><td>unchanged</td></tr><tr><td><strong>Bare floor at each wall</strong> ×10</td><td>10</td><td>-26</td><td>×-2.6</td></tr><tr><td><strong>Price per square foot</strong> ×10</td><td>10</td><td>10</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rug Size calculator work out?', 'a' => <<<'TXT'
            It returns rug length and rug width and rug area and share of floor covered and rug cost from room length and room width and bare floor at each wall and price per square foot. The relationship is Room length - 2 × Bare floor at each wall.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Room length (ft), Room width (ft), Bare floor at each wall (ft), Price per square foot ($/sq ft). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: room length in ft; room width in ft; bare floor at each wall in ft; price per square foot in $/sq ft. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Should the rug go under the sofa?', 'a' => <<<'TXT'
            The front legs of every seat should be on the rug, or all of them if the rug is large. A rug that stops short of the front legs makes the seating look like it is waiting to be moved.
            TXT],
            ['q' => 'What size rug for a queen bed?', 'a' => 'Eight by ten under the bottom two-thirds of the bed, or two runners at the sides. The border arithmetic is the same, with the bed as the room.'],
            ['q' => 'Does a bigger rug always look better?', 'a' => 'Up to the room\'s proportions. A rug that reaches within a foot of the walls reads as carpet, and carpet under furniture is cheaper per square foot than a rug.'],
        ],
        'related' => [
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
            ['path' => '/everyday-life/garbage-bag-size', 'name' => 'Garbage bag size'],
            ['path' => '/everyday-life/price-per-acre', 'name' => 'Price per acre'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
