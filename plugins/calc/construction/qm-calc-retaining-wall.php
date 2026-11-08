<?php

/**
 * Retaining wall
 * /construction/retaining-wall
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Retaining wall',
    'meta' => ['title' => 'Retaining Wall Calculator: Blocks, Courses and Cost', 'description' => 'Work out how many blocks a retaining wall takes from its length, height and block size, with the cap run and the cost of blocks and caps. Units shown.', 'h1' => 'Retaining wall', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Finished height',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'block_length',
                    'label' => 'Block length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Face length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'block_height',
                    'label' => 'Block height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Course height',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Block price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '4',
                    'help' => 'Each block',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cap_price',
                    'label' => 'Cap price',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '8',
                    'help' => 'Cap per linear foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_area',
                    'label' => 'Wall face',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'courses',
                    'label' => 'Courses',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'blocks',
                    'label' => 'Blocks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cap_ft',
                    'label' => 'Cap length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
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
            'title' => 'Retaining wall',
            'results' => [
                'wall_area' => 'length*height',
                'courses' => 'ceil(height*12/block_height)',
                'blocks' => 'ceil(length*12/block_length)*ceil(height*12/block_height)',
                'cap_ft' => 'length',
                'cost' => 'ceil(length*12/block_length)*ceil(height*12/block_height)*price+length*cap_price',
                'length' => 'wall_area/height',
                'height' => 'wall_area/length',
                'price' => '(cost-cap_ft*cap_price)/blocks',
                'cap_price' => '(cost-blocks*price)/cap_ft',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Courses = wall height ÷ block height</strong>; <strong>blocks = blocks per course × courses</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A block wall is counted in courses, not square feet, because blocks are laid in rows and every row ends in a block or a cut. Knowing the course count first is what tells you whether the last row will be a full block or a sliver that has to be trimmed.</p><p>The page reports <strong>wall face and courses and blocks and cap length and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall face</strong></td><td><code>Wall length × Wall height</code></td></tr><tr><td><strong>Courses</strong></td><td><code>ceil(Wall height × 12 ÷ Block height)</code></td></tr><tr><td><strong>Blocks</strong></td><td><code>ceil(Wall length × 12 ÷ Block length) × ceil(Wall height × 12 ÷ Block height)</code></td></tr><tr><td><strong>Cap length</strong></td><td><code>Wall length</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Wall length × 12 ÷ Block length) × ceil(Wall height × 12 ÷ Block height) × Block price+Wall length × Cap price</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Wall face ÷ Wall height</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Wall face ÷ Wall length</code></td></tr><tr><td><strong>Block price</strong></td><td><code>(Cost-Cap length × Cap price) ÷ Blocks</code></td></tr><tr><td><strong>Cap price</strong></td><td><code>(Cost-Blocks × Block price) ÷ Cap length</code></td></tr></tbody></table><p><p>The wall height in inches divided by the block height gives the courses, rounded up. The length divided by the block length gives the blocks in a course. Multiply the two and add the cap, which is bought by the linear foot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports wall face and courses and blocks and cap length and cost.</p><ul><li><strong>Wall length</strong> — in ft. Straight run</li><li><strong>Wall height</strong> — in ft. Finished height</li><li><strong>Block length</strong> — in in. Face length</li><li><strong>Block height</strong> — in in. Course height</li><li><strong>Block price</strong> — in $. Each block</li><li><strong>Cap price</strong> — in $/ft. Cap per linear foot</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall face</strong> — in ft²</li><li><strong>Courses</strong></li><li><strong>Blocks</strong></li><li><strong>Cap length</strong> — in ft</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 20 ft, Wall height = 3 ft, Block length = 12 in, Block height = 6 in, Block price = 4 $, Cap price = 8 $/ft — and the results panel reads:</p><ul><li><strong>Wall face</strong> = <code>Wall length × Wall height</code> = <strong>60 ft²</strong></li><li><strong>Courses</strong> = <code>ceil(Wall height × 12 ÷ Block height)</code> = <strong>6</strong></li><li><strong>Blocks</strong> = <code>ceil(Wall length × 12 ÷ Block length) × ceil(Wall height × 12 ÷ Block height)</code> = <strong>120</strong></li><li><strong>Cap length</strong> = <code>Wall length</code> = <strong>20 ft</strong></li><li><strong>Cost</strong> = <code>ceil(Wall length × 12 ÷ Block length) × ceil(Wall height × 12 ÷ Block height) × Block price+Wall length × Cap price</code> = <strong>640 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 3 = 60</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 ft wall 3 ft high in 12 in by 6 in blocks is 6 courses of blocks, 120 blocks in all, with 20 ft of cap. The material comes to 640.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the courses against the height: six inch blocks give two courses per foot. An odd number of courses usually means the cap will sit on a cut course, which wastes blocks and shows.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall face</th><th>Courses</th><th>Blocks</th><th>Cap length</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+10 %</td><td>+16.67 %</td><td>+16.67 %</td><td>+0 %</td><td>+12.5 %</td></tr><tr><td><strong>Block length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−5 %</td><td>+0 %</td><td>−3.75 %</td></tr><tr><td><strong>Block height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Block price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+7.5 %</td></tr><tr><td><strong>Cap price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+2.5 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall height</strong>: a ten per cent move there shifts the result by about 16.7 per cent. The least sensitive is <strong>Block height</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall height = 2, Block height = 4, the page reports <strong>Wall face</strong> = 40 ft², <strong>Courses</strong> = 6, <strong>Blocks</strong> = 120, <strong>Cap length</strong> = 20 ft, <strong>Cost</strong> = 640 $. A low garden wall in shallow blocks: six courses.</li><li>With Wall length = 45, Wall height = 4, Block length = 18, the page reports <strong>Wall face</strong> = 180 ft², <strong>Courses</strong> = 8, <strong>Blocks</strong> = 240, <strong>Cap length</strong> = 45 ft, <strong>Cost</strong> = 1 320 $. A long wall in longer blocks: fewer blocks per course.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Square feet ordered instead of blocks.</strong> Cuts and corners waste blocks.</li><li><strong>Cap forgotten.</strong> It is a separate line.</li><li><strong>Height above the footing.</strong> Buried courses still cost money.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall face (ft²), Courses, Blocks, Cap length (ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and height in feet, block dimensions in inches, blocks each, cap by the linear foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and wall height and block length and block height and block price and cap price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Wall face and courses and blocks and cap length and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr><tr><td><strong>Block length</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr><tr><td><strong>Block height</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr><tr><td><strong>Block price</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr><tr><td><strong>Cap price</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Gravity walls.</strong> Tall walls need engineering and a geogrid.</li><li><strong>No base or drainage stone.</strong> Both are needed and both cost.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering blocks for a garden wall.</li></li><li><li>Checking a contractor's course count.</li></li><li><li>Budgeting a terrace wall.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence-perimeter">Fence perimeter</a> <a href="/construction/gravel-driveway">Gravel driveway</a> <a href="/construction/square-footage">Square footage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Retaining wall calculator work out?', 'a' => <<<'TXT'
            It returns wall face and courses and blocks and cap length and cost from wall length and wall height and block length and block height and block price and cap price. The relationship is Wall length × Wall height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Wall height (ft), Block length (in), Block height (in), Block price ($), Cap price ($/ft). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; wall height in ft; block length in in; block height in in; block price in $; cap price in $/ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many blocks per square foot of wall?', 'a' => 'Two for a six by twelve block, more for a shorter block.'],
            ['q' => 'How many courses in a three foot wall?', 'a' => 'Six with six inch blocks, or nine with four inch blocks.'],
        ],
        'related' => [
            ['path' => '/construction/fence-perimeter', 'name' => 'Fence perimeter'],
            ['path' => '/construction/gravel-driveway', 'name' => 'Gravel driveway'],
            ['path' => '/construction/square-footage', 'name' => 'Square footage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
