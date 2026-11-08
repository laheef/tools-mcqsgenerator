<?php

/**
 * Post hole concrete
 * /construction/post-hole-concrete
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Post hole concrete',
    'meta' => ['title' => 'Post Hole Concrete Calculator: Bags per Post', 'description' => 'Work out the concrete for a fence or deck post hole, per post and for the whole run, from the hole size, the depth and the post standing in it. All shown.', 'h1' => 'Post hole concrete', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hole_diameter',
                    'label' => 'Hole diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => 'Usually two to three times the post width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hole_depth',
                    'label' => 'Hole depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Below the frost line where that matters',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_size',
                    'label' => 'Post size',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'The post displaces its own volume',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'posts',
                    'label' => 'Number of posts',
                    'type' => 'number',
                    'default' => '10',
                    'help' => 'Posts in the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Spoil and uneven holes',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concrete_each',
                    'label' => 'Concrete per hole',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'concrete_total',
                    'label' => 'Concrete, all posts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of 80 lb mix',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_displacement',
                    'label' => 'Volume taken by the post',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Post hole concrete',
            'results' => [
                'concrete_each' => '(pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth',
                'concrete_total' => '(pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*posts*(1+waste/100)',
                'bags_80lb' => 'ceil((pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*posts*(1+waste/100)/0.6)',
                'post_displacement' => 'pow(post_size/12,2)*hole_depth',
                'hole_diameter' => '24*sqrt((concrete_each/hole_depth+pow(post_size/12,2))/pi)',
                'hole_depth' => 'concrete_each/(pi*pow(hole_diameter/24,2)-pow(post_size/12,2))',
                'posts' => 'concrete_total/((pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*(1+waste/100))',
                'waste' => '(concrete_total/((pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*posts)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A post hole is a cylinder: <strong>π·(d/24)²·h</strong> cubic feet each, where <strong>d</strong> is the hole diameter in inches and <strong>h</strong> its depth in feet. Bags follow by dividing by 0.6.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Post holes are the classic Saturday job, and the bag count is the difference between one trip to the yard and three. The post itself takes up a chunk of the hole, and leaving that out over-orders by about a fifth.</p><p>The page reports <strong>concrete per hole and concrete, all posts and bags of 80 lb mix and volume taken by the post</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Concrete per hole</strong></td><td><code>(pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth</code></td></tr><tr><td><strong>Concrete, all posts</strong></td><td><code>(pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth × Number of posts × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Bags of 80 lb mix</strong></td><td><code>ceil((pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth × Number of posts × (1+Over-order ÷ 100) ÷ 0.6)</code></td></tr><tr><td><strong>Volume taken by the post</strong></td><td><code>(Post size ÷ 12)^2 × Hole depth</code></td></tr><tr><td><strong>Hole diameter</strong></td><td><code>24 × √((Concrete per hole ÷ Hole depth+(Post size ÷ 12)^2) ÷ pi)</code></td></tr><tr><td><strong>Hole depth</strong></td><td><code>Concrete per hole ÷ (pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2)</code></td></tr><tr><td><strong>Number of posts</strong></td><td><code>Concrete, all posts ÷ ((pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Concrete, all posts ÷ ((pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth × Number of posts)-1) × 100</code></td></tr></tbody></table><p><p>The hole is a cylinder and the post is a square prism, so the concrete is the difference between them. The square term is the post's side in feet, squared — a 4 in post takes 0.111 ft² of the hole's area.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports concrete per hole and concrete, all posts and bags of 80 lb mix and volume taken by the post.</p><ul><li><strong>Hole diameter</strong> — in in. Usually two to three times the post width</li><li><strong>Hole depth</strong> — in ft. Below the frost line where that matters</li><li><strong>Post size</strong> — in in. The post displaces its own volume</li><li><strong>Number of posts</strong>. Posts in the run</li><li><strong>Over-order</strong> — in %. Spoil and uneven holes</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concrete per hole</strong> — in ft³</li><li><strong>Concrete, all posts</strong> — in ft³</li><li><strong>Bags of 80 lb mix</strong></li><li><strong>Volume taken by the post</strong> — in ft³</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Hole diameter = 10 in, Hole depth = 3 ft, Post size = 4 in, Number of posts = 10, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Concrete per hole</strong> = <code>(pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth</code> = <strong>1.303 ft³</strong></li><li><strong>Concrete, all posts</strong> = <code>(pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth × Number of posts × (1+Over-order ÷ 100)</code> = <strong>14.332 ft³</strong></li><li><strong>Bags of 80 lb mix</strong> = <code>ceil((pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth × Number of posts × (1+Over-order ÷ 100) ÷ 0.6)</code> = <strong>24</strong></li><li><strong>Volume taken by the post</strong> = <code>(Post size ÷ 12)^2 × Hole depth</code> = <strong>0.333 ft³</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(pi × pow(10 ÷ 24,2)-pow(4 ÷ 12,2)) × 3 = 1.303</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten holes 10 in across and 3 ft deep with 4 in posts: the hole holds 1.64 ft³ and the post takes 0.33, so each needs 1.30 ft³ — 13.0 ft³ for the run, 14.3 with ten per cent, or 24 bags.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare with the rule of thumb: about one 80 lb bag per post for a shallow hole and two or three for a deep one. A hole three times the post's width takes much more concrete than it looks like it should.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concrete per hole</th><th>Concrete, all posts</th><th>Bags of 80 lb mix</th><th>Volume taken by the post</th></tr></thead><tbody><tr><td><strong>Hole diameter</strong> +10 %</td><td>+26.37 %</td><td>+26.37 %</td><td>+29.17 %</td><td>+0 %</td></tr><tr><td><strong>Hole depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+12.5 %</td><td>+10 %</td></tr><tr><td><strong>Post size</strong> +10 %</td><td>−5.37 %</td><td>−5.37 %</td><td>−4.17 %</td><td>+21 %</td></tr><tr><td><strong>Number of posts</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+12.5 %</td><td>+0 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+4.17 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Hole diameter</strong>: a ten per cent move there shifts the result by about 29.2 per cent. The least sensitive is <strong>Over-order</strong>, at 4.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Hole diameter = 8, Hole depth = 2.5, Post size = 4, Number of posts = 20, Over-order = 10, the page reports <strong>Concrete per hole</strong> = 0.595 ft³, <strong>Concrete, all posts</strong> = 13.088 ft³, <strong>Bags of 80 lb mix</strong> = 22, <strong>Volume taken by the post</strong> = 0.278 ft³. A twenty-post fence with 8 in holes: 0.60 ft³ per hole, 13.1 ft³ in total, 22 bags.</li><li>With Hole diameter = 12, Hole depth = 4, Post size = 6, Number of posts = 4, Over-order = 15, the page reports <strong>Concrete per hole</strong> = 2.142 ft³, <strong>Concrete, all posts</strong> = 9.851 ft³, <strong>Bags of 80 lb mix</strong> = 17, <strong>Volume taken by the post</strong> = 1 ft³. Four deck posts in 12 in holes four feet deep: 2.14 ft³ each, 9.9 ft³ and 17 bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Post displacement ignored.</strong> A 6 in post takes a quarter of a 12 in hole's area.</li><li><strong>Depth measured above grade.</strong> Only the buried length is filled with concrete; the rest is backfill or the post itself.</li><li><strong>Bags for one post multiplied without the waste.</strong> One bag per post times twenty is the wrong answer when each hole needs 1.3 ft³.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concrete per hole (ft³), Concrete, all posts (ft³), Bags of 80 lb mix, Volume taken by the post (ft³).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Hole and post sizes in inches, depth in feet. The per-hole volume is cubic feet, the run total the same, and the bags are whole 80 lb bags.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need hole diameter and hole depth and post size and number of posts and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Concrete per hole and concrete, all posts and bags of 80 lb mix and volume taken by the post should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hole diameter</strong> ×10</td><td>1.303</td><td>163.291</td><td>×125.328</td></tr><tr><td><strong>Hole depth</strong> ×10</td><td>1.303</td><td>13.029</td><td>ten times larger</td></tr><tr><td><strong>Post size</strong> ×10</td><td>1.303</td><td>-31.697</td><td>×-24.328</td></tr><tr><td><strong>Number of posts</strong> ×10</td><td>1.303</td><td>1.303</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>1.303</td><td>1.303</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight-sided holes.</strong> Bell-shaped and rocky holes take more.</li><li><strong>Round posts.</strong> A round post displaces a circle, not a square.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying bags for a fence line.</li></li><li><li>Deciding how wide to dig.</li></li><li><li>Checking a deck's pier schedule.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/sonotube">Sonotube</a> <a href="/construction/concrete-tube">Concrete tube</a> <a href="/construction/fence-post-depth">Fence post depth</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Post hole concrete calculator work out?', 'a' => <<<'TXT'
            It returns concrete per hole and concrete, all posts and bags of 80 lb mix and volume taken by the post from hole diameter and hole depth and post size and number of posts and over-order. The relationship is (pi × (Hole diameter ÷ 24)^2-(Post size ÷ 12)^2) × Hole depth.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hole diameter (in), Hole depth (ft), Post size (in), Number of posts, Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: hole diameter in in; hole depth in ft; post size in in; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many bags of concrete per fence post?', 'a' => 'About one bag of 80 lb mix for an 8 in hole two feet deep, and two to three for a 10 in hole three feet deep.'],
            ['q' => 'Should I put gravel in the bottom of a post hole?', 'a' => 'Yes, about six inches, for drainage — and it does not change the concrete volume much because it is below the post\'s base.'],
        ],
        'related' => [
            ['path' => '/construction/sonotube', 'name' => 'Sonotube'],
            ['path' => '/construction/concrete-tube', 'name' => 'Concrete tube'],
            ['path' => '/construction/fence-post-depth', 'name' => 'Fence post depth'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
