<?php

/**
 * Fence estimate
 * /construction/fence-estimate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence estimate',
    'meta' => ['title' => 'Fence Estimate Calculator: Posts, Concrete and Screws', 'description' => 'Build a fence material estimate from the run: posts and their holes, concrete by the bag, rails and the screws that hold them. The formula and units are shown.', 'h1' => 'Fence estimate', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '120',
                    'help' => 'Total run',
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
                    'name' => 'hole_diameter',
                    'label' => 'Hole diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => 'A ten inch hole suits a four by four',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hole_depth',
                    'label' => 'Hole depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '30',
                    'help' => 'Below grade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rails_per_section',
                    'label' => 'Rails per section',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Usually two',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'screws_per_rail',
                    'label' => 'Screws per rail end',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'Into each post',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'posts',
                    'label' => 'Posts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sections',
                    'label' => 'Sections',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concrete_ft3',
                    'label' => 'Concrete',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'bags',
                    'label' => 'Bags of 80 lb',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'screws',
                    'label' => 'Screws',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Fence estimate',
            'results' => [
                'posts' => 'ceil(length/post_spacing)+1',
                'sections' => 'ceil(length/post_spacing)',
                'concrete_ft3' => '(ceil(length/post_spacing)+1)*3.14159265/4*pow(hole_diameter,2)*hole_depth/1728',
                'bags' => 'ceil((ceil(length/post_spacing)+1)*3.14159265/4*pow(hole_diameter,2)*hole_depth/1728/0.6)',
                'screws' => 'ceil(length/post_spacing)*rails_per_section*screws_per_rail*2',
                'length' => '(posts-1)*post_spacing',
                'post_spacing' => 'length/sections',
                'hole_depth' => 'concrete_ft3/(posts*3.14159265/4*pow(hole_diameter,2)/1728)',
                'screws_per_rail' => 'screws/(sections*rails_per_section*2)',
                'rails_per_section' => 'screws/(sections*screws_per_rail*2)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Posts = length ÷ spacing + 1</strong>; <strong>concrete per hole = π/4 × d² × depth ÷ 1 728</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The material list is where a fence budget quietly goes wrong. Posts are easy to count, but the concrete that holds them is measured in cubic feet and sold in bags, and the screws run to two at each end of every rail.</p><p>The page reports <strong>posts and sections and concrete and bags of 80 lb and screws</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Posts</strong></td><td><code>ceil(Fence length ÷ Post spacing)+1</code></td></tr><tr><td><strong>Sections</strong></td><td><code>ceil(Fence length ÷ Post spacing)</code></td></tr><tr><td><strong>Concrete</strong></td><td><code>(ceil(Fence length ÷ Post spacing)+1) × 3.14159265 ÷ 4 × (Hole diameter)^2 × Hole depth ÷ 1728</code></td></tr><tr><td><strong>Bags of 80 lb</strong></td><td><code>ceil((ceil(Fence length ÷ Post spacing)+1) × 3.14159265 ÷ 4 × (Hole diameter)^2 × Hole depth ÷ 1728 ÷ 0.6)</code></td></tr><tr><td><strong>Screws</strong></td><td><code>ceil(Fence length ÷ Post spacing) × Rails per section × Screws per rail end × 2</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>(Posts-1) × Post spacing</code></td></tr><tr><td><strong>Post spacing</strong></td><td><code>Fence length ÷ Sections</code></td></tr><tr><td><strong>Hole depth</strong></td><td><code>Concrete ÷ (Posts × 3.14159265 ÷ 4 × (Hole diameter)^2 ÷ 1728)</code></td></tr><tr><td><strong>Screws per rail end</strong></td><td><code>Screws ÷ (Sections × Rails per section × 2)</code></td></tr><tr><td><strong>Rails per section</strong></td><td><code>Screws ÷ (Sections × Screws per rail end × 2)</code></td></tr></tbody></table><p><p>One hole per post, and each hole is a cylinder, so its volume is a quarter of pi times the diameter squared times the depth, converted from cubic inches to cubic feet. An eighty pound bag sets about six tenths of a cubic foot, so the bag count is that volume divided by six tenths and rounded up.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports posts and sections and concrete and bags of 80 lb and screws.</p><ul><li><strong>Fence length</strong> — in ft. Total run</li><li><strong>Post spacing</strong> — in ft. Centre to centre</li><li><strong>Hole diameter</strong> — in in. A ten inch hole suits a four by four</li><li><strong>Hole depth</strong> — in in. Below grade</li><li><strong>Rails per section</strong>. Usually two</li><li><strong>Screws per rail end</strong>. Into each post</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Posts</strong></li><li><strong>Sections</strong></li><li><strong>Concrete</strong> — in ft³</li><li><strong>Bags of 80 lb</strong></li><li><strong>Screws</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 120 ft, Post spacing = 8 ft, Hole diameter = 10 in, Hole depth = 30 in, Rails per section = 2, Screws per rail end = 4 — and the results panel reads:</p><ul><li><strong>Posts</strong> = <code>ceil(Fence length ÷ Post spacing)+1</code> = <strong>16</strong></li><li><strong>Sections</strong> = <code>ceil(Fence length ÷ Post spacing)</code> = <strong>15</strong></li><li><strong>Concrete</strong> = <code>(ceil(Fence length ÷ Post spacing)+1) × 3.14159265 ÷ 4 × (Hole diameter)^2 × Hole depth ÷ 1728</code> = <strong>21.817 ft³</strong></li><li><strong>Bags of 80 lb</strong> = <code>ceil((ceil(Fence length ÷ Post spacing)+1) × 3.14159265 ÷ 4 × (Hole diameter)^2 × Hole depth ÷ 1728 ÷ 0.6)</code> = <strong>37</strong></li><li><strong>Screws</strong> = <code>ceil(Fence length ÷ Post spacing) × Rails per section × Screws per rail end × 2</code> = <strong>240</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(120 ÷ 8)+1 = 16</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>120 ft at 8 ft centres gives 16 posts and 15 sections. The holes hold 21.817 ft³ of concrete — 37 bags — and the rails take 240 screws.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the concrete against the posts: most four by four posts in a normal hole take under two bags each. If the bag count is more than three times the post count, the hole has been entered in feet rather than inches.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Posts</th><th>Sections</th><th>Concrete</th><th>Bags of 80 lb</th><th>Screws</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+12.5 %</td><td>+13.33 %</td><td>+12.5 %</td><td>+10.81 %</td><td>+13.33 %</td></tr><tr><td><strong>Post spacing</strong> +10 %</td><td>−6.25 %</td><td>−6.67 %</td><td>−6.25 %</td><td>−5.41 %</td><td>−6.67 %</td></tr><tr><td><strong>Hole diameter</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+21 %</td><td>+18.92 %</td><td>+0 %</td></tr><tr><td><strong>Hole depth</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+8.11 %</td><td>+0 %</td></tr><tr><td><strong>Rails per section</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Screws per rail end</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Hole diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Post spacing</strong>, at 6.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Post spacing = 6, Hole diameter = 12, the page reports <strong>Posts</strong> = 21, <strong>Sections</strong> = 20, <strong>Concrete</strong> = 41.233 ft³, <strong>Bags of 80 lb</strong> = 69, <strong>Screws</strong> = 320. Closer posts in wider holes: more posts and more concrete.</li><li>With Fence length = 200, Hole depth = 36, Rails per section = 3, the page reports <strong>Posts</strong> = 26, <strong>Sections</strong> = 25, <strong>Concrete</strong> = 42.542 ft³, <strong>Bags of 80 lb</strong> = 71, <strong>Screws</strong> = 600. A long run in a deeper frost line with three rails.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Holes measured in feet.</strong> The diameter and depth are inches.</li><li><strong>Forgetting the end posts.</strong> One more post than sections.</li><li><strong>Bag coverage assumed at a cubic foot.</strong> An eighty pound bag is about 0.6.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Posts, Sections, Concrete (ft³), Bags of 80 lb, Screws.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Lengths in feet, hole dimensions in inches, concrete in cubic feet and bags of eighty pounds.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and post spacing and hole diameter and hole depth and rails per section and screws per rail end. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Posts and sections and concrete and bags of 80 lb and screws should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>16</td><td>151</td><td>×9.438</td></tr><tr><td><strong>Post spacing</strong> ×10</td><td>16</td><td>3</td><td>×0.188</td></tr><tr><td><strong>Hole diameter</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr><tr><td><strong>Hole depth</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr><tr><td><strong>Rails per section</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr><tr><td><strong>Screws per rail end</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Set posts in soil.</strong> Rock needs a different method.</li><li><strong>No waste allowance.</strong> Add a bag or two for spillage.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Writing a materials order.</li></li><li><li>Pricing a fence before you dig.</li></li><li><li>Checking a kit's concrete claim.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence-post-depth">Fence post depth</a> <a href="/construction/fence-material">Fence material</a> <a href="/construction/fence">Fence</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence estimate calculator work out?', 'a' => <<<'TXT'
            It returns posts and sections and concrete and bags of 80 lb and screws from fence length and post spacing and hole diameter and hole depth and rails per section and screws per rail end. The relationship is ceil(Fence length ÷ Post spacing)+1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence length (ft), Post spacing (ft), Hole diameter (in), Hole depth (in), Rails per section, Screws per rail end. Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; post spacing in ft; hole diameter in in; hole depth in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many bags of concrete per fence post?', 'a' => 'About two for a ten inch hole three feet deep; the form gives the count for your own holes.'],
            ['q' => 'How many screws per rail?', 'a' => 'Two at each end, so four per rail across a section.'],
        ],
        'related' => [
            ['path' => '/construction/fence-post-depth', 'name' => 'Fence post depth'],
            ['path' => '/construction/fence-material', 'name' => 'Fence material'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
