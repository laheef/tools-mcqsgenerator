<?php

/**
 * Brick Calculator
 * /construction/brick
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Brick Calculator',
    'meta' => ['title' => 'Brick Calculator: Bricks for a Wall, Plus Waste', 'description' => 'Work out how many bricks a wall needs from its area, the brick\'s face size and the mortar joint, then add the wastage every job eats: five to ten per cent.', 'h1' => 'Brick Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wall_length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Measured along the face, not the footing',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Floor to underside of the course above',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'brick_length',
                    'label' => 'Brick length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '7.625',
                    'help' => 'A modular brick\'s face is 7⅝ in',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'brick_height',
                    'label' => 'Brick height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2.25',
                    'help' => 'A modular brick\'s height is 2¼ in',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'joint',
                    'label' => 'Mortar joint',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.375',
                    'help' => '⅜ in for a standard bed joint',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'help' => 'Five per cent is the usual allowance for cuts and breakage',
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
                    'name' => 'bricks',
                    'label' => 'Bricks, no waste',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bricks_with_waste',
                    'label' => 'Bricks to order',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Brick',
            'results' => [
                'wall_area' => 'wall_length*wall_height',
                'bricks' => 'ceil(wall_length*wall_height*144/((brick_length+joint)*(brick_height+joint))-0.000000001)',
                'bricks_with_waste' => 'ceil(wall_length*wall_height*144/((brick_length+joint)*(brick_height+joint))*(1+waste/100)-0.000000001)',
                'wall_length' => 'wall_area/wall_height',
                'wall_height' => 'wall_area/wall_length',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A wall takes one brick per <strong>(brick length + joint) × (brick height + joint)</strong> of face area. Multiply the wall's area by 144 to work in square inches, divide by that face, and round up: the joint is part of the module, not part of the brick.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Brick counts are the classic quantity takeoff: small units, a joint that changes the module, and a wastage allowance that decides whether you finish the wall with a half pallet left over or run out on the last course.</p><p>The page reports <strong>wall area and bricks, no waste and bricks to order</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall area</strong></td><td><code>Wall length × Wall height</code></td></tr><tr><td><strong>Bricks, no waste</strong></td><td><code>ceil(Wall length × Wall height × 144 ÷ ((Brick length+Mortar joint) × (Brick height+Mortar joint))-0.000000001)</code></td></tr><tr><td><strong>Bricks to order</strong></td><td><code>ceil(Wall length × Wall height × 144 ÷ ((Brick length+Mortar joint) × (Brick height+Mortar joint)) × (1+Wastage ÷ 100)-0.000000001)</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Wall area ÷ Wall height</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Wall area ÷ Wall length</code></td></tr></tbody></table><p><p>The joint thickness is added to both the length and the height, because the module a brick occupies is the brick plus one joint in each direction. That is why a 7⅝ × 2¼ brick laid with a ⅜ joint occupies 8 × 2⅝ inches of wall — the familiar 6.9 bricks per square foot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports wall area and bricks, no waste and bricks to order.</p><ul><li><strong>Wall length</strong> — in ft. Measured along the face, not the footing</li><li><strong>Wall height</strong> — in ft. Floor to underside of the course above</li><li><strong>Brick length</strong> — in in. A modular brick&#x27;s face is 7⅝ in</li><li><strong>Brick height</strong> — in in. A modular brick&#x27;s height is 2¼ in</li><li><strong>Mortar joint</strong> — in in. ⅜ in for a standard bed joint</li><li><strong>Wastage</strong> — in %. Five per cent is the usual allowance for cuts and breakage</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall area</strong> — in ft²</li><li><strong>Bricks, no waste</strong></li><li><strong>Bricks to order</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 20 ft, Wall height = 8 ft, Brick length = 7.625 in, Brick height = 2.25 in, Mortar joint = 0.375 in, Wastage = 5 % — and the results panel reads:</p><ul><li><strong>Wall area</strong> = <code>Wall length × Wall height</code> = <strong>160 ft²</strong></li><li><strong>Bricks, no waste</strong> = <code>ceil(Wall length × Wall height × 144 ÷ ((Brick length+Mortar joint) × (Brick height+Mortar joint))-0.000000001)</code> = <strong>1 098</strong></li><li><strong>Bricks to order</strong> = <code>ceil(Wall length × Wall height × 144 ÷ ((Brick length+Mortar joint) × (Brick height+Mortar joint)) × (1+Wastage ÷ 100)-0.000000001)</code> = <strong>1 152</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 8 = 160</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 ft by 8 ft wall is 160 ft², or 23 040 in². Each brick module is 8 × 2.625 = 21 in², so the wall needs 1 098 bricks, and with five per cent waste 1 152 to order — about 2.3 pallets of 500.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Sanity-check against the rule of thumb: roughly 7 bricks per square foot for a single-skin wall with ⅜ joints. A count far from that usually means the brick dimensions were entered in the wrong unit — millimetres into an inch box, for instance.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall area</th><th>Bricks, no waste</th><th>Bricks to order</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+10 %</td><td>+9.93 %</td><td>+10.07 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+10 %</td><td>+9.93 %</td><td>+10.07 %</td></tr><tr><td><strong>Brick length</strong> +10 %</td><td>+0 %</td><td>−8.74 %</td><td>−8.68 %</td></tr><tr><td><strong>Brick height</strong> +10 %</td><td>+0 %</td><td>−7.92 %</td><td>−7.81 %</td></tr><tr><td><strong>Mortar joint</strong> +10 %</td><td>+0 %</td><td>−1.91 %</td><td>−1.82 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.52 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall length</strong>: a ten per cent move there shifts the result by about 10.1 per cent. The least sensitive is <strong>Wastage</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 30, Wall height = 10, Brick length = 7.625, Brick height = 2.25, Mortar joint = 0.375, Wastage = 10, the page reports <strong>Wall area</strong> = 300 ft², <strong>Bricks, no waste</strong> = 2 058, <strong>Bricks to order</strong> = 2 263. A 30 ft by 10 ft wall: 2 058 bricks before waste, 2 263 to order at ten per cent.</li><li>With Wall length = 12, Wall height = 4, Brick length = 8, Brick height = 4, Mortar joint = 0.5, Wastage = 5, the page reports <strong>Wall area</strong> = 48 ft², <strong>Bricks, no waste</strong> = 181, <strong>Bricks to order</strong> = 190. A garden wall of 8 × 4 units with ½ in joints: 181 units, 190 with waste.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Piers and returns left out.</strong> The area formula is a flat wall; measure each face separately and add.</li><li><strong>The joint omitted.</strong> A brick-only area overstates the count by about a tenth — one of the commonest takeoff errors.</li><li><strong>Waste treated as optional.</strong> Cuts at corners, breakage and the last course eat into the order; five to ten per cent is normal.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall area (ft²), Bricks, no waste, Bricks to order.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Lengths are in feet and the brick face in inches, which is why the area is multiplied by 144 before dividing. The two counts are whole bricks, rounded up, because a part brick still has to be cut from a whole one.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and wall height and brick length and brick height and mortar joint and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Wall area and bricks, no waste and bricks to order should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>160</td><td>1 600</td><td>ten times larger</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>160</td><td>1 600</td><td>ten times larger</td></tr><tr><td><strong>Brick length</strong> ×10</td><td>160</td><td>160</td><td>unchanged</td></tr><tr><td><strong>Brick height</strong> ×10</td><td>160</td><td>160</td><td>unchanged</td></tr><tr><td><strong>Mortar joint</strong> ×10</td><td>160</td><td>160</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>160</td><td>160</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One skin.</strong> A cavity wall takes two of these counts; a solid 9 in wall takes roughly one and a half.</li><li><strong>No openings.</strong> Subtract window and door areas before entering the wall area, or the count will be high.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering brick for a single-skin wall.</li></li><li><li>Checking a subcontractor's takeoff.</li></li><li><li>Pricing a wall by the thousand.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-block">Concrete block</a> <a href="/construction/mortar">Mortar</a> <a href="/construction/wall-square-footage">Wall square footage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Brick calculator work out?', 'a' => <<<'TXT'
            It returns wall area and bricks, no waste and bricks to order from wall length and wall height and brick length and brick height and mortar joint and wastage. The relationship is Wall length × Wall height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Wall height (ft), Brick length (in), Brick height (in), Mortar joint (in), Wastage (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; wall height in ft; brick length in in; brick height in in; mortar joint in in; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many bricks are in a square foot?', 'a' => 'About 6.9 with a ⅜ inch joint on a modular brick, which rounds to 7 for estimating. The exact figure is 144 divided by the module area in square inches.'],
            ['q' => 'Should I add waste on top?', 'a' => 'Yes — five per cent for a straightforward wall, ten for one with many openings, corners or a patterned bond.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-block', 'name' => 'Concrete block'],
            ['path' => '/construction/mortar', 'name' => 'Mortar'],
            ['path' => '/construction/wall-square-footage', 'name' => 'Wall square footage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
