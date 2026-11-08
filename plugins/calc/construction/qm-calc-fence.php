<?php

/**
 * Fence
 * /construction/fence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence',
    'meta' => ['title' => 'Fence Calculator: Posts, Rails, Pickets and Cost', 'description' => 'Work out the posts, rails and pickets for a straight fence run from its length and spacing, then price the posts and pickets at your own rates. Units shown.', 'h1' => 'Fence', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Total straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Fence height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Above ground',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_spacing',
                    'label' => 'Post spacing',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Post centre to centre',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_count',
                    'label' => 'Rails per section',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'Two or three is normal',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'picket_width',
                    'label' => 'Picket width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5.5',
                    'help' => 'Face width of one board',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'picket_gap',
                    'label' => 'Gap between pickets',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'A quarter inch is usual',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_price',
                    'label' => 'Post price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '12',
                    'help' => 'Each post, with its concrete',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'picket_price',
                    'label' => 'Picket price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '2.5',
                    'help' => 'Each picket',
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
                    'name' => 'rail_ft',
                    'label' => 'Rail length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'pickets',
                    'label' => 'Pickets',
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
            'title' => 'Fence',
            'results' => [
                'posts' => 'ceil(length/post_spacing)+1',
                'sections' => 'ceil(length/post_spacing)',
                'rail_ft' => 'ceil(length/post_spacing)*rail_count*post_spacing',
                'pickets' => 'ceil(length*12/(picket_width+picket_gap))+1',
                'cost' => '(ceil(length/post_spacing)+1)*post_price+(ceil(length*12/(picket_width+picket_gap))+1)*picket_price',
                'length' => '(posts-1)*post_spacing',
                'post_spacing' => 'length/(sections)',
                'picket_gap' => 'length*12/(pickets-1)-picket_width',
                'picket_price' => '(cost-(ceil(length/post_spacing)+1)*post_price)/(ceil(length*12/(picket_width+picket_gap))+1)',
                'post_price' => '(cost-(ceil(length*12/(picket_width+picket_gap))+1)*picket_price)/(ceil(length/post_spacing)+1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Posts = length ÷ spacing + 1</strong>, <strong>sections = length ÷ spacing</strong>, and <strong>pickets = run in inches ÷ (width + gap) + 1</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A fence is bought in four different pieces — posts, rails, pickets and the concrete that holds the posts — and each one is counted a different way. The posts come from the spacing, the rails from the sections, and the pickets from the sliver of daylight you want between them.</p><p>The page reports <strong>posts and sections and rail length and pickets and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Posts</strong></td><td><code>ceil(Fence length ÷ Post spacing)+1</code></td></tr><tr><td><strong>Sections</strong></td><td><code>ceil(Fence length ÷ Post spacing)</code></td></tr><tr><td><strong>Rail length</strong></td><td><code>ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing</code></td></tr><tr><td><strong>Pickets</strong></td><td><code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(ceil(Fence length ÷ Post spacing)+1) × Post price+(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1) × Picket price</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>(Posts-1) × Post spacing</code></td></tr><tr><td><strong>Post spacing</strong></td><td><code>Fence length ÷ (Sections)</code></td></tr><tr><td><strong>Gap between pickets</strong></td><td><code>Fence length × 12 ÷ (Pickets-1)-Picket width</code></td></tr><tr><td><strong>Picket price</strong></td><td><code>(Cost-(ceil(Fence length ÷ Post spacing)+1) × Post price) ÷ (ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1)</code></td></tr><tr><td><strong>Post price</strong></td><td><code>(Cost-(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1) × Picket price) ÷ (ceil(Fence length ÷ Post spacing)+1)</code></td></tr></tbody></table><p><p>One more post than sections, because both ends need one. The rail length is the number of sections times the rails in each times the run of one section. Pickets are counted across the full run in inches, divided by the width of one picket plus one gap, and rounded up.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs. It reports posts and sections and rail length and pickets and cost.</p><ul><li><strong>Fence length</strong> — in ft. Total straight run</li><li><strong>Fence height</strong> — in ft. Above ground</li><li><strong>Post spacing</strong> — in ft. Post centre to centre</li><li><strong>Rails per section</strong>. Two or three is normal</li><li><strong>Picket width</strong> — in in. Face width of one board</li><li><strong>Gap between pickets</strong> — in in. A quarter inch is usual</li><li><strong>Post price</strong> — in $. Each post, with its concrete</li><li><strong>Picket price</strong> — in $. Each picket</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Posts</strong></li><li><strong>Sections</strong></li><li><strong>Rail length</strong> — in ft</li><li><strong>Pickets</strong></li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 100 ft, Fence height = 6 ft, Post spacing = 8 ft, Rails per section = 3, Picket width = 5.5 in, Gap between pickets = 0.25 in, Post price = 12 $, Picket price = 2.5 $ — and the results panel reads:</p><ul><li><strong>Posts</strong> = <code>ceil(Fence length ÷ Post spacing)+1</code> = <strong>14</strong></li><li><strong>Sections</strong> = <code>ceil(Fence length ÷ Post spacing)</code> = <strong>13</strong></li><li><strong>Rail length</strong> = <code>ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing</code> = <strong>312 ft</strong></li><li><strong>Pickets</strong> = <code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1</code> = <strong>210</strong></li><li><strong>Cost</strong> = <code>(ceil(Fence length ÷ Post spacing)+1) × Post price+(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1) × Picket price</code> = <strong>693 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(100 ÷ 8)+1 = 14</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 104 ft run at 8 ft centres needs 14 posts and 13 sections, so 312 ft of rail. With 5.5 in pickets and a 0.471 in gap that is 210 pickets, and at the prices on the form the fence comes to 693.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the picket count against the run: a six-foot dog-eared picket leaves about four per foot, so a hundred feet lands near two hundred. A count near a tenth of that means the gap has been entered in feet instead of inches.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Posts</th><th>Sections</th><th>Rail length</th><th>Pickets</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+14.29 %</td><td>+15.38 %</td><td>+15.38 %</td><td>+14.29 %</td><td>+14.29 %</td></tr><tr><td><strong>Fence height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Post spacing</strong> +10 %</td><td>−7.14 %</td><td>−7.69 %</td><td>+1.54 %</td><td>+0 %</td><td>−1.73 %</td></tr><tr><td><strong>Rails per section</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Picket width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−8.57 %</td><td>−6.49 %</td></tr><tr><td><strong>Gap between pickets</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−4.29 %</td><td>−3.25 %</td></tr><tr><td><strong>Post price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+2.42 %</td></tr><tr><td><strong>Picket price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+7.58 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fence length</strong>: a ten per cent move there shifts the result by about 15.4 per cent. The least sensitive is <strong>Fence height</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence length = 60, Post spacing = 8, Gap between pickets = 0.5, the page reports <strong>Posts</strong> = 9, <strong>Sections</strong> = 8, <strong>Rail length</strong> = 192 ft, <strong>Pickets</strong> = 121, <strong>Cost</strong> = 410.5 $. A shorter run with wider gaps: fewer pickets, the same posts.</li><li>With Fence length = 150, Post spacing = 6, Rails per section = 2, the page reports <strong>Posts</strong> = 26, <strong>Sections</strong> = 25, <strong>Rail length</strong> = 300 ft, <strong>Pickets</strong> = 315, <strong>Cost</strong> = 1 099.5 $. Posts closer together on a long run, with two rails instead of three.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting sections instead of posts.</strong> There is always one more post.</li><li><strong>Gaps in feet.</strong> The picket gap is in inches on this form.</li><li><strong>Forgetting gates.</strong> A gate is two posts and no pickets.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Posts, Sections, Rail length (ft), Pickets, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Lengths and spacing in feet, picket width and gap in inches, prices in dollars per piece.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and fence height and post spacing and rails per section and picket width and gap between pickets and post price and picket price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Posts and sections and rail length and pickets and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>14</td><td>131</td><td>×9.357</td></tr><tr><td><strong>Fence height</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr><tr><td><strong>Post spacing</strong> ×10</td><td>14</td><td>3</td><td>×0.214</td></tr><tr><td><strong>Rails per section</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr><tr><td><strong>Picket width</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr><tr><td><strong>Gap between pickets</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr><tr><td><strong>Post price</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr><tr><td><strong>Picket price</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight runs only.</strong> Corners need an extra post each.</li><li><strong>Level ground assumed.</strong> A slope needs stepped sections.</li><li><strong>No gates in the count.</strong> Add their posts by hand.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering pickets for a backyard run.</li></li><li><li>Checking a contractor's post count.</li></li><li><li>Comparing picket widths before you buy.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence-perimeter">Fence perimeter</a> <a href="/construction/fence-post-depth">Fence post depth</a> <a href="/construction/fence-cost">Fence cost</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence calculator work out?', 'a' => <<<'TXT'
            It returns posts and sections and rail length and pickets and cost from fence length and fence height and post spacing and rails per section and picket width and gap between pickets and post price and picket price. The relationship is ceil(Fence length ÷ Post spacing)+1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence length (ft), Fence height (ft), Post spacing (ft), Rails per section, Picket width (in), Gap between pickets (in), Post price ($), Picket price ($). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; fence height in ft; post spacing in ft; picket width in in; gap between pickets in in; post price in $; picket price in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many posts for a 100 foot fence?', 'a' => 'Fourteen at eight foot centres — thirteen sections plus the closing post.'],
            ['q' => 'How many pickets do I need per foot?', 'a' => 'About two for a five and a half inch picket with a quarter inch gap.'],
        ],
        'related' => [
            ['path' => '/construction/fence-perimeter', 'name' => 'Fence perimeter'],
            ['path' => '/construction/fence-post-depth', 'name' => 'Fence post depth'],
            ['path' => '/construction/fence-cost', 'name' => 'Fence cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
