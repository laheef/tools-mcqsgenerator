<?php

/**
 * Wood fence
 * /construction/wood-fence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wood fence',
    'meta' => ['title' => 'Wood Fence Calculator: Pickets, Rails and Timber Cost', 'description' => 'Cost a timber fence from the board feet it takes: pickets, rails and posts counted from the run, then priced at lumber and post rates. The formula is shown.', 'h1' => 'Wood fence', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '96',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Fence height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Picket height',
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
                    'name' => 'rail_count',
                    'label' => 'Rails per section',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Horizontal rails',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'picket_width',
                    'label' => 'Picket width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5.5',
                    'help' => 'Face width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'picket_gap',
                    'label' => 'Gap between pickets',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Daylight between pickets',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lumber_price',
                    'label' => 'Lumber price',
                    'type' => 'number',
                    'suffix' => '$/bd ft',
                    'default' => '0.85',
                    'help' => 'Board foot rate',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_price',
                    'label' => 'Post price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '14',
                    'help' => 'Each post',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concrete_price',
                    'label' => 'Concrete',
                    'type' => 'number',
                    'suffix' => '$/post',
                    'default' => '6',
                    'help' => 'Concrete per post',
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
                    'name' => 'pickets',
                    'label' => 'Pickets',
                    'type' => 'number',
                    'readonly' => true,
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
                    'name' => 'board_feet',
                    'label' => 'Board feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bd ft',
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
            'title' => 'Wood fence',
            'results' => [
                'sections' => 'ceil(length/post_spacing)',
                'pickets' => 'ceil(length*12/(picket_width+picket_gap))+1',
                'posts' => 'ceil(length/post_spacing)+1',
                'board_feet' => 'ceil(length*12/(picket_width+picket_gap)+1)*picket_width*height/12+ceil(length/post_spacing)*rail_count*post_spacing*3.5/12',
                'cost' => <<<'TXT'
                (ceil(length*12/(picket_width+picket_gap)+1)*picket_width*height/12+ceil(length/post_spacing)*rail_count*post_spacing*3.5/12)*lumber_price+(ceil(length/post_spacing)+1)*(post_price+concrete_price)
                TXT,
                'length' => '(pickets-1)*(picket_width+picket_gap)/12',
                'picket_gap' => 'length*12/(pickets-1)-picket_width',
                'picket_width' => 'length*12/(pickets-1)-picket_gap',
                'lumber_price' => '(cost-(ceil(length/post_spacing)+1)*(post_price+concrete_price))/board_feet',
                'post_price' => '(cost-board_feet*lumber_price)/(ceil(length/post_spacing)+1)-concrete_price',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Pickets = run in inches ÷ (width + gap) + 1</strong>, and the timber cost is <strong>board feet × lumber price + posts × (post + concrete)</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A timber fence is priced in board feet by the yard and by the piece at the fence company, and the two do not agree until the rails are counted. This page gathers the pickets, the rails and the posts into one board-foot figure and one cost.</p><p>The page reports <strong>sections and pickets and posts and board feet and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Sections</strong></td><td><code>ceil(Fence length ÷ Post spacing)</code></td></tr><tr><td><strong>Pickets</strong></td><td><code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1</code></td></tr><tr><td><strong>Posts</strong></td><td><code>ceil(Fence length ÷ Post spacing)+1</code></td></tr><tr><td><strong>Board feet</strong></td><td><code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets)+1) × Picket width × Fence height ÷ 12+ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing × 3.5 ÷ 12</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets)+1) × Picket width × Fence height ÷ 12+ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing × 3.5 ÷ 12) × Lumber price+(ceil(Fence length ÷ Post spacing)+1) × (Post price+Concrete)</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>(Pickets-1) × (Picket width+Gap between pickets) ÷ 12</code></td></tr><tr><td><strong>Gap between pickets</strong></td><td><code>Fence length × 12 ÷ (Pickets-1)-Picket width</code></td></tr><tr><td><strong>Picket width</strong></td><td><code>Fence length × 12 ÷ (Pickets-1)-Gap between pickets</code></td></tr><tr><td><strong>Lumber price</strong></td><td><code>(Cost-(ceil(Fence length ÷ Post spacing)+1) × (Post price+Concrete)) ÷ Board feet</code></td></tr><tr><td><strong>Post price</strong></td><td><code>(Cost-Board feet × Lumber price) ÷ (ceil(Fence length ÷ Post spacing)+1)-Concrete</code></td></tr></tbody></table><p><p>Pickets take the run divided by one picket plus one gap; rails take the sections times the rails in each times the span, at a nominal three and a half inch width. Posts are bought and set rather than measured in board feet, so they enter the cost directly with their concrete.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs. It reports sections and pickets and posts and board feet and cost.</p><ul><li><strong>Fence length</strong> — in ft. Straight run</li><li><strong>Fence height</strong> — in ft. Picket height</li><li><strong>Post spacing</strong> — in ft. Centre to centre</li><li><strong>Rails per section</strong>. Horizontal rails</li><li><strong>Picket width</strong> — in in. Face width</li><li><strong>Gap between pickets</strong> — in in. Daylight between pickets</li><li><strong>Lumber price</strong> — in $/bd ft. Board foot rate</li><li><strong>Post price</strong> — in $. Each post</li><li><strong>Concrete</strong> — in $/post. Concrete per post</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Sections</strong></li><li><strong>Pickets</strong></li><li><strong>Posts</strong></li><li><strong>Board feet</strong> — in bd ft</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 96 ft, Fence height = 6 ft, Post spacing = 8 ft, Rails per section = 2, Picket width = 5.5 in, Gap between pickets = 0.25 in, Lumber price = 0.85 $/bd ft, Post price = 14 $, Concrete = 6 $/post — and the results panel reads:</p><ul><li><strong>Sections</strong> = <code>ceil(Fence length ÷ Post spacing)</code> = <strong>12</strong></li><li><strong>Pickets</strong> = <code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1</code> = <strong>202</strong></li><li><strong>Posts</strong> = <code>ceil(Fence length ÷ Post spacing)+1</code> = <strong>13</strong></li><li><strong>Board feet</strong> = <code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets)+1) × Picket width × Fence height ÷ 12+ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing × 3.5 ÷ 12</code> = <strong>611.5 bd ft</strong></li><li><strong>Cost</strong> = <code>(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets)+1) × Picket width × Fence height ÷ 12+ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing × 3.5 ÷ 12) × Lumber price+(ceil(Fence length ÷ Post spacing)+1) × (Post price+Concrete)</code> = <strong>779.775 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(96 ÷ 8) = 12</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>96.312 ft of 6 ft fence takes 202 pickets in 12 sections between 13 posts, for 611.5 bd ft of timber. At the rates on the form the fence costs 779.775.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read board feet against the run: a six foot fence in five and a half inch pickets runs a little over six board feet per foot. Much less than that means the rails have been left out of the total.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Sections</th><th>Pickets</th><th>Posts</th><th>Board feet</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+16.67 %</td><td>+10.4 %</td><td>+15.38 %</td><td>+10.97 %</td><td>+12.44 %</td></tr><tr><td><strong>Fence height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+9.08 %</td><td>+6.06 %</td></tr><tr><td><strong>Post spacing</strong> +10 %</td><td>−8.33 %</td><td>+0 %</td><td>−7.69 %</td><td>+0.08 %</td><td>−2.51 %</td></tr><tr><td><strong>Rails per section</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0.92 %</td><td>+0.61 %</td></tr><tr><td><strong>Picket width</strong> +10 %</td><td>+0 %</td><td>−8.91 %</td><td>+0 %</td><td>+0.18 %</td><td>+0.12 %</td></tr><tr><td><strong>Gap between pickets</strong> +10 %</td><td>+0 %</td><td>−0.5 %</td><td>+0 %</td><td>−0.45 %</td><td>−0.3 %</td></tr><tr><td><strong>Lumber price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+3.84 %</td></tr><tr><td><strong>Post price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+2.33 %</td></tr><tr><td><strong>Concrete</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+1 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fence length</strong>: a ten per cent move there shifts the result by about 16.7 per cent. The least sensitive is <strong>Gap between pickets</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence height = 4, Lumber price = 1.1, the page reports <strong>Sections</strong> = 12, <strong>Pickets</strong> = 202, <strong>Posts</strong> = 13, <strong>Board feet</strong> = 426.333 bd ft, <strong>Cost</strong> = 728.967 $. A lower fence in dearer timber.</li><li>With Fence length = 200, Rails per section = 3, Post spacing = 6, the page reports <strong>Sections</strong> = 34, <strong>Pickets</strong> = 419, <strong>Posts</strong> = 35, <strong>Board feet</strong> = 1 330.75 bd ft, <strong>Cost</strong> = 1 831.138 $. A long run with three rails and closer posts.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Rails left out.</strong> They are a real share of the timber.</li><li><strong>Nominal widths.</strong> A one by six is five and a half inches.</li><li><strong>Concrete forgotten.</strong> Two bags a post adds up.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Sections, Pickets, Posts, Board feet (bd ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run and height in feet, picket dimensions in inches, timber in board feet, lumber in dollars per board foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and fence height and post spacing and rails per section and picket width and gap between pickets and lumber price and post price and concrete. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Sections and pickets and posts and board feet and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>12</td><td>121</td><td>×10.083</td></tr><tr><td><strong>Fence height</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Post spacing</strong> ×10</td><td>12</td><td>2</td><td>×0.167</td></tr><tr><td><strong>Rails per section</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Picket width</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Gap between pickets</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Lumber price</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Post price</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Concrete</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Plain runs.</strong> Corners, gates and slopes add material.</li><li><strong>No waste.</strong> Add five to ten per cent.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Pricing a timber fence in board feet.</li></li><li><li>Comparing lumber yards.</li></li><li><li>Checking a contractor's material list.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence-material">Fence material</a> <a href="/construction/privacy-fence">Privacy fence</a> <a href="/construction/lumber">Lumber</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wood fence calculator work out?', 'a' => <<<'TXT'
            It returns sections and pickets and posts and board feet and cost from fence length and fence height and post spacing and rails per section and picket width and gap between pickets and lumber price and post price and concrete. The relationship is ceil(Fence length ÷ Post spacing).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence length (ft), Fence height (ft), Post spacing (ft), Rails per section, Picket width (in), Gap between pickets (in), Lumber price ($/bd ft), Post price ($), Concrete ($/post). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; fence height in ft; post spacing in ft; picket width in in; gap between pickets in in; lumber price in $/bd ft; post price in $; concrete in $/post. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many board feet in a wood fence?', 'a' => 'About six per foot of run for a six foot fence; the form works it out from your pickets and rails.'],
            ['q' => 'Is it cheaper to buy pickets or boards?', 'a' => 'Boards, if you can rip them — but the board-foot price is what decides it.'],
        ],
        'related' => [
            ['path' => '/construction/fence-material', 'name' => 'Fence material'],
            ['path' => '/construction/privacy-fence', 'name' => 'Privacy fence'],
            ['path' => '/construction/lumber', 'name' => 'Lumber'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
