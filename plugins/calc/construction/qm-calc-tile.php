<?php

/**
 * Tile
 * /construction/tile
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tile',
    'meta' => ['title' => 'Tile Calculator: Tiles, Boxes and Waste Tool', 'description' => 'Work out how many tiles and boxes a floor needs from its size, the tile size and the joint gap, with a waste allowance and the cost per box. Units shown.', 'h1' => 'Tile', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'The area being tiled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tile_length',
                    'label' => 'Tile length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Nominal size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tile_width',
                    'label' => 'Tile width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Nominal size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gap',
                    'label' => 'Joint width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.125',
                    'help' => 'A 1/8 in joint',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and breakage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_box',
                    'label' => 'Tiles per box',
                    'type' => 'number',
                    'default' => '10',
                    'help' => 'On the carton',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per box',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '42',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'tile_ft2',
                    'label' => 'Tile module',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'tiles',
                    'label' => 'Tiles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'boxes',
                    'label' => 'Boxes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Tile',
            'results' => [
                'area_ft2' => 'length*width',
                'tile_ft2' => '(tile_length+gap)*(tile_width+gap)/144',
                'tiles' => 'ceil(length*width*(1+waste/100)/((tile_length+gap)*(tile_width+gap)/144))',
                'boxes' => 'ceil(ceil(length*width*(1+waste/100)/((tile_length+gap)*(tile_width+gap)/144))/per_box)',
                'cost' => 'ceil(ceil(length*width*(1+waste/100)/((tile_length+gap)*(tile_width+gap)/144))/per_box)*price',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'tile_length' => 'tile_ft2*144/(tile_width+gap)-gap',
                'tile_width' => 'tile_ft2*144/(tile_length+gap)-gap',
                'gap' => 'sqrt(tile_ft2*144)-tile_length',
                'price' => 'cost/boxes',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Tiles = ceiling(area × (1 + waste) ÷ tile area)</strong>, where the tile area includes its joint, and <strong>boxes = ceiling(tiles ÷ per box)</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Tile is bought by the box and laid by the joint, so the two never quite agree: a 12 in tile with an eighth-inch joint occupies more floor than a square foot, and the difference over a whole room is a box or two.</p><p>The page reports <strong>area and tile module and tiles and boxes and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Room length × Room width</code></td></tr><tr><td><strong>Tile module</strong></td><td><code>(Tile length+Joint width) × (Tile width+Joint width) ÷ 144</code></td></tr><tr><td><strong>Tiles</strong></td><td><code>ceil(Room length × Room width × (1+Waste ÷ 100) ÷ ((Tile length+Joint width) × (Tile width+Joint width) ÷ 144))</code></td></tr><tr><td><strong>Boxes</strong></td><td><code>ceil(ceil(Room length × Room width × (1+Waste ÷ 100) ÷ ((Tile length+Joint width) × (Tile width+Joint width) ÷ 144)) ÷ Tiles per box)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(ceil(Room length × Room width × (1+Waste ÷ 100) ÷ ((Tile length+Joint width) × (Tile width+Joint width) ÷ 144)) ÷ Tiles per box) × Price per box</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Area ÷ Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Area ÷ Room length</code></td></tr><tr><td><strong>Tile length</strong></td><td><code>Tile module × 144 ÷ (Tile width+Joint width)-Joint width</code></td></tr><tr><td><strong>Tile width</strong></td><td><code>Tile module × 144 ÷ (Tile length+Joint width)-Joint width</code></td></tr><tr><td><strong>Joint width</strong></td><td><code>√(Tile module × 144)-Tile length</code></td></tr><tr><td><strong>Price per box</strong></td><td><code>Cost ÷ Boxes</code></td></tr></tbody></table><p><p>The joint is added to both dimensions of every tile, which is what makes a grid of tiles plus joints exactly cover the floor. The waste allowance then covers edge cuts, and since boxes are sealed units the count rounds up again.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs. It reports area and tile module and tiles and boxes and cost.</p><ul><li><strong>Room length</strong> — in ft. The area being tiled</li><li><strong>Room width</strong> — in ft. Across it</li><li><strong>Tile length</strong> — in in. Nominal size</li><li><strong>Tile width</strong> — in in. Nominal size</li><li><strong>Joint width</strong> — in in. A 1/8 in joint</li><li><strong>Waste</strong> — in %. Cuts and breakage</li><li><strong>Tiles per box</strong>. On the carton</li><li><strong>Price per box</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Tile module</strong> — in ft²</li><li><strong>Tiles</strong></li><li><strong>Boxes</strong></li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 10 ft, Room width = 8 ft, Tile length = 12 in, Tile width = 12 in, Joint width = 0.125 in, Waste = 10 %, Tiles per box = 10, Price per box = 42 $ — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Room length × Room width</code> = <strong>80 ft²</strong></li><li><strong>Tile module</strong> = <code>(Tile length+Joint width) × (Tile width+Joint width) ÷ 144</code> = <strong>1.021 ft²</strong></li><li><strong>Tiles</strong> = <code>ceil(Room length × Room width × (1+Waste ÷ 100) ÷ ((Tile length+Joint width) × (Tile width+Joint width) ÷ 144))</code> = <strong>87</strong></li><li><strong>Boxes</strong> = <code>ceil(ceil(Room length × Room width × (1+Waste ÷ 100) ÷ ((Tile length+Joint width) × (Tile width+Joint width) ÷ 144)) ÷ Tiles per box)</code> = <strong>9</strong></li><li><strong>Cost</strong> = <code>ceil(ceil(Room length × Room width × (1+Waste ÷ 100) ÷ ((Tile length+Joint width) × (Tile width+Joint width) ÷ 144)) ÷ Tiles per box) × Price per box</code> = <strong>378 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × 8 = 80</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>An 80 ft² floor in 12 in tiles with an eighth-inch joint needs 87 tiles — each module is 1.021 ft² — which is 9 boxes and 378. The same room in 6 in tiles needs four times as many pieces.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tile count against the area: 12 in tiles with joints work out near one tile per square foot, so a count much above the area means the waste is being applied twice.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Tile module</th><th>Tiles</th><th>Boxes</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+9.2 %</td><td>+11.11 %</td><td>+11.11 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+9.2 %</td><td>+11.11 %</td><td>+11.11 %</td></tr><tr><td><strong>Tile length</strong> +10 %</td><td>+0 %</td><td>+9.9 %</td><td>−9.2 %</td><td>−11.11 %</td><td>−11.11 %</td></tr><tr><td><strong>Tile width</strong> +10 %</td><td>+0 %</td><td>+9.9 %</td><td>−9.2 %</td><td>−11.11 %</td><td>−11.11 %</td></tr><tr><td><strong>Joint width</strong> +10 %</td><td>+0 %</td><td>+0.21 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Tiles per box</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−11.11 %</td><td>−11.11 %</td></tr><tr><td><strong>Price per box</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Room length</strong>: a ten per cent move there shifts the result by about 11.1 per cent. The least sensitive is <strong>Waste</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 12, Room width = 10, Tile length = 6, Tile width = 6, Joint width = 0.125, Waste = 15, Tiles per box = 25, Price per box = 38, the page reports <strong>Area</strong> = 120 ft², <strong>Tile module</strong> = 0.261 ft², <strong>Tiles</strong> = 530, <strong>Boxes</strong> = 22, <strong>Cost</strong> = 836 $. Small tiles: four times the pieces, and a bigger waste allowance for cuts.</li><li>With Room length = 20, Room width = 15, Tile length = 24, Tile width = 12, Joint width = 0.188, Waste = 10, Tiles per box = 4, Price per box = 68, the page reports <strong>Area</strong> = 300 ft², <strong>Tile module</strong> = 2.047 ft², <strong>Tiles</strong> = 162, <strong>Boxes</strong> = 41, <strong>Cost</strong> = 2 788 $. Large format in a big room: fewer pieces, more care with the layout.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Tile thickness entered as the module.</strong> The gap goes into the count, not the depth.</li><li><strong>Waste left at zero.</strong> Every wall leaves edge cuts.</li><li><strong>Spare box not kept.</strong> A broken tile after the line is discontinued is a problem.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Tile module (ft²), Tiles, Boxes, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, tile size and joint in inches, tile module in square feet, counts as whole numbers and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and tile length and tile width and joint width and waste and tiles per box and price per box. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area and tile module and tiles and boxes and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Room width</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Tile length</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Tile width</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Joint width</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Tiles per box</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Price per box</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Square or rectangular rooms.</strong> Diagonal and herringbone layouts waste far more.</li><li><strong>Tiles only.</strong> Adhesive, grout and backer board are separate lines.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering floor tile.</li></li><li><li>Checking a box count for a bathroom.</li></li><li><li>Comparing tile sizes by piece count.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/thinset">Thinset</a> <a href="/construction/grout">Grout</a> <a href="/construction/paver">Paver</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tile calculator work out?', 'a' => <<<'TXT'
            It returns area and tile module and tiles and boxes and cost from room length and room width and tile length and tile width and joint width and waste and tiles per box and price per box. The relationship is Room length × Room width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Room length (ft), Room width (ft), Tile length (in), Tile width (in), Joint width (in), Waste (%), Tiles per box, Price per box ($). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; tile length in in; tile width in in; joint width in in; waste in %; price per box in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many 12x12 tiles do I need for 100 square feet?', 'a' => 'About 104 with a 1/8 in joint, plus waste — usually two boxes of ten more.'],
            ['q' => 'Should I add waste to tile?', 'a' => 'Yes: ten per cent for a square room and fifteen for a diagonal layout.'],
        ],
        'related' => [
            ['path' => '/construction/thinset', 'name' => 'Thinset'],
            ['path' => '/construction/grout', 'name' => 'Grout'],
            ['path' => '/construction/paver', 'name' => 'Paver'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
