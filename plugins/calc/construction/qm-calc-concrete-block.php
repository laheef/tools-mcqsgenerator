<?php

/**
 * Concrete block
 * /construction/concrete-block
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete block',
    'meta' => ['title' => 'Concrete Block Calculator: Blocks and Courses', 'description' => 'Count the concrete blocks a wall needs from its area and the block\'s nominal size, with the courses it works out to and the waste to order on top of it.', 'h1' => 'Concrete block', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wall_length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Along the face',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Bottom of the first course to the top',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'block_length',
                    'label' => 'Nominal block length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '16',
                    'help' => '16 in for a standard block',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'block_height',
                    'label' => 'Nominal block height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'help' => '8 in for a standard block',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint',
                    'label' => 'Mortar joint',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.375',
                    'help' => '⅜ in is standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'help' => 'Corner cuts and breakage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_area',
                    'label' => 'Wall area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'blocks',
                    'label' => 'Blocks, no waste',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'blocks_with_waste',
                    'label' => 'Blocks to order',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'courses',
                    'label' => 'Courses high',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete block',
            'results' => [
                'wall_area' => 'wall_length*wall_height',
                'blocks' => 'ceil(wall_length*wall_height*144/((block_length+joint)*(block_height+joint)))',
                'blocks_with_waste' => 'ceil(wall_length*wall_height*144/((block_length+joint)*(block_height+joint))*(1+waste/100))',
                'courses' => 'ceil(wall_height*12/(block_height+joint))',
                'wall_length' => 'wall_area/wall_height',
                'wall_height' => 'wall_area/wall_length',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A concrete block wall takes one block per <strong>nominal face area</strong> — the block plus its mortar joint. A standard 8 × 16 in block with a ⅜ joint modules to 8⅜ × 16⅜, so a square foot holds about 1.1 blocks.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Block is faster than brick — bigger units, fewer joints — and the count is the first thing a masonry quote depends on. The nominal size already includes the joint, which is what makes the arithmetic simple and is also the thing people get wrong.</p><p>The page reports <strong>wall area and blocks, no waste and blocks to order and courses high</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall area</strong></td><td><code>Wall length × Wall height</code></td></tr><tr><td><strong>Blocks, no waste</strong></td><td><code>ceil(Wall length × Wall height × 144 ÷ ((Nominal block length+Mortar joint) × (Nominal block height+Mortar joint)))</code></td></tr><tr><td><strong>Blocks to order</strong></td><td><code>ceil(Wall length × Wall height × 144 ÷ ((Nominal block length+Mortar joint) × (Nominal block height+Mortar joint)) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Courses high</strong></td><td><code>ceil(Wall height × 12 ÷ (Nominal block height+Mortar joint))</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Wall area ÷ Wall height</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Wall area ÷ Wall length</code></td></tr></tbody></table><p><p>Nominal sizes (8 × 16 in) already allow for the mortar joint, so the joint box should be left at zero if you enter nominal dimensions. It is there for the other convention: actual 7⅝ × 15⅝ blocks, where the joint has to be added back.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports wall area and blocks, no waste and blocks to order and courses high.</p><ul><li><strong>Wall length</strong> — in ft. Along the face</li><li><strong>Wall height</strong> — in ft. Bottom of the first course to the top</li><li><strong>Nominal block length</strong> — in in. 16 in for a standard block</li><li><strong>Nominal block height</strong> — in in. 8 in for a standard block</li><li><strong>Mortar joint</strong> — in in. ⅜ in is standard</li><li><strong>Wastage</strong> — in %. Corner cuts and breakage</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall area</strong> — in ft²</li><li><strong>Blocks, no waste</strong></li><li><strong>Blocks to order</strong></li><li><strong>Courses high</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 24 ft, Wall height = 8 ft, Nominal block length = 16 in, Nominal block height = 8 in, Mortar joint = 0.375 in, Wastage = 5 % — and the results panel reads:</p><ul><li><strong>Wall area</strong> = <code>Wall length × Wall height</code> = <strong>192 ft²</strong></li><li><strong>Blocks, no waste</strong> = <code>ceil(Wall length × Wall height × 144 ÷ ((Nominal block length+Mortar joint) × (Nominal block height+Mortar joint)))</code> = <strong>202</strong></li><li><strong>Blocks to order</strong> = <code>ceil(Wall length × Wall height × 144 ÷ ((Nominal block length+Mortar joint) × (Nominal block height+Mortar joint)) × (1+Wastage ÷ 100))</code> = <strong>212</strong></li><li><strong>Courses high</strong> = <code>ceil(Wall height × 12 ÷ (Nominal block height+Mortar joint))</code> = <strong>12</strong></li></ul><p>With the numbers written into the formula, the first result is <code>24 × 8 = 192</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 24 ft by 8 ft wall is 192 ft². With 16 × 8 nominal blocks and a ⅜ joint the module is 16.375 × 8.375, so the wall takes 202 blocks, 212 with five per cent waste, and the courses come out at 12 high.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the course count against the wall height: a wall that ends mid-course needs a cut course, and that is where the waste allowance goes. A count per square foot near 1.1 is right for a standard block.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall area</th><th>Blocks, no waste</th><th>Blocks to order</th><th>Courses high</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+10 %</td><td>+9.9 %</td><td>+9.91 %</td><td>+0 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+10 %</td><td>+9.9 %</td><td>+9.91 %</td><td>+8.33 %</td></tr><tr><td><strong>Nominal block length</strong> +10 %</td><td>+0 %</td><td>−8.91 %</td><td>−8.96 %</td><td>+0 %</td></tr><tr><td><strong>Nominal block height</strong> +10 %</td><td>+0 %</td><td>−8.42 %</td><td>−8.49 %</td><td>−8.33 %</td></tr><tr><td><strong>Mortar joint</strong> +10 %</td><td>+0 %</td><td>−0.5 %</td><td>−0.47 %</td><td>+0 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.47 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Wastage</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 40, Wall height = 10, Nominal block length = 16, Nominal block height = 8, Mortar joint = 0.375, Wastage = 10, the page reports <strong>Wall area</strong> = 400 ft², <strong>Blocks, no waste</strong> = 421, <strong>Blocks to order</strong> = 463, <strong>Courses high</strong> = 15. A 40 × 10 ft wall: 421 blocks, 463 to order, 15 courses high.</li><li>With Wall length = 12, Wall height = 4, Nominal block length = 16, Nominal block height = 8, Mortar joint = 0.375, Wastage = 5, the page reports <strong>Wall area</strong> = 48 ft², <strong>Blocks, no waste</strong> = 51, <strong>Blocks to order</strong> = 53, <strong>Courses high</strong> = 6. A low garden wall: 51 blocks, 53 with waste, six courses.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal and actual mixed.</strong> Using actual 7⅝ × 15⅝ with a zero joint undercounts; the two conventions have to match.</li><li><strong>Openings not deducted.</strong> A doorway is a block-wide gap, not a rounding error.</li><li><strong>Course height confused with block height.</strong> Twelve courses of 8 in block plus joints reach 8 ft 4½ in, not 8 ft.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall area (ft²), Blocks, no waste, Blocks to order, Courses high.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Wall dimensions in feet, block size and joint in inches. The area is converted to square inches by the factor of 144, and every count is rounded up to whole blocks.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and wall height and nominal block length and nominal block height and mortar joint and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Wall area and blocks, no waste and blocks to order and courses high should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>192</td><td>1 920</td><td>ten times larger</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>192</td><td>1 920</td><td>ten times larger</td></tr><tr><td><strong>Nominal block length</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Nominal block height</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Mortar joint</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Single skin.</strong> A reinforced or grouted wall may be double the count.</li><li><strong>No bond pattern.</strong> Running bond is assumed; stack bond and decorative patterns waste more.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering block for a single-skin wall.</li></li><li><li>Estimating courses for a wall of fixed height.</li></li><li><li>Pricing masonry labour by the block.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-block-fill">Block fill</a> <a href="/construction/brick">Brick</a> <a href="/construction/mortar">Mortar</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete block calculator work out?', 'a' => <<<'TXT'
            It returns wall area and blocks, no waste and blocks to order and courses high from wall length and wall height and nominal block length and nominal block height and mortar joint and wastage. The relationship is Wall length × Wall height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Wall height (ft), Nominal block length (in), Nominal block height (in), Mortar joint (in), Wastage (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; wall height in ft; nominal block length in in; nominal block height in in; mortar joint in in; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many blocks are in a square foot?', 'a' => 'About 1.1 for a standard 8 × 16 in block including the joint, which is why a 100 ft² wall takes roughly 110 blocks.'],
            ['q' => 'What is the difference between nominal and actual block size?', 'a' => 'Nominal (8 × 16) includes the mortar joint; actual (7⅝ × 15⅝) is the moulded block. Enter whichever your supplier quotes, and set the joint to match.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-block-fill', 'name' => 'Block fill'],
            ['path' => '/construction/brick', 'name' => 'Brick'],
            ['path' => '/construction/mortar', 'name' => 'Mortar'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
