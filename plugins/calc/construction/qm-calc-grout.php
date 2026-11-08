<?php

/**
 * Grout
 * /construction/grout
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grout',
    'meta' => ['title' => 'Grout Calculator: Tile Grout by Joint Volume', 'description' => 'Work out the grout a tiled floor needs from the tile size, the joint width and the joint depth, and the area, in kilograms and litres before you buy. All shown.', 'h1' => 'Grout', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Tiled area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '100',
                    'help' => 'The area being tiled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tile_length',
                    'label' => 'Tile length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Longer dimension of one tile',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tile_width',
                    'label' => 'Tile width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Shorter dimension of one tile',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint_width',
                    'label' => 'Joint width',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '3',
                    'help' => '3 mm for rectified porcelain, 5 for ceramic',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint_depth',
                    'label' => 'Joint depth',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '8',
                    'help' => 'Roughly the tile\'s thickness',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Grout density',
                    'type' => 'number',
                    'suffix' => 'kg/L',
                    'default' => '1.6',
                    'help' => 'Cementitious grout is about 1.6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'grout_kg',
                    'label' => 'Grout needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
                [
                    'name' => 'grout_litres',
                    'label' => 'Grout volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'joint_length',
                    'label' => 'Total joint length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Grout',
            'results' => [
                'grout_litres' => 'area*(tile_length+tile_width)/(tile_length*tile_width)*joint_width*joint_depth*0.003658',
                'grout_kg' => 'area*(tile_length+tile_width)/(tile_length*tile_width)*joint_width*joint_depth*0.003658*1.6',
                'joint_length' => 'area*144*(tile_length+tile_width)/(tile_length*tile_width)/12',
                'joint_width' => 'grout_kg/(area*(tile_length+tile_width)/(tile_length*tile_width)*joint_depth*0.003658*1.6)',
                'joint_depth' => 'grout_kg/(area*(tile_length+tile_width)/(tile_length*tile_width)*joint_width*0.003658*1.6)',
                'density' => 'grout_kg/grout_litres',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Grout fills the joint network between tiles: <strong>grout = area × joint width × joint depth ÷ tile area</strong>, all in the same units, then scaled by the grout's density — about 1.6 kg per litre.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Grout is cheap and running out halfway across a floor is not, because a second batch may not match. The joint network is what the quantity depends on, and it is surprisingly large: small tiles mean much more joint than large ones.</p><p>The page reports <strong>grout needed and grout volume and total joint length</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Grout volume</strong></td><td><code>Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint width × Joint depth × 0.003658</code></td></tr><tr><td><strong>Grout needed</strong></td><td><code>Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint width × Joint depth × 0.003658 × 1.6</code></td></tr><tr><td><strong>Total joint length</strong></td><td><code>Tiled area × 144 × (Tile length+Tile width) ÷ (Tile length × Tile width) ÷ 12</code></td></tr><tr><td><strong>Joint width</strong></td><td><code>Grout needed ÷ (Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint depth × 0.003658 × 1.6)</code></td></tr><tr><td><strong>Joint depth</strong></td><td><code>Grout needed ÷ (Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint width × 0.003658 × 1.6)</code></td></tr><tr><td><strong>Grout density</strong></td><td><code>Grout needed ÷ Grout volume</code></td></tr></tbody></table><p><p>The perimeter term (length + width) divided by the area is the joint length per unit area — the number of joints a tile contributes. Multiplying by the joint's cross-section gives the volume, and the density turns it into kilograms.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports grout needed and grout volume and total joint length.</p><ul><li><strong>Tiled area</strong> — in ft². The area being tiled</li><li><strong>Tile length</strong> — in in. Longer dimension of one tile</li><li><strong>Tile width</strong> — in in. Shorter dimension of one tile</li><li><strong>Joint width</strong> — in mm. 3 mm for rectified porcelain, 5 for ceramic</li><li><strong>Joint depth</strong> — in mm. Roughly the tile&#x27;s thickness</li><li><strong>Grout density</strong> — in kg/L. Cementitious grout is about 1.6</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Grout needed</strong> — in kg</li><li><strong>Grout volume</strong> — in L</li><li><strong>Total joint length</strong> — in ft</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Tiled area = 100 ft², Tile length = 12 in, Tile width = 12 in, Joint width = 3 mm, Joint depth = 8 mm, Grout density = 1.6 kg/L — and the results panel reads:</p><ul><li><strong>Grout needed</strong> = <code>Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint width × Joint depth × 0.003658 × 1.6</code> = <strong>2.341 kg</strong></li><li><strong>Grout volume</strong> = <code>Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint width × Joint depth × 0.003658</code> = <strong>1.463 L</strong></li><li><strong>Total joint length</strong> = <code>Tiled area × 144 × (Tile length+Tile width) ÷ (Tile length × Tile width) ÷ 12</code> = <strong>200 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × (12+12) ÷ (12 × 12) × 3 × 8 × 0.003658 × 1.6 = 2.341</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>100 ft² of 12 in tiles with 3 mm joints 8 mm deep: 1.46 L of grout, 2.34 kg — a 3 kg bag covers it with a little to spare.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check against the manufacturer's coverage chart: most quote 0.5 to 1.5 kg per square metre for standard joints, which is 1 to 3 kg per hundred square feet. Small mosaic tiles can need several times that.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Grout needed</th><th>Grout volume</th><th>Total joint length</th></tr></thead><tbody><tr><td><strong>Tiled area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Tile length</strong> +10 %</td><td>−4.55 %</td><td>−4.55 %</td><td>−4.55 %</td></tr><tr><td><strong>Tile width</strong> +10 %</td><td>−4.55 %</td><td>−4.55 %</td><td>−4.55 %</td></tr><tr><td><strong>Joint width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Joint depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Grout density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Tiled area</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Grout density</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Tiled area = 50, Tile length = 6, Tile width = 6, Joint width = 3, Joint depth = 6, Grout density = 1.6, the page reports <strong>Grout needed</strong> = 1.756 kg, <strong>Grout volume</strong> = 1.097 L, <strong>Total joint length</strong> = 200 ft. Fifty square feet of 6 in tiles: four times the joint per area, so 1.76 kg for half the floor.</li><li>With Tiled area = 200, Tile length = 24, Tile width = 12, Joint width = 5, Joint depth = 10, Grout density = 1.6, the page reports <strong>Grout needed</strong> = 7.316 kg, <strong>Grout volume</strong> = 4.572 L, <strong>Total joint length</strong> = 300 ft. Two hundred square feet of large-format tile: 7.3 kg, because 24 in tiles carry half the joint length per square foot.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Tile size dropped from the formula.</strong> Grout is not proportional to area alone; halving the tile size roughly doubles the quantity.</li><li><strong>Joint depth assumed equal to the tile thickness.</strong> Grout only fills the joint to the tile's face; a deep bedding layer is not grouted.</li><li><strong>Units mixed.</strong> Tile sizes are in inches here and the joint in millimetres, and the formula converts both.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Grout needed (kg), Grout volume (L), Total joint length (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Tile dimensions in inches, joints in millimetres, area in square feet. The result is a volume in litres and a mass in kilograms at the density you give, with the total joint length in feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need tiled area and tile length and tile width and joint width and joint depth and grout density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Grout needed and grout volume and total joint length should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tiled area</strong> ×10</td><td>2.341</td><td>23.411</td><td>ten times larger</td></tr><tr><td><strong>Tile length</strong> ×10</td><td>2.341</td><td>1.288</td><td>×0.55</td></tr><tr><td><strong>Tile width</strong> ×10</td><td>2.341</td><td>1.288</td><td>×0.55</td></tr><tr><td><strong>Joint width</strong> ×10</td><td>2.341</td><td>23.411</td><td>ten times larger</td></tr><tr><td><strong>Joint depth</strong> ×10</td><td>2.341</td><td>23.411</td><td>ten times larger</td></tr><tr><td><strong>Grout density</strong> ×10</td><td>2.341</td><td>2.341</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Square-jointed tiles.</strong> Herringbone and irregular patterns have more joint per area.</li><li><strong>No waste allowance.</strong> Add ten per cent for a first-time job.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying grout for a floor.</li></li><li><li>Comparing grout costs between tile sizes.</li></li><li><li>Checking a tiler's materials list.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/tile">Tile</a> <a href="/construction/thinset">Thinset</a> <a href="/construction/mortar">Mortar</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grout calculator work out?', 'a' => <<<'TXT'
            It returns grout needed and grout volume and total joint length from tiled area and tile length and tile width and joint width and joint depth and grout density. The relationship is Tiled area × (Tile length+Tile width) ÷ (Tile length × Tile width) × Joint width × Joint depth × 0.003658.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Tiled area (ft²), Tile length (in), Tile width (in), Joint width (mm), Joint depth (mm), Grout density (kg/L). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: tiled area in ft²; tile length in in; tile width in in; joint width in mm; joint depth in mm; grout density in kg/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much grout do I need per square metre?', 'a' => 'For 12 in tiles with 3 mm joints, about 0.5 kg — the figure doubles and more as the tile size falls.'],
            ['q' => 'Does grout go off if I buy too much?', 'a' => 'Cementitious grout has a shelf life of about a year unopened; opened bags absorb moisture and are best used within weeks.'],
        ],
        'related' => [
            ['path' => '/construction/tile', 'name' => 'Tile'],
            ['path' => '/construction/thinset', 'name' => 'Thinset'],
            ['path' => '/construction/mortar', 'name' => 'Mortar'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
