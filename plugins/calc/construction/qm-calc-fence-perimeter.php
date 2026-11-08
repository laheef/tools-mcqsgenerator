<?php

/**
 * Fence perimeter
 * /construction/fence-perimeter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence perimeter',
    'meta' => ['title' => 'Fence Perimeter Calculator: Run, Posts and Cost', 'description' => 'Measure the fence run around a rectangular yard, subtract the gates, and see how many posts and panels that perimeter needs. The formula and units are shown.', 'h1' => 'Fence perimeter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Yard length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '60',
                    'help' => 'One side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Yard width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'The other side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gate_width',
                    'label' => 'Total gate width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'All gates added together',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_spacing',
                    'label' => 'Post spacing',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Centre to centre',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per foot',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '22',
                    'help' => 'Fence per linear foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'perimeter',
                    'label' => 'Perimeter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'fence_run',
                    'label' => 'Fence run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'posts',
                    'label' => 'Posts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panels',
                    'label' => 'Sections',
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
            'title' => 'Fence perimeter',
            'results' => [
                'perimeter' => '2*(length+width)',
                'fence_run' => '2*(length+width)-gate_width',
                'posts' => 'ceil((2*(length+width)-gate_width)/post_spacing)+1',
                'panels' => 'ceil((2*(length+width)-gate_width)/post_spacing)',
                'cost' => '(2*(length+width)-gate_width)*price',
                'length' => 'perimeter/2-width',
                'width' => 'perimeter/2-length',
                'price' => 'cost/fence_run',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Perimeter = 2 × (length + width)</strong>; the fence run is the perimeter less the gate openings.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Fencing a yard means fencing all four sides, and the gate is the one part of that perimeter that is not fence. Getting the run right is the difference between buying a couple of panels too many and coming up short on the last corner.</p><p>The page reports <strong>perimeter and fence run and posts and sections and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Perimeter</strong></td><td><code>2 × (Yard length+Yard width)</code></td></tr><tr><td><strong>Fence run</strong></td><td><code>2 × (Yard length+Yard width)-Total gate width</code></td></tr><tr><td><strong>Posts</strong></td><td><code>ceil((2 × (Yard length+Yard width)-Total gate width) ÷ Post spacing)+1</code></td></tr><tr><td><strong>Sections</strong></td><td><code>ceil((2 × (Yard length+Yard width)-Total gate width) ÷ Post spacing)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(2 × (Yard length+Yard width)-Total gate width) × Price per foot</code></td></tr><tr><td><strong>Yard length</strong></td><td><code>Perimeter ÷ 2-Yard width</code></td></tr><tr><td><strong>Yard width</strong></td><td><code>Perimeter ÷ 2-Yard length</code></td></tr><tr><td><strong>Price per foot</strong></td><td><code>Cost ÷ Fence run</code></td></tr></tbody></table><p><p>Twice the length plus twice the width is the whole perimeter, and the gates are subtracted to leave the fence run. Posts come from the run and the spacing, with one more post than sections so both ends are closed.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports perimeter and fence run and posts and sections and cost.</p><ul><li><strong>Yard length</strong> — in ft. One side</li><li><strong>Yard width</strong> — in ft. The other side</li><li><strong>Total gate width</strong> — in ft. All gates added together</li><li><strong>Post spacing</strong> — in ft. Centre to centre</li><li><strong>Price per foot</strong> — in $/ft. Fence per linear foot</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Perimeter</strong> — in ft</li><li><strong>Fence run</strong> — in ft</li><li><strong>Posts</strong></li><li><strong>Sections</strong></li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Yard length = 60 ft, Yard width = 40 ft, Total gate width = 12 ft, Post spacing = 8 ft, Price per foot = 22 $/ft — and the results panel reads:</p><ul><li><strong>Perimeter</strong> = <code>2 × (Yard length+Yard width)</code> = <strong>200 ft</strong></li><li><strong>Fence run</strong> = <code>2 × (Yard length+Yard width)-Total gate width</code> = <strong>188 ft</strong></li><li><strong>Posts</strong> = <code>ceil((2 × (Yard length+Yard width)-Total gate width) ÷ Post spacing)+1</code> = <strong>25</strong></li><li><strong>Sections</strong> = <code>ceil((2 × (Yard length+Yard width)-Total gate width) ÷ Post spacing)</code> = <strong>24</strong></li><li><strong>Cost</strong> = <code>(2 × (Yard length+Yard width)-Total gate width) × Price per foot</code> = <strong>4 136 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × (60+40) = 200</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 60 ft by 40 ft yard has 200 ft of perimeter. With 12 ft of gates the fence run is 188 ft, which needs 25 posts in 24 sections and costs 4 136 at the rate on the form.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the run against the perimeter: the difference is the gates. A run longer than the perimeter means the gate width has been subtracted with the wrong sign.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Perimeter</th><th>Fence run</th><th>Posts</th><th>Sections</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Yard length</strong> +10 %</td><td>+6 %</td><td>+6.38 %</td><td>+4 %</td><td>+4.17 %</td><td>+6.38 %</td></tr><tr><td><strong>Yard width</strong> +10 %</td><td>+4 %</td><td>+4.26 %</td><td>+4 %</td><td>+4.17 %</td><td>+4.26 %</td></tr><tr><td><strong>Total gate width</strong> +10 %</td><td>+0 %</td><td>−0.64 %</td><td>+0 %</td><td>+0 %</td><td>−0.64 %</td></tr><tr><td><strong>Post spacing</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−8 %</td><td>−8.33 %</td><td>+0 %</td></tr><tr><td><strong>Price per foot</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Price per foot</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Total gate width</strong>, at 0.6 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Yard length = 100, Yard width = 60, Total gate width = 4, the page reports <strong>Perimeter</strong> = 320 ft, <strong>Fence run</strong> = 316 ft, <strong>Posts</strong> = 41, <strong>Sections</strong> = 40, <strong>Cost</strong> = 6 952 $. An acre-sized yard with a single walk gate.</li><li>With Yard length = 30, Yard width = 20, Total gate width = 10, Post spacing = 6, the page reports <strong>Perimeter</strong> = 100 ft, <strong>Fence run</strong> = 90 ft, <strong>Posts</strong> = 16, <strong>Sections</strong> = 15, <strong>Cost</strong> = 1 980 $. A small garden with a wide double gate.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting a side.</strong> Four sides, not two.</li><li><strong>Gates counted as fence.</strong> Subtract the openings.</li><li><strong>Corners left out of the post count.</strong> Each corner needs its own post.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Perimeter (ft), Fence run (ft), Posts, Sections, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Sides and gate width in feet, the run and perimeter in feet, price per foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need yard length and yard width and total gate width and post spacing and price per foot. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Perimeter and fence run and posts and sections and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Yard length</strong> ×10</td><td>200</td><td>1 280</td><td>×6.4</td></tr><tr><td><strong>Yard width</strong> ×10</td><td>200</td><td>920</td><td>×4.6</td></tr><tr><td><strong>Total gate width</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr><tr><td><strong>Post spacing</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr><tr><td><strong>Price per foot</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangles only.</strong> An L-shaped yard is two runs.</li><li><strong>Level ground.</strong> A slope adds length and posts.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a yard fence before ordering.</li></li><li><li>Comparing a perimeter quote with the plan.</li></li><li><li>Working out how much of the boundary a gate takes.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence">Fence</a> <a href="/construction/fence-cost">Fence cost</a> <a href="/construction/retaining-wall">Retaining wall</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence perimeter calculator work out?', 'a' => <<<'TXT'
            It returns perimeter and fence run and posts and sections and cost from yard length and yard width and total gate width and post spacing and price per foot. The relationship is 2 × (Yard length+Yard width).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Yard length (ft), Yard width (ft), Total gate width (ft), Post spacing (ft), Price per foot ($/ft). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: yard length in ft; yard width in ft; total gate width in ft; post spacing in ft; price per foot in $/ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I measure a fence perimeter?', 'a' => 'Twice the length plus twice the width, then subtract every gate opening.'],
            ['q' => 'How many posts around a 200 foot perimeter?', 'a' => 'Twenty five at eight foot spacing with one gate, since the run is under 200.'],
        ],
        'related' => [
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/fence-cost', 'name' => 'Fence cost'],
            ['path' => '/construction/retaining-wall', 'name' => 'Retaining wall'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
